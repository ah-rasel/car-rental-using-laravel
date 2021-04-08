<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminAllBrands extends Component
{
    public $brands;
    public $search = '';
    public $sortField = 'name';
    public $orderBy = 'asc';

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->AllBrands();
    }


    public function AllBrands()
    {
        $this->brands = Brand::search('name',$this->search)->with(['cars'])
            ->orderBy($this->sortField, $this->orderBy)
            ->get();
    }
    public function sortBy($field)
    {

        $this->sortField === $field ? ($this->orderBy = $this->orderBy==='asc' ? 'desc' : 'asc'):$this->orderBy = 'asc';

        $this->sortField = $field;
    }

    public function confirmDeleteBrand($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'icon'=>'warning',
            'title'=>'Are you sure to delete this Brand ? ',
            'text'=>'',
            'id'=>$id,
        ]);

    }

    public function delete($id)
    {
        try {

            $brand = Brand::Where('id',$id)->firstOrFail();
            if ($brand->brand_light_image_path){
                Storage::delete('brands/'.$brand->brand_light_image_path);
            }
            if ($brand->brand_dark_image_path){
                Storage::delete('brands/'.$brand->brand_dark_image_path);
            }
            $brand->delete();

        } catch (\Illuminate\Database\QueryException $exception){
            $this->dispatchBrowserEvent('swal:error',[
                'icon'=>'error',
                'title'=>'Brand Can Not Be Deleted ',
                'text'=>'There are Cars from this Brand .',
                'timer'=>4000
            ]);
        }
    }


    public function render()
    {
        $this->AllBrands();
        return view('livewire.admin-all-brands');
    }
}
