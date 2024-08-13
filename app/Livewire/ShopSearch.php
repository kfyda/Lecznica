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
    public int $itemsPerPage = 12; // Domyślna liczba elementów na stronę
    public bool $showAll = false; // Flaga dla opcji "wyświetl wszystko"

    public function render()
    {
        $query = Shop::query()->search($this->search);

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

        if ($this->showAll) {
            $items = $query->get(); // Pobierz wszystkie elementy bez paginacji
        } else {
            $items = $query->paginate($this->itemsPerPage);
        }

        return view('livewire.shop-search', ['items' => $items]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSortOption()
    {
        $this->resetPage();
    }

    public function updatedItemsPerPage($value)
    {
        if ($value === 'all') {
            $this->showAll = true;
            $this->itemsPerPage = 999999; // Wymuszenie bardzo dużej liczby dla "wszystko"
        } else {
            $this->showAll = false;
            $this->itemsPerPage = (int) $value;
        }

        $this->resetPage();
    }
}
