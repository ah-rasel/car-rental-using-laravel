<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class AllTimeHitBrands extends Component
{

    public function render()
    {
        $brandsCount  = Brand::count();
        $brands = Brand::with(['cars'])->take(6)->get();
        return view('livewire.all-time-hit-brands',compact('brands','brandsCount'));
    }
}
