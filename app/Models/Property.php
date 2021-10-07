<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;

class Property extends Model
{
    use HasFactory;

    protected $uploadPath = "user-uploads/";

    public function saveImage ($filepath, $name = "") {
        $filename = $this->id . "_" . pathinfo($filepath, PATHINFO_FILENAME);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        if(!empty($name)) {
            $filename = $this->id . "_" . pathinfo($name, PATHINFO_FILENAME);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
        }
        $filename_full = $filename . "." . $extension;
        $filename_thumbnail = $filename . "_thumbnail" . "." . $extension;

        if (!file_exists($this->uploadPath)) {
            mkdir($this->uploadPath, 666, true);
        }

        $image = new ImageManager();
        $image->make($filepath)->save($this->uploadPath . $filename_full);
        
        $thumbnail = new ImageManager();
        $thumbnail->make($filepath)->resize(300, 300)->save($this->uploadPath . $filename_thumbnail);
        
        $this->image_url = $this->uploadPath . $filename_full;
        $this->thumbnail_url = $this->uploadPath . $filename_thumbnail;
        $this->save();
    }
}
