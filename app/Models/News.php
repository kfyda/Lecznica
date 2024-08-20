<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'description',
    ];

    protected $casts = [
        'image_path' => 'json'
    ];

    protected static function booted(): void
    {
        static::deleted(function (News $news) {
            foreach ($news->image_path as $image) {
                Storage::delete("public/$image");
            }
        });

        static::updating(function (News $news) {
            $imagesToDelete = array_diff($news->getOriginal('image_path'), $news->image_path);

            foreach ($imagesToDelete as $image) {
                Storage::delete("public/$image");
            }
        });
    }

    public function getShortDescription(int $words = 48): string
    {
        return Str::words($this->description, $words);
    }

    public function formatedDate()
    {
        return $this->created_at->isoFormat('dddd, D MMMM YYYY');
    }

    public function formatedTime()
    {
        return $this->created_at->isoFormat('H:mm');
    }

    public function getURLImage()
    {
        foreach ($this->image_path as $image) {
            if (str_starts_with($image, 'http')) {
                return $image;
            }
            return '/storage/' . $image;
        }
    }

    public function scopeSearch($query, $value)
    {
        if ($value) {
            $query->where('title', 'like', "%{$value}%");
        }
    }
}
