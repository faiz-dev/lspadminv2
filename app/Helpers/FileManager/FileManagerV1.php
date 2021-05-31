<?php
namespace App\Helpers\FileManager;

use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Bool_;

class FileManagerV1 
{
    const IMG_LOCATIONS = [
        "avatar"        =>  "/member/avatars",
        "surat-tugas"   =>  "/surat/surat-tugas/",
    ];

    const MAX_FILE_AVATAR_SIZE = 1000000;

    public function storeImageFile($file, $fileName = "", $kategori = null): String
    {

        switch($kategori) {

            case FileCategories::AVATAR : 
                // checking size
                if($file->getSize() > FileManagerV1::MAX_FILE_AVATAR_SIZE) {
                    throw new Error(400, 'File melebihi kapasitas yang ditentukan');
                }
    
                // uploading file to storage
                return $this->storeAvatar($file, $fileName);
                break;

            default: 
                throw new Error(400, "Kategori is not specified");
                break;
        }

    }

    public function deleteImageFile($fileName, $kategori = null): Int
    {
        switch($kategori) {
            case FileCategories::AVATAR : 
                return $this->deleteAvatar($fileName);
                break;
            
                default: 
                throw new Error(400, "Kategori is not specified");
                break;
        }
        return 0;
    }


    private function storeAvatar($file, $targetFileName): String 
    {
        $userId = Auth::id();
        $location = self::IMG_LOCATIONS['avatar'];

        if($targetFileName == "") {
            $fileName = Storage::putFile($location, $file);
        } else {
            $fileName = Storage::putFileAs($location, $file, $targetFileName);
        }

        Log::channel('fileUpload')->debug("Uploading file avatar [$fileName] by user $userId via storeImageFile");
        $fileName = explode("/",$fileName);
        return $fileName[count($fileName) - 1]; 
    }

    private function deleteAvatar($fileName): Int
    {
        $userId = Auth::id();
        $location = self::IMG_LOCATIONS['avatar'];
        $fileName = $location."/".$fileName;
        Storage::delete($fileName);
        Log::channel('fileUpload')->debug("deleting file avatar [$fileName] by user $userId via deleteAvatar");
        return 0;
    }
}
