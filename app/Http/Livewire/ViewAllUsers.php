<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewAllUsers extends Component
{
    public $users;
    public $UserType = 2;
    public $search = '';
    public $sortField = 'name';
    public $orderBy = 'asc';


    public function mount()
    {
       $this->AllUsers();
    }

    public function AllUsers()
    {
        $this->users = User::search('name',$this->search)
                        ->Where('role_id',$this->UserType)
                        ->orderBy($this->sortField, $this->orderBy)
                        ->get();
    }

    public function sortBy($field)
    {
        $field ==='phone'? $field='phone_number':$field;
        $field ==='approve'? $field='approve_status':$field;


        $this->sortField === $field ? ($this->orderBy = $this->orderBy==='asc' ? 'desc' : 'asc'):$this->orderBy = 'asc';

        $this->sortField = $field;
    }

    public function changeStatus($id)
    {
        $user = User::Where('id',$id)->first();
        $user->approve_status = $user->approve_status == 0? 1:0;
        $user->save();
    }

    public function render()
    {
        $this->AllUsers();
        return view('livewire.view-all-users');
    }
}
