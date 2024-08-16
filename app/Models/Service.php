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
//        'price',
        'description',
        'image_path',
    ];

//    protected $casts = [
//        'image_path' => 'array',
//    ];

    public function getURLImage()
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }
        return '/storage/' . $this->image_path;
    }
}
