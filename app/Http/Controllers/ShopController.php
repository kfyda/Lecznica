<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
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
        $shopCollection = Shop::query()
            ->whereNot('id', '=', $item->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        return view('shop.show', compact('item'));
    }
}
