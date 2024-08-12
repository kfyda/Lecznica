<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'price',
        'description',
        'image_path',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];

    public function getURLImage()
    {
        foreach ($this->image_path as $image)
        {
            if (str_starts_with($image, 'http')) {
                return $image;
            }
            return '/storage/' . $image;
        }
    }
}
