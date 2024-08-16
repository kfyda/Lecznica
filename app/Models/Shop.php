<?php

namespace App\Models;

use App\Enums\CategoryTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'category',
        'image_path',
        'description',
        'is_available'
    ];

    protected $casts = [
        'category' => CategoryTypes::class
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

    public function getPrice():string
    {
        return str_replace('.', ',', $this->price) . ' zł';
    }

    public function scopeSearch($query, $value)
    {
        if ($value) {
            $query->where('name', 'like', "%{$value}%");
        }
    }
}
