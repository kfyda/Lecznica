<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_path',
    ];

    public function formatedDate()
    {
        return $this->created_at->format('F h:i Y');
    }

    public function getURLImage()
    {
        return '/storage/' . $this->image_path;
    }
}
