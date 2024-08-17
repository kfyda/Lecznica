<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
//        'price',
        'description',
        'image_path',
    ];

//    protected $casts = [
//        'image_path' => 'array',
//    ];
    protected static function booted(): void
    {
        static::deleted(function (Service $service) {
            foreach ($service->image_path as $image) {
                Storage::delete("public/$image");
            }
        });

        static::updating(function (Service $service) {
            $originalImg = $service->getOriginal('image_path');

            Storage::delete("public/$originalImg");
        });
    }
    public function getURLImage()
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }
        return '/storage/' . $this->image_path;
    }
}
