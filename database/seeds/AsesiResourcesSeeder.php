<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AsesiResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            [
                "name"=>   "AFIF FIRMANSYAH",
                "email" =>  "afif184979@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANIM BUDIYAH PRASETYANI",
                "email" =>  "anim184980@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARIEF WAHYU WICAKSONO",
                "email" =>  "arief184981@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "CISWATI",
                "email" =>  "ciswati184982@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DEBY DELLA PUSPITA",
                "email" =>  "deby184983@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ELANG SURYA ADITIYA",
                "email" =>  "elang184984@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "EVI ANANTA PUTRI",
                "email" =>  "evi184985@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FAJAR BAGUS NUGROHO",
                "email" =>  "fajar184986@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FATMA SARI",
                "email" =>  "fatma184987@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FENTI RISKAROMAH",
                "email" =>  "fenti184988@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FERISKA UMAMI",
                "email" =>  "feriska184989@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "IDA RANA SARI",
                "email" =>  "ida184990@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "IMAN HUDI ILHAM PERMANA",
                "email" =>  "iman184991@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "INDAH SAFITRI",
                "email" =>  "indah184992@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "INDO HADINATA",
                "email" =>  "indo184993@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "KIKI FINANTI",
                "email" =>  "kiki184994@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "KISWANTO",
                "email" =>  "kiswanto184995@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "KUMALASARI",
                "email" =>  "kumalasari184996@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANA NUR AENI",
                "email" =>  "ana185015@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARI OKTAVIANTO",
                "email" =>  "ari185016@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AYUK WINDI ARTI",
                "email" =>  "ayuk185017@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIAN AYU OKTAVIANA",
                "email" =>  "dian185018@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIAN FITRIANI",
                "email" =>  "dian185019@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DINA WINANTI",
                "email" =>  "dina185020@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIYAS KHOIRU NISA",
                "email" =>  "diyas185021@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "EVI",
                "email" =>  "evi185022@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FEBRI SAPUTRA WIJAYA",
                "email" =>  "febri185023@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FIRMAN HIDAYAT",
                "email" =>  "firman185024@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "LUKITA SARI",
                "email" =>  "lukita185025@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "MISBAHUL AULIYAH",
                "email" =>  "misbahul185026@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "MOHAMAD SIROJUDIN",
                "email" =>  "mohamad185027@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "MUHAMMAD AGIL SAPUTRA",
                "email" =>  "agil185028@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "NABILLA ARNINDA",
                "email" =>  "nabilla185029@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "NOKHITA AYUNINGTIYAS",
                "email" =>  "nokhita185030@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "NURAISAH",
                "email" =>  "nuraisah185031@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "NURUL FADILAH",
                "email" =>  "nurul185032@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ADI SYAPUTRA",
                "email" =>  "adi184800@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ALI SALAM",
                "email" =>  "ali184801@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANDIKA WIDI YULISTIARDI",
                "email" =>  "andika184802@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANDRIANSYAH DWI PUTRA",
                "email" =>  "andriansyah184803@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARDIYANTO",
                "email" =>  "ardiyanto184804@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARIF MUCHAIMIN",
                "email" =>  "arif184805@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARYA PUTRA ERLANGGA",
                "email" =>  "arya184806@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AULIA AKHMAD FAUZI",
                "email" =>  "aulia184807@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "BAYU ADI SETYAWAN",
                "email" =>  "bayu184808@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "BAYU PURWO AJI",
                "email" =>  "bayu184809@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DEWI KARTIKA",
                "email" =>  "dewi184810@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DHITO SATRIO",
                "email" =>  "dhito184811@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DHOFIN ARDIANSYAH",
                "email" =>  "dhofin184812@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DWI KURNIAWAN",
                "email" =>  "dwi184813@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DWI SULISTYOWATI",
                "email" =>  "dwi184814@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FAJAR ARIFIANTO",
                "email" =>  "fajar184815@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FIRMAN ADI PRADANA",
                "email" =>  "firman184816@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "IFNU ZAEFULA",
                "email" =>  "ifnu184817@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ADAM SURYO PRANOTO",
                "email" =>  "adam184836@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AHMAD GALIH RIURAHMATULAH",
                "email" =>  "ahmad184837@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANGGA ADI PRATAMA",
                "email" =>  "angga184838@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARYA SONALI",
                "email" =>  "arya184839@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "BAGAS ADI SAPUTRA",
                "email" =>  "bagas184840@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "BISMA ARYA SAPUTRA",
                "email" =>  "bisma184841@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DENNY RAMADHAN",
                "email" =>  "denny184842@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIAH NOVIANI",
                "email" =>  "diah184843@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "EDI RIYANTO",
                "email" =>  "edi184844@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FARID WIDIYANTO",
                "email" =>  "farid184845@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FERI RISDIANTO",
                "email" =>  "feri184846@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "GALIH INSANUL FATTAH",
                "email" =>  "galih184847@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "GALIH MARETA",
                "email" =>  "galih184848@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "GHULAMAN ZAKIYYA ATSAQIF",
                "email" =>  "ghulaman184849@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "HERMAWAN",
                "email" =>  "hermawan184850@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "IPNU HARYANTO",
                "email" =>  "ipnu184851@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "IVAN ADIARTO",
                "email" =>  "ivan184852@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ADIAN SAPUTRA",
                "email" =>  "adian184872@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ADITYA PRATAMA",
                "email" =>  "aditya184873@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AHMAD SUKRON",
                "email" =>  "ahmad184874@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANDI KURNIAWAN",
                "email" =>  "andi184875@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "BAGUS HERMAWAN",
                "email" =>  "bagus184877@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "CELVIN ROY SRI PARDIKI",
                "email" =>  "celvin184878@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "CHUMAEDI",
                "email" =>  "chumaedi184879@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "EKA PUTRA SURYA WIJAYA",
                "email" =>  "eka184880@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ELANG SURYA FITRAH RAHMAN",
                "email" =>  "elang184881@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ERIC IMAM BAGUS PANUNTUN",
                "email" =>  "eric184882@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FAZA AMANUN",
                "email" =>  "faza184883@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FICKY ROMADHON",
                "email" =>  "ficky184884@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FIRMAN SYAHARUN",
                "email" =>  "firman184885@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "IMAM AZMI",
                "email" =>  "imam184886@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "LUTFAN MAULANA ABRISAM ZAFRI",
                "email" =>  "lutfan184887@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "M. ASY SAID",
                "email" =>  "m.184888@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "M. HANIIFUZZIDAN",
                "email" =>  "m.184889@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ADITYA ANGGORO PUTRA",
                "email" =>  "aditya184731@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AFIF FILADI",
                "email" =>  "afif184732@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AGUNG SETIA AJI",
                "email" =>  "agung184733@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AGUS MIFTAH",
                "email" =>  "agus184734@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ALFAIS RIDHO SURYA",
                "email" =>  "alfais184735@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARIS SETIAWAN",
                "email" =>  "aris184736@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AZIS FAUZAN",
                "email" =>  "azis184737@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "CHAMDIN SUWITNYO",
                "email" =>  "chamdin184738@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIAS EKA PERMANA",
                "email" =>  "dias184739@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIMAS AGUNG NUGROHO",
                "email" =>  "dimas184740@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "EDI SETIAWAN",
                "email" =>  "edi184741@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FERNANDA SULISTIONO",
                "email" =>  "fernanda184742@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "FIKI YULIANTO",
                "email" =>  "fiki184743@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "GUSTOMI",
                "email" =>  "gustomi184744@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "HERI HERMAWAN",
                "email" =>  "heri184745@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ISRO' ILHAM AL ADZKAR",
                "email" =>  "isro'184746@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "JAZULI",
                "email" =>  "jazuli184747@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "MIFTAKHUL ARZAQ",
                "email" =>  "miftakhul184748@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ACHMAD SUGIONO",
                "email" =>  "achmad184766@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ADIT SUCIPTO",
                "email" =>  "adit184767@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AGAL SEPTA PRATAMA",
                "email" =>  "agal184768@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AGUNG BAYU LAKSONO",
                "email" =>  "agung184769@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "AMANDA NUR HALIZAH",
                "email" =>  "amanda184770@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANGGI RISMAWATI",
                "email" =>  "anggi184771@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ANGGIT SETIAWAN",
                "email" =>  "anggit184772@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARIEF DWI PANGESTU",
                "email" =>  "arief184773@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARIZAL YULIANTO",
                "email" =>  "arizal184774@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "ARJUNA SETYAWAN",
                "email" =>  "arjuna184775@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "BAGUS HADI PRAYOGO",
                "email" =>  "bagus184776@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "CISNANDRI",
                "email" =>  "cisnandri184777@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DAVID EKO EFRIANTO",
                "email" =>  "david184778@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DIMAS AZIZ KURNIAWAN",
                "email" =>  "dimas184779@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "DWI PRASETYA",
                "email" =>  "dwi184780@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "EMILLUL FATA",
                "email" =>  "emillul184781@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "GILANG RAMADHAN A",
                "email" =>  "gilang184782@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],
            [
                "name"=>   "GILANG RAMADHAN B",
                "email" =>  "gilang184783@student.smkn1kandeman.sch.id",
                "uid"   =>   Str::uuid(),
                "tipe"  => json_encode(["asesi"]),
                "password" =>   Hash::make("root", [
                        'memory' => 1024,
                        'time'  => 2,
                        'threads' => 2
                    ]),
            ],

        ]);
    }
}
