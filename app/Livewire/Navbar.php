<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $open = false;
    public $openDropdown = false;

    public function render()
    {
        return view('livewire.navbar', [
            'services' => \App\Models\Service::all(), // Or whatever service fetching logic you have
            'user' => Auth::user(),
        ]);
    }

    public function toggle()
    {
        $this->open = !$this->open;
    }

    public function toggleDropdown()
    {
        $this->openDropdown = !$this->openDropdown;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
