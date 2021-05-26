<?php

namespace App\Services;

use App\Models\{UjiKompetensi, PendaftaranUji};
use Carbon\Carbon;
use Error;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UjiKomService 
{
    public static function getAllSafe($isActive = true): Collection
    {
        $daftar_ujikom = UjiKompetensi::with('skema')->where('isActive', $isActive)->get();
        $daftar_ujikom->transform(function($item) {
            $item = (object) $item->only(['uid','nama','tgl_awal','tgl_akhir','jml_asesi','deskripsi','skema']);
            
            $dataSkema = (object) [
                "uid"   =>  $item->uid,
                "nama" => $item->skema->nama,
                "kode" => $item->skema->kode,
                "kode" => $item->skema->kode,
                "level_kkni" => $item->skema->level_kkni,
                "judul_klaster" => $item->skema->judul_klaster,
            ];

            if($item->skema->parent_id != null) {
                $dataSkema->nama_skema_induk = $item->skema->skemaInduk->nama;
                $dataSkema->kode_skema_induk = $item->skema->skemaInduk->kode;
            }

            $item->skema = $dataSkema;
            return $item;
        });
        return $daftar_ujikom;
    }

    public static function getAllAdvanced(Object $filter = null,Object $options = null): Collection
    {
        $filter = $filter == null ? (object) [] : $filter;
        $options = $options == null ? (object) [] : $options;

        $daftar_ujikom = UjiKompetensi::with('skema')->where('isActive', $filter->isActive ?? true);

       

        if(isset($filter->sekolah)) {
            $daftar_ujikom = $daftar_ujikom->where('sekolah_id', $filter->sekolah);
        }

        $daftar_ujikom = $daftar_ujikom->get();

        if(!isset($options->complete) || (isset($options->complete) && !$options->complete) ) {
            $daftar_ujikom->transform(function($item) {
                $item = (object) $item->only(['uid','nama','tgl_awal','tgl_akhir','jml_asesi','deskripsi','skema']);
                
                $dataSkema = (object) [
                    "uid"   =>  $item->uid,
                    "nama" => $item->skema->nama,
                    "kode" => $item->skema->kode,
                    "kode" => $item->skema->kode,
                    "level_kkni" => $item->skema->level_kkni,
                    "judul_klaster" => $item->skema->judul_klaster,
                ];

                if($item->skema->parent_id != null) {
                    $dataSkema->nama_skema_induk = $item->skema->skemaInduk->nama;
                    $dataSkema->kode_skema_induk = $item->skema->skemaInduk->kode;
                }

                $item->skema = $dataSkema;
                return $item;
            });
        }
        
        return $daftar_ujikom;
    }

    public static function getAllAdvancedV2(Object $filter = null,Object $options = null, $select = [])
    {
        $filter = $filter == null ? (object) [] : $filter;
        $options = $options == null ? (object) [] : $options;
        $select = $select == [] ? [
            'uk.id', 'uk.uid', 'uk.nama', 'uk.tgl_awal', 'uk.tgl_akhir', 'uk.jml_asesi',
            's.nama as s_nama', 's.judul_klaster as s_judul_klaster', 's.parent_id as s_parent',
            't.nama as t_nama',
            'skl.nama as skl_nama'
        ] : $select;

        // $daftar_ujikom = UjiKompetensi::with('skema')->where('isActive', $filter->isActive ?? true);

        $daftar_ujikom = DB::table('uji_kompetensis as uk')->select($select);

        if(isset($filter->isActive))
            $daftar_ujikom = $daftar_ujikom->where('isActive', $filter->isActive);
       

        if(isset($filter->sekolah)) {
            $daftar_ujikom = $daftar_ujikom->where('sekolah_id', $filter->sekolah);
        }

        // SKEMA
        $daftar_ujikom = $daftar_ujikom->leftJoin('skemas as s', 'uk.skema_id', 's.id');
        $daftar_ujikom = $daftar_ujikom->leftJoin('tuks as t', 'uk.tuk_id', 't.id');
        $daftar_ujikom = $daftar_ujikom->leftJoin('sekolahs as skl', 'uk.sekolah_id', 'skl.id');

        $daftar_ujikom = $daftar_ujikom->get();



        // if(!isset($options->complete) || (isset($options->complete) && !$options->complete) ) {
        //     $daftar_ujikom->transform(function($item) {
        //         $item = (object) $item->only(['uid','nama','tgl_awal','tgl_akhir','jml_asesi','deskripsi','skema']);
                
        //         $dataSkema = (object) [
        //             "uid"   =>  $item->uid,
        //             "nama" => $item->skema->nama,
        //             "kode" => $item->skema->kode,
        //             "kode" => $item->skema->kode,
        //             "level_kkni" => $item->skema->level_kkni,
        //             "judul_klaster" => $item->skema->judul_klaster,
        //         ];

        //         if($item->skema->parent_id != null) {
        //             $dataSkema->nama_skema_induk = $item->skema->skemaInduk->nama;
        //             $dataSkema->kode_skema_induk = $item->skema->skemaInduk->kode;
        //         }

        //         $item->skema = $dataSkema;
        //         return $item;
        //     });
        // }
        
        return $daftar_ujikom;
    }

    public static function getOne($uid): UjiKompetensi
    {
        $dataUjiKompetensi = UjiKompetensi::where('uid',$uid)
                                        ->with('skema.skemaInduk')
                                        ->firstOrFail();

        return $dataUjiKompetensi;
    }

    public static function createUjiKom($data)
    {
        $sekolah = SekolahService::getOnebyUid($data->sekolah);
        if($sekolah == null) throw new Error("Sekolah Not Found", 400);

        $skema = SkemaService::getOne($data->skema, ['id']);
        if($skema == null) throw new Error("Skema not found", 400);

        $tuk = TukService::getOneByUID($data->tuk, ["tuks.id"]);
        if($tuk == null) throw new Error("TUK not found", 400);

        $dataUjiKompetensi = DB::table('uji_kompetensis')
                ->insert([
                    "uid"           =>  Str::uuid(),
                    "nama"          =>  $data->judul,
                    "tgl_awal"      =>  date('Y-m-d', strtotime('tgl_awal')),
                    "tgl_akhir"     =>  date('Y-m-d', strtotime('tgl_akhir')),
                    "jml_asesi"     =>  $data->kuota,
                    "deskripsi"     =>  $data->keterangan,
                    "isActive"      =>  $data->mode == "submit" ? true : false,
                    "skema_id"      =>  $skema->id,
                    "tuk_id"        =>  $tuk->id,
                    "sekolah_id"    =>  $sekolah->id,
                    "created_at"    =>  Carbon::now()
                ]);

        return $dataUjiKompetensi;
    }

    public static function createPendaftaran($uid, $userdata, $data): PendaftaranUji
    {
        $dataUjiKompetensi = UjiKompetensi::where('uid',$uid)->firstOrFail();
        
        $pendaftaran = new PendaftaranUji;
        $pendaftaran->user_id = $userdata->id;
        $pendaftaran->uji_kompetensi_id = $dataUjiKompetensi->id;
        

        $profile = (object) [
            "nik"                   =>  $userdata->datadiri->nik,
            "nama"                  =>  $data->nama,
            "tempat_lahir"          =>  $data->tempat_lahir,
            "tgl_lahir"             =>  $data->tgl_lahir,
            "jenis_kelamin"         =>  $data->jenis_kelamin,
            "pendidikan"            =>  $data->pendidikan,
            "kewarganegaraan"       =>  $data->kewarganegaraan,
            "alamat"                =>  $data->alamat,
            "kota"                  =>  $data->kota,
            "kode_pos"              =>  $data->kode_pos,
            "no_telp"               =>  $data->no_telp,
            "pekerjaan_instansi"    =>  $data->pekerjaan_instansi,
            "pekerjaan_jabatan"     =>  $data->pekerjaan_jabatan,
            "pekerjaan_alamat"      =>  $data->pekerjaan_alamat,
            "pekerjaan_kode_pos"    =>  $data->pekerjaan_kode_pos,
            "pekerjaan_telp"        =>  $data->pekerjaan_telp,
            "email"                 =>  $userdata->email
        ];

        $pendaftaran->dump_profile = json_encode($profile);

        $skema = (object) [
            "nama"  =>  $dataUjiKompetensi->skema->nama,
            "kode"  =>  $dataUjiKompetensi->skema->kode,
            "level_kkni"    =>  $dataUjiKompetensi->skema->level_kkni,
            "judul_klaster" =>  $dataUjiKompetensi->skema->judul_klaster
        ];

        $unit_kompetensi = $dataUjiKompetensi
                            ->skema
                            ->unitKompetensi
                            ->transform(function($uk) {
                                return (object) [
                                    "kode"  =>  $uk->kode,
                                    "judul" =>  $uk->judul,
                                    "jenis_standar" =>  $uk->jenis_standar
                                ];
                            });
        $skema->unit_kompetensi = $unit_kompetensi;
        $pendaftaran->dump_skema = json_encode($skema);

        $pendaftaran->tujuan_sertifikasi  = $data->tujuan_sertifikasi;
        $pendaftaran->catatan = '';
        $pendaftaran->disetujui = false;

        $pendaftaran->save();        

        return $pendaftaran;
    }

    public static function getAllPendaftaranSafe(Object $filter,Object $options): Collection
    {
        $daftar_pendaftaran = PendaftaranUji::with('ujiKompetensi.skema')
                                            ->with('ujiKompetensi.tuk')
                                            ->with('user.asesi')
                                            ->with('user.dataDiri')
                                            ->orderBy('created_at', 'desc');

        // FILTER UJI KOMPETENSI
        if(isset($filter->uji_kom_uid)) {
            $dataUjiKompetensi = $daftar_pendaftaran->whereHas('ujiKompetensi', function($query) use ($filter) {
                $query->where('uid', $filter->uji_kom_uid);
            });
        }

        // // FILTER STATUS
        if( isset($filter->status) && $filter->status != "" && in_array($filter->status, ['review','revisi','ditolak','disetujui'])) {
            $daftar_pendaftaran = $daftar_pendaftaran->where('status', $filter->status);
        }

        // if(isset($filter->start_date)) {
        //     $daftar_pendaftaran = $daftar_pendaftaran->where('created_at','>=',date('Y-m-d',$filter->start_date));
        // }

        $daftar_pendaftaran = $daftar_pendaftaran->get();
        
        if($options->complete) {
            $daftar_pendaftaran->transform(function($p) {
                $p->dump_skema = json_decode($p->dump_skema);
                $p->dump_profile = json_decode($p->dump_profile);
                return $p;
            });
        } else {
            $daftar_pendaftaran->transform(function($p) {
                $p->profile = json_decode($p->dump_profile);
                unset($p->dump_skema);
                unset($p->dump_profile);

                $p->data_asesi = (object) [
                    "uid"   =>  $p->user->asesi->uid,
                    "jurusan"   =>  $p->user->asesi->jurusan,
                    "no_reg"   =>  $p->user->asesi->no_reg,
                    "no_urut"   =>  $p->user->asesi->no_urut,
                    "kelas"   =>  $p->user->asesi->kelas,
                    "tahun_daftar"   =>  $p->user->asesi->tahun_daftar,
                ];

                $p->data_diri = (object) [
                    "nama"  =>  $p->user->dataDiri->nama,
                    "no_telp"  =>  $p->user->dataDiri->no_telp,
                ];

                unset($p->user);

                return $p;
            });
        }
        
        return $daftar_pendaftaran;
    }

    public static function getPendaftaranByUser($user_id): Collection
    {
        $daftar_pendaftaran = PendaftaranUji::where('user_id', $user_id)->with('ujiKompetensi')->orderBy('created_at', 'desc')->get();

        $daftar_pendaftaran->transform(function($p) {
            $p->dump_skema = json_decode($p->dump_skema);
            $p->dump_profile = json_decode($p->dump_profile);
            return $p;
        });
        return $daftar_pendaftaran;
    }

    public static function countPendaftaranActiveByUser($user_id): int
    {
        $ct_pendaftaran = PendaftaranUji::where('user_id', $user_id)->whereRaw("(status = 'revisi' OR status = 'review')")->count();

        return $ct_pendaftaran;
    }

    public static function getPendaftaranOne($user_id, $ukom_id)
    {
        $pendaftaran = PendaftaranUji::where('user_id',$user_id)->where('uji_kompetensi_id',$ukom_id)->first();

        return $pendaftaran;
    }

    public static function updateStatusPendaftaran($options)
    {
        $update = [
            "status"    => $options->status,
            "disetujui" => $options->status == 'disetujui' ? true : false,
        ];
        if($options->status == 'disetujui') {
            $update['tanggal_disetujui'] = date('Y-m-d');
        }
        // dd($options);
        $pendaftaran = DB::table('pendaftaran_ujis')->where('user_id',$options->user_id)
                    ->where('uji_kompetensi_id', $options->ujikom_id)
                    ->update($update);
        return $pendaftaran;
        // $pendaftaran->status = $options->status;
        // if($options->status == 'disetujui') {
        //     $pendaftaran->disetujui = true;
        //     $pendaftaran->tanggal_disetujui = date('Y-m-d');
        // }
        // $pendaftaran->catatan = $options->catatan;
        // $pendaftaran->save();
        // $pendaftaran = PendaftaranUji::all();
        
        return $pendaftaran;
    }

    public static function createJadwal($uid_crt, $uid_asesor, $tanggal)
    {
        $sertifikasi = DB::table('uji_kompetensis')->where('uid', $uid_crt)->first();

        if($sertifikasi == null) {
            throw new Error(404, "Sertifikasi Tidak Ada");
            return 0;
        }

        $asesor = DB::table('users')
                    ->select(['users.id', 'asesors.id as asesor_id'])
                    ->where('users.uid', $uid_asesor)
                    ->whereJsonContains('tipe', ['asesor'])
                    ->leftJoin('asesors', 'users.id', 'asesors.user_id')
                    ->first();

        if($asesor == null) {
            throw new Error(404, "Asesor Tidak Ada");
            return 0;
        }

        $insertJadwal = DB::table('jadwal_uji_koms')
            ->insert([
                "ujikom_id"         => $sertifikasi->id, 
                "tgl_pelaksanaan"   => date('Y-m-d', strtotime($tanggal)),
                "status"            => "baru",
                "asesor_id"         => $asesor->asesor_id,
                "created_at"        => Carbon::now(),
            ]);

        return $insertJadwal;
        
    }
    
}
