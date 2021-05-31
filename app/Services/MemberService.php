<?php

namespace App\Services;
use App\Models\{User, Asesi, Asesor, ManajerJejaring, DataDiri};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MemberService 
{
    public static function getAll($tipe, $deleted = false, $select = '*')
    {        
        $dataMember = User::select(['name']);
        switch($tipe) {
            case 'asesi' : 
                $dataMember = $dataMember->whereJsonContains('tipe',['asesi'])->with('dataDiri')->with('asesi');
            break;
            case 'manajer_jejaring':
                $dataMember = $dataMember->whereJsonContains('tipe', ['manajer_jejaring'])->with('dataDiri','manajerJejaring');
            break;
            case 'asesor':
                $dataMember = $dataMember->whereJsonContains('tipe', ['asesor'])->with('dataDiri','asesor');
            break;
            case 'manajer':
                $dataMember = $dataMember->whereJsonContains('tipe', ['manager'])->with('dataDiri');
            break;
            default: 
                $dataMember = $dataMember->whereJsonDoesntContain('tipe', ['manager'])->with('dataDiri');
            break;
        }

        
        if($deleted)
            $dataMember = $dataMember->withTrashed();

        return $dataMember->get();
    }

    public static function getAllQB($tipe, $deleted = false, $select = [])
    {        
        $dataMember = DB::table('users')->select($select);
        switch($tipe) {
            case 'asesi' : 
                $dataMember = $dataMember->whereJsonContains('users.tipe',['asesi'])
                                            ->leftJoin('data_diris', 'users.id', 'data_diris.user_id')
                                            ->leftJoin('asesis', 'users.id', 'asesis.user_id');
            break;
            case 'manajer_jejaring':
                $dataMember = $dataMember->whereJsonContains('tipe', ['manajer_jejaring'])->with('dataDiri','manajerJejaring');
            break;
            case 'asesor':
                $dataMember = $dataMember->whereJsonContains('tipe', ['asesor'])->with('dataDiri','asesor');
            break;
            case 'manajer':
                $dataMember = $dataMember->whereJsonContains('tipe', ['manager'])->with('dataDiri');
            break;
            default: 
                $dataMember = $dataMember->whereJsonDoesntContain('tipe', ['manager'])->with('dataDiri');
            break;
        }

        
        if($deleted)
            $dataMember = $dataMember->withTrashed();

        return $dataMember->get();
    }

    public function createAccount($data): User
    {
        // create new instance        
        $user = new User();
        $user->uid = Str::uuid();
        $user->name = $data->nama;
        $user->email = $data->email;
        $user->password =  Hash::make($data->password, [
            'memory' => 1024,
            'time'  => 2,
            'threads' => 2
        ]);
        $user->tipe = $data->tipe;
        
        // saving
        $user->save();
        
        // return result
        return $user;
    }

    public function fillDataDiri($idMember, $data): DataDiri
    {
        $dataDiri = new DataDiri();
        $dataDiri->user_id = $idMember;
        $dataDiri->nik                  = $data->nik;
        $dataDiri->nama                 = $data->nama;
        $dataDiri->gelar_depan          = isset($data->gelar_depan) ? $data->gelar_depan : "";
        $dataDiri->gelar_belakang       = isset($data->gelar_belakang) ? $data->gelar_belakang : "";
        $dataDiri->jenis_kelamin        = $data->jenis_kelamin == "on" ? "L" : "P";
        $dataDiri->tempat_lahir         = $data->tempat_lahir;
        $dataDiri->tanggal_lahir        = date('Y-m-d', strtotime($data->tanggal_lahir));
        $dataDiri->url_foto             = isset($data->url_foto) ? $data->url_foto : "";
        $dataDiri->no_telp              = $data->no_telp;
        $dataDiri->pendidikan_terakhir  = isset($data->pendidikan_terakhir)  ? $data->pendidikan_terakhir : "";
        $dataDiri->pekerjaan_instansi   = $data->pekerjaan_instansi;
        $dataDiri->pekerjaan_jabatan    = $data->pekerjaan_jabatan;
        $dataDiri->pekerjaan_alamat     = $data->pekerjaan_alamat;
        $dataDiri->pekerjaan_telp       = $data->pekerjaan_telp;
        $dataDiri->pekerjaan_kode_pos   = $data->pekerjaan_kode_pos;
        $dataDiri->domisili_alamat      = $data->domisili_alamat;
        $dataDiri->domisili_provinsi    = $data->domisili_provinsi;
        $dataDiri->domisili_kota        = $data->domisili_kota;
        $dataDiri->domisili_kode_pos    = $data->domisili_kode_pos;
        $dataDiri->ktp_alamat           = $data->ktp_alamat;
        $dataDiri->ktp_provinsi         = $data->ktp_provinsi;
        $dataDiri->ktp_kota             = $data->ktp_kota;
        $dataDiri->ktp_kode_pos         = $data->ktp_kode_pos;

        $dataDiri->save();
        return $dataDiri;
    }
    
    public function createAsesi($idMember, $data): Asesi
    {
        $dataAsesi = new Asesi();

        DB::transaction(function() use($idMember, $data, $dataAsesi) {
            // find last nomor urut
            $lastUrut = Asesi::select('no_urut', 'tahun_daftar')->latest()->first();
            $noUrutTerakhir = $lastUrut != null ? $lastUrut->no_urut+1 : 1;
            $dataAsesi->uid = Str::uuid();
            $dataAsesi->user_id = $idMember;
            $dataAsesi->no_urut = $noUrutTerakhir;
            $dataAsesi->tahun_daftar = date('Y');
            $dataAsesi->no_reg = str_pad($noUrutTerakhir++,7,"0", STR_PAD_LEFT) ." ".date('Y');
            $dataAsesi->jurusan = $data->jurusan;
            $dataAsesi->kelas = $data->kelas;
            $dataAsesi->tipe = $data->tipe;
            $dataAsesi->sekolah_id = 1;
            $dataAsesi->isActive = true;
            $dataAsesi->status = 'active';
            
            $dataAsesi->save();
        });
        
        return $dataAsesi;
    }

    public function createAsesor($idMember, $data): Asesor
    {

        // lsp induk 
        $sekolah = SekolahService::getOnebyUid($data->lsp_induk, ['id']);

        $dataAsesor = new Asesor();
        $dataAsesor->uid = Str::uuid();
        $dataAsesor->user_id = $idMember;
        $dataAsesor->met = $data->met;
        $dataAsesor->lsp_induk = $sekolah->id;
        
        $dataAsesor->save();

        return $dataAsesor;
    }

    public function createManajerJejaring($idMember, $data): ManajerJejaring
    {
        $dataManajerJejaring = new ManajerJejaring();

        return $dataManajerJejaring;
    }

    public static function getOne($uid, $tipe = ''): User
    { 
        $dataMember = User::where('uid', $uid);
        switch($tipe) {
            case 'asesi' : 
                $dataMember = $dataMember->whereJsonContains('tipe',['asesi'])->with('dataDiri','asesi','pendaftaran');
            break;
            case 'manajer_jejaring':
                $dataMember = $dataMember->whereJsonContains('tipe', ['manajer_jejaring'])->with('dataDiri','manajerJejaring');
            break;
            case 'asesor':
                $dataMember = $dataMember->whereJsonContains('tipe', ['asesor'])->with('dataDiri','asesor');
            break;
            case 'manajer':
                $dataMember = $dataMember->whereJsonContains('tipe', ['manager'])->with('dataDiri');
            break;
            default: 
                $dataMember = $dataMember->whereJsonDoesntContain('tipe', ['manager'])->with('dataDiri');
            break;
        }
        return $dataMember->firstOrFail();
    }

    public static function getOneAsesiQB($user_id){
        $user = DB::table('users as u')
                    ->where('u.id', $user_id)
                    ->select([
                        'dd.nama as nama', 'dd.url_foto',
                        'u.uid','u.email',
                        'skl.nama as sekolah',
                        'a.no_reg','a.jurusan'
                    ]);
        $user = $user->leftJoin('data_diris as dd', 'u.id', 'dd.user_id')
                    ->leftJoin('asesis as a', 'u.id', 'a.user_id')
                    ->leftJoin('sekolahs as skl', 'a.sekolah_id', 'skl.id');

        return $user->first();
    }

    public function updateAccount($uuid, $data): User
    {
        // create new instance
        $user = User::where('uid', $uuid)->firstOrFail();
        if(isset($data->nama))
            $user->name = $data->nama;
        if(isset($data->email))
            $user->email = $data->email;

        if(isset($user->password)) {
            $user->password =  Hash::make($data->password, [
                'memory' => 1024,
                'time'  => 2,
                'threads' => 2
            ]);
        }
        if(isset($data->tipe))
            $user->tipe = $data->tipe;
        
        // saving
        $user->save();
        
        // return result
        return $user;
    }

    public function updateDataAsesor($user_id, $data): Asesor
    {
        // create new instance
        $asesor = Asesor::where('user_id', $user_id)->first();
        if($asesor == null) throw Error(404);

        if(isset($data->met))
            $asesor->met = $data->met;

        if(isset($data->lsp_induk)) {
            $sekolah = SekolahService::getOnebyUid($data->lsp_induk, ['id']);
            $asesor->lsp_induk = $sekolah->id;
        }

        // saving
        $asesor->save();
        
        // return result
        return $asesor;
    }
    
    public function grantAsesorToUser($uid): User
    {
        $dataMember = User::where('uid', $uid)->firstOrFail();
        $tipe = json_decode($dataMember->tipe);
        if(!in_array('asesor', $tipe)) {
            array_push($tipe, 'asesor');
            $dataMember->tipe = json_encode($tipe);
            $dataMember->save();
        }

        return $dataMember;
    }

    public function revokeAsesor($uid): User
    {
        $dataMember = User::where('uid', $uid)->firstOrFail();
        $tipe = json_decode($dataMember->tipe);
        if(in_array('asesor', $tipe)) {
            $indexTarget = array_search('asesor', $tipe);
            array_splice($tipe, $indexTarget, 1);
            $dataMember->tipe = json_encode($tipe);
            $dataMember->save();
        }

        return $dataMember;
    }

    public function grantManajerJejaring($uid): User
    {
        $dataMember = User::where('uid', $uid)->firstOrFail();
        $tipe = json_decode($dataMember->tipe);
        if(!in_array('manajer_jejaring', $tipe)) {
            array_push($tipe, 'manajer_jejaring');
            $dataMember->tipe = json_encode($tipe);
            $dataMember->save();
        }

        return $dataMember;
    }

    public function revokeManajerJejaring($uid): User
    {
        $dataMember = User::where('uid', $uid)->firstOrFail();
        $tipe = json_decode($dataMember->tipe);
        if(in_array('manajer_jejaring', $tipe)) {
            $indexTarget = array_search('manajer_jejaring', $tipe);
            array_splice($tipe, $indexTarget, 1);
            $dataMember->tipe = json_encode($tipe);
            $dataMember->save();
        }

        return $dataMember;
    }

    public function updateDataDiri($idMember, $data): DataDiri
    {
        $dataDiri = DataDiri::where('user_id', $idMember)->firstOrFail();
                
        $dataDiri->nama                 = $data->nama;
        $dataDiri->gelar_depan          = isset($data->gelar_depan) ? $data->gelar_depan : "";
        $dataDiri->gelar_belakang       = isset($data->gelar_belakang) ? $data->gelar_belakang : "";
        $dataDiri->jenis_kelamin        = $data->jenis_kelamin == "on" ? "L" : "P";
        $dataDiri->tempat_lahir         = $data->tempat_lahir;
        $dataDiri->tanggal_lahir        = date('Y-m-d', strtotime($data->tanggal_lahir));
        $dataDiri->url_foto             = isset($data->url_foto) ? $data->url_foto : "";
        $dataDiri->no_telp              = $data->no_telp;
        $dataDiri->pendidikan_terakhir  = isset($data->pendidikan_terakhir)  ? $data->pendidikan_terakhir : "";
        $dataDiri->pekerjaan_instansi   = $data->pekerjaan_instansi;
        $dataDiri->pekerjaan_jabatan    = $data->pekerjaan_jabatan;
        $dataDiri->pekerjaan_alamat     = $data->pekerjaan_alamat;
        $dataDiri->pekerjaan_telp       = $data->pekerjaan_telp;
        $dataDiri->pekerjaan_kode_pos   = $data->pekerjaan_kode_pos;
        $dataDiri->domisili_alamat      = $data->domisili_alamat;
        $dataDiri->domisili_provinsi    = $data->domisili_provinsi;
        $dataDiri->domisili_kota        = $data->domisili_kota;
        $dataDiri->domisili_kode_pos    = $data->domisili_kode_pos;
        $dataDiri->ktp_alamat           = $data->ktp_alamat;
        $dataDiri->ktp_provinsi         = $data->ktp_provinsi;
        $dataDiri->ktp_kota             = $data->ktp_kota;
        $dataDiri->ktp_kode_pos         = $data->ktp_kode_pos;

        $dataDiri->save();
        return $dataDiri;
    }

    public function updateAsesi($idMember, $data): Asesi
    {
        $dataAsesi = Asesi::where('user_id', $idMember)->firstOrFail();
        $dataAsesi->tipe = $data->tipe;
        $dataAsesi->isActive = $data->isActive;
        $dataAsesi->status = $data->status;

        $dataAsesi->save();
        
        return $dataAsesi;
    }

    public function updateAsesor($idMember, $data): Asesor
    {
        $dataAsesor = Asesor::where('user_id', $idMember)->firstOrFail();
        $dataAsesor->met = $data->met;
        $dataAsesor->lsp_induk = $data->lsp_induk;
        
        $dataAsesor->save();

        return $dataAsesor;
    }

    public function updateManajerJejaring($idMember, $data): ManajerJejaring
    {
        $dataManajerJejaring = new ManajerJejaring();

        return $dataManajerJejaring;
    }

    public function deleteMember($uid)
    {
        $dataMember = User::where('uid', $uid)->firstOrFail();
        $dataMember->delete();
    }

    public function getMemberById($id)
    {
        $dataMember = User::where('id', $id)->firstOrFail();
        return $dataMember;
    }

    public function deleteAsesorDataByUserId($user_id)
    {
        return DB::table('asesors')->where('user_id', $user_id)->delete();
    }

    public function deleteDataDiriByUserId($user_id)
    {
        return DB::table('data_diris')->where('user_id', $user_id)->delete();
    }

    public function restoreMember($uid): User
    {
        $dataMember = User::where('uid', $uid)->withTrashed()->firstOrFail();
        $dataMember->restore();

        return $dataMember;
    }

    // public function getOneById(Type $var = null)
    // {
    //     # code...
    // }
}
