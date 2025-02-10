<?php

namespace App\Livewire;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class ShopSearch extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortOption = 'latest'; // Domyślna opcja sortowania
    public string $categoryOption = ''; // Domyślna opcja bez filtrowania kategorii
    public string $animalOption = ''; // Domyślna opcja bez filtrowania zwierząt
    public int $itemsPerPage = 12; // Domyślna liczba elementów na stronę
    public bool $showAll = false; // Flaga dla opcji "wyświetl wszystko"

    public function render()
    {
        $animals = Animal::all();
        $categories = Category::all();

        $query = Shop::query()
            ->where('is_available', '=', true)
            ->search($this->search);

        if (!empty($this->categoryOption)) {
            $query->where('category_id', '=', $this->categoryOption);
        }

        if (!empty($this->animalOption)) {
            $query->where('animal_id', '=', $this->animalOption);
        }

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

        return view('livewire.shop-search', ['animals' => $animals, 'categories' => $categories, 'items' => $items]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSortOption()
    {
        $this->resetPage();
    }

    public function updatedCategoryOption()
    {
        $this->resetPage();
    }

    public function updatedAnimalOption()
    {
        $this->resetPage();
    }
}
