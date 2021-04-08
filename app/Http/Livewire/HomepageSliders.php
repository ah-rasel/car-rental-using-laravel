<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class HomepageSliders extends Component
{
    public $sliders;
    public function mount()
    {
        $this->sliders = Slider::with(['car'])
            ->Where('approve_status',1)
            ->orderBy('id','desc')
            ->get();
    }
    public function render()
    {
        return view('livewire.homepage-sliders');
    }
}
