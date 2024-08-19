<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $recentNews = News::query()
            ->orderBy('created_at', 'desc')
            ->first();

        return view('news.index', compact('recentNews'));
    }

    public function show(News $news)
    {
        $newsCollection = News::query()
            ->whereNot('id', '=', $news->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        return view('news.show', compact('news', 'newsCollection'));
    }
}
