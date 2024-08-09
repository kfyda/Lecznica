<?php

namespace App\Livewire;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShopSearch extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Url(history: true)]
    public string $search = '';

    public function render()
    {
        $items = Shop::query()
            ->search($this->search)
            ->paginate(12);
        return view('livewire.shop-search', compact('items'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
