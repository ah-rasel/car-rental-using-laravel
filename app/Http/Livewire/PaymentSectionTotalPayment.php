<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentSectionTotalPayment extends Component
{
    public $totalDays;

    public function mount($totalDays)
    {
        $this->totalDays = $totalDays;
    }
    public function render()
    {
        return view('livewire.payment-section-total-payment');
    }
}
