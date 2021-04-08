<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewSection extends Component
{
    public $car;
    public $reviews;
    public $review_text;
    public $review_value ;
    public function mount($car)
    {
        $this->car = $car;
    }

    public function addReview()
    {
        //Need to verify first if the user is logged in or not

        $data = $this->validate([
            'review_text'=>'required',
            'review_value'=>'required|numeric',
        ]);
        Review::create([
        'review_text'=>$data['review_text'],
        'review_point'=>$data['review_value'],
        'car_id'=>$this->car->id,
        'user_id'=>9,
        ]);
        $this->review_text ='';
        $this->review_value =null;
        $this->emit('ReviewUpdated');
    }
    public function render()
    {
        $this->reviews = Review::Where('car_id',$this->car->id)->get();
        return view('livewire.review-section');
    }
}
