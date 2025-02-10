<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('shop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $item)
    {
        $itemCollection = Shop::query()
            ->whereNot('id', '=', $item->id)
            ->where('is_available', '=', true)
            ->where('category_id', '=', $item->category_id)
            ->where('animal_id', '=', $item->animal_id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('shop.show', compact('item', 'itemCollection'));
    }
}
