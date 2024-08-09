<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
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
        'image_path',
        'description',
        'is_available'
    ];

    public function formatedDate()
    {
        return $this->created_at->format('F h:i Y');
    }

    public function getURLImage()
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }
        return '/storage/' . $this->image_path;
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }
}
