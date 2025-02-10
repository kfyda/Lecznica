<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'category_id',
        'animal_id',
        'image_path',
        'description',
        'is_available'
    ];

    protected static function booted(): void
    {
        static::deleted(function (Shop $shop) {
            Storage::delete("public/$shop->image_path");
        });

        static::updating(function (Shop $shop) {
            $originalImg = $shop->getOriginal('image_path');

            if ($originalImg != $shop->image_path) Storage::delete("public/$originalImg");
        });
    }
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

    public function getPrice(): string
    {
        return str_replace('.', ',', $this->price) . ' zł';
    }

    public function scopeSearch($query, $value)
    {
        if ($value) {
            $query->where('name', 'like', "%{$value}%");
        }
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}
