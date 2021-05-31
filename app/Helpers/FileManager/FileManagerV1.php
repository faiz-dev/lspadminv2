<?php
namespace App\Helpers\FileManager;

use Illuminate\Support\Facades\Storage;

class FileManagerV1 
{
    protected $imgLocations = [
        "avatar"        =>  "/member/avatars",
        "surat-tugas"   =>  "/surat/surat-tugas/",
    ];

    public static function storeImageFile($file,String $kategori = null): String
    {
        

        return $fileName; 
    }
}
