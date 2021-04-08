<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminAllCars extends Component
{
    public $cars;
    public $search = '';
    public $sortField = 'name';
    public $orderBy = 'asc';

    public function mount()
    {
        $this->AllCars();
    }
    protected $listeners = ['delete'];

    public function AllCars()
    {
        $this->cars = Car::search('name',$this->search)->with(['brand'])
            ->orderBy($this->sortField, $this->orderBy)
            ->get();
    }
    public function sortBy($field)
    {

        $this->sortField === $field ? ($this->orderBy = $this->orderBy==='asc' ? 'desc' : 'asc'):$this->orderBy = 'asc';

        $this->sortField = $field;
    }
    public function changeStatus($id)
    {
        $car = Car::Where('id',$id)->first();
        $car->cars_availability = $car->cars_availability == 0 ? 1:0;
        $car->save();
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'icon'=>'warning',
            'title'=>'Are you sure to delete this ? ',
            'text'=>'',
            'id'=>$id,
        ]);
    }

    public function delete($id)
    {
        try {
            $car = Car::Where('id',$id)->firstOrFail();
            if ($car->car_photo_path){
                Storage::delete('cars/'.$car->car_photo_path);
            }
            if ($car->car_image_single_page_view){
                Storage::delete('cars/'.$car->car_image_single_page_view);
            }
            $car->delete();

        } catch (\Illuminate\Database\QueryException $exception){
            $this->dispatchBrowserEvent('swal:error',[
                'icon'=>'error',
                'title'=>'This Car Has been Used as a Slider ',
                'text'=>'To delete this car ,Please Delete the slider related to this car or Please set that slider to another car',
                'timer'=>10000
            ]);
        }
    }
    public function render()
    {
        $this->AllCars();
        return view('livewire.admin-all-cars');
    }
}
