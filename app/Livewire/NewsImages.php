<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsImages extends Component
{
    protected News $news;

    public function mount(News $news)
    {
        $this->news = $news;
    }

    public function render()
    {
        $news = $this->news;
        return view('livewire.news-images', compact('news'));
    }
}
