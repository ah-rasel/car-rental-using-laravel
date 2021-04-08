<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserEditSection extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }
    protected $rules = [
        'user.name'=>'required',
        'user.phone_number'=>'required',
        'user.address'=>'required',
    ];

    public function UpdaeUser()
    {
        $this->validate();
        $this->user->save();
    }
    public function render()
    {
        return view('livewire.user-edit-section');
    }
}
