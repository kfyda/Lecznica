<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_path',
    ];

//    protected $casts = [
//        'image_path' => 'json'
//    ];

    protected static function booted(): void
    {
        static::deleted(function (Gallery $gallery) {
            Storage::delete("public/$gallery->image_path");
        });

        static::updating(function (Gallery $gallery) {
            $originalImg = $gallery->getOriginal('image_path');

            if ($originalImg != $gallery->image_path ) Storage::delete("public/$originalImg");
        });
    }
    public function formatedDate()
    {
        return $this->created_at->format('F h:i Y');
    }

    public function getURLImage()
    {
        return '/storage/' . $this->image_path;
    }
}
