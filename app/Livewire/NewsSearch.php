<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsSearch extends Component
{
    public int $itemsPerPage = 8; // Domyślna liczba elementów na stronę
    public int $id = 0;

    public function mount($recentNews)
    {
        $this->id = $recentNews->id;
    }

    public function render()
    {
        $query = News::query()
            ->whereNot('id', '=', $this->id)
            ->orderBy('created_at', 'desc');

        $newsCollection = $query->paginate($this->itemsPerPage);

        return view('livewire.news-search', compact('newsCollection'));
    }
}
