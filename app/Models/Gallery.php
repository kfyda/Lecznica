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

    protected $casts = [
        'image_path' => 'json'
    ];

    protected static function booted(): void
    {
        static::deleted(function (Gallery $gallery) {
            foreach ($gallery->image_path as $image) {
                Storage::delete("public/$image");
            }
        });

        static::updating(function (Gallery $gallery) {
            $imagesToDelete = array_diff($gallery->getOriginal('image_path'), $gallery->image_path);

            foreach ($imagesToDelete as $image) {
                Storage::delete("public/$image");
            }
        });
    }
    public function formatedDate()
    {
        return $this->created_at->format('F h:i Y');
    }

    public function getURLImage(string $image)
    {
        return '/storage/' . $image;
    }
}
