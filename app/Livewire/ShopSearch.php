<?php

namespace App\Livewire;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class ShopSearch extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';
    public string $sortOption = 'latest'; // Domyślna opcja sortowania

    public function render()
    {
        $items = Shop::query()
            ->search($this->search);

        switch ($this->sortOption) {
            case 'price_asc':
                $items->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $items->orderBy('price', 'desc');
                break;
            case 'alphabetical':
                $items->orderBy('name', 'asc');
                break;
            case 'latest':
            default:
                $items->orderBy('created_at', 'desc');
                break;
        }

        $items = $items->paginate(12);

        return view('livewire.shop-search', compact('items'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSortOption()
    {
        $this->resetPage();
    }
}
