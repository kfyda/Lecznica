<?php

namespace App\Livewire;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class ShopSearch extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortOption = 'latest'; // Domyślna opcja sortowania

    public function render()
    {
        $query = Shop::query()
            ->search($this->search);

        switch ($this->sortOption) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'alphabetical':
                $query->orderBy('name', 'asc');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $items = $query->paginate(12);

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
