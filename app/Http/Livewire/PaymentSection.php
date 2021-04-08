<?php

namespace App\Http\Livewire;

use App\Models\Rent;
use App\Models\RentPlace;
use Carbon\Carbon;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class PaymentSection extends Component
{
    public $car;
    public $rent_places;
    public $rent_date;
    public $return_date;
    public $rent_place_id;
    public $return_place_id;
    public $totalDays = 0;
    public $amount_to_pay = 0;

    public function mount($car)
    {
        $this->car = $car;
        $this->rent_places = RentPlace::all();
    }

    public function Total_Days_And_Amount_To_Pay()
    {
        $from = new \DateTime($this->rent_date);
        $to = new \DateTime($this->return_date);

        $this->totalDays = $from->diff($to)->format('%a');
        $this->totalDays = ($this->totalDays) == 0 ? 1: $this->totalDays;
        $this->totalDays =($from->diff($to)->format('%h')) >= 1 ? $this->totalDays+1 : $this->totalDays;

        $this->amount_to_pay = $this->car->rent_amount * $this->totalDays;
    }
    public function UpdatedRentDate()
    {
        $this->validate(['rent_date'=>'required|after_or_equal:now']);
        if (!empty($this->return_date)){
            $this->Total_Days_And_Amount_To_Pay();
        }
    }
    public function UpdatedReturnDate()
    {
        $this->validate(['return_date'=>'required|after_or_equal:now|after:rent_date']);
        if (!empty($this->rent_date)){
            $this->Total_Days_And_Amount_To_Pay();
        }

    }
    public function NewRentRequest()
    {
        if(!auth()->user()){return back()->with('login-required','Please Login or Create a New Account to take rent .') ; }

        $data = $this->validate([
            'rent_place_id'=> 'required|numeric',
            'return_place_id'=> 'required|numeric',
            'rent_date'=>'required|after_or_equal:now',
            'return_date'=>'required|after_or_equal:now|after:rent_date',
        ]);
//        if (!empty($this->rent_date) && !empty($this->return_date)){
//            $this->Total_Days_And_Amount_To_Pay();
//        }
        $new_rent = Rent::create([
            'user_id'=>auth()->user()->id,
            'rent_date'=>$data['rent_date'],
            'return_date'=>$data['return_date'],
            'rent_place_id'=>$this->rent_place_id,
            'return_place_id'=>$this->return_place_id,
            'rent_amount'=>$this->amount_to_pay,
            'car_id'=>$this->car->id,
        ]);
       if ($new_rent){ return redirect()->route('user.profile');}
    }
    public function render()
    {
        return view('livewire.payment-section');
    }
}
