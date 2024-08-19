<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isFalse;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Gallery::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('gallery.index', compact('photos'));
    }
}
