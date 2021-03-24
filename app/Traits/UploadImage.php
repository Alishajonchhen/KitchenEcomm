<?php

namespace App\Traits;

trait UploadImage
{

    //Stores Image to public folder
    public function uploadimagePublic($file, $storelocation)
    {
        //get filename with extension
        $filenameWithExt = $file->getClientOriginalName();
        // get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // get just ext
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = public_path($storelocation);
        $file->move($path, $fileNameToStore);
        return $fileNameToStore;
    }
}
