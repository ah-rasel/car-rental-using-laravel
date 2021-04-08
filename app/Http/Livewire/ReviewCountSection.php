<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewCountSection extends Component
{
    public $car;
    /**
     * @var mixed
     */
    public $reviews;
protected $listeners = ['ReviewUpdated'=>'render'];

    public function mount($car)
    {
        $this->car = $car;
    }
    public function render()
    {
        $this->reviews = Review::Where('car_id',$this->car->id)->get();
        return view('livewire.review-count-section');
    }
}
