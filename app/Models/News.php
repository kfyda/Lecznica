<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function getShortDescription(int $words = 48): string
    {
        return Str::words(strip_tags($this->description), $words);
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
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }
        return '/storage/' . $this->image_path;
    }
}
