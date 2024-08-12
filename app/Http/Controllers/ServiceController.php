<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {

        return view('services.show', compact('service'));
    }
}
