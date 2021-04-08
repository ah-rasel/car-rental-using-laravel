<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Livewire\Component;

class DashboardCountcards extends Component
{
    public $total_cars;
    public $total_brands;
    public $new_rents;
    public $total_users;

    public function mount()
    {
        $this->getAllValues();
    }
    public function render()
    {
        $this->getAllValues();
        return view('livewire.dashboard-countcards');
    }

    private function getAllValues()
    {
        $this->total_cars = Car::count();
        $this->total_brands = Brand::count();
        $this->new_rents = Rent::count();
        $this->total_users = User::Where('role_id',2)->count();
    }
}
