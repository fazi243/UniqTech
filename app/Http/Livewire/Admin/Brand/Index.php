<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $brand,$name,$slug,$status;

    public function deleteBrand($brand)
    {
//        $this->dispatchBrowserEvent('delete-modal');
        $this->brand=$brand;
    }
    public function destroy( )
    {
        $brand=Brand::find($this->brand);
        $brand->delete();
        session()->flash('message','Brand Deleted');
        $this->dispatchBrowserEvent('delete-modal');
    }
    public function closeDeleteModal()
    {
        $this->dispatchBrowserEvent('delete-modal');

    }
//    ----------------------------------------------------------------------------------
    public function rules()
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ];
    }
    public function resetInput()
    {
        $this->name=NULL;
        $this->slug=NULL;
        $this->status=NULL;
        $this->brand=NULL;
    }
//    --------------------------------------------------------------------------------------
    public function showAddModal()
    {
        $this->dispatchBrowserEvent('add-modal');

    }
    public function storeBrand()
    {
        $validatedData= $this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true?'1':'0',
        ]);
        session()->flash('message','Brand Added Successfully');
        $this->dispatchBrowserEvent('add-modal');
        $this->resetInput();
    }
    public function closeAddModal()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('add-modal');

    }
//------------------------------------------------------------------------------------------------
    public function openUpdateModal($brand)
    {
        $brand=Brand::findOrFail($brand);
        $this->brand=$brand;
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
//        $this->dispatchBrowserEvent('update-modal');


    }
    public function updateBrand()
    {
        $validatedData= $this->validate();
        $this->brand->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status==true?'1':'0',
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatchBrowserEvent('update-modal');
        $this->resetInput();
    }
    public function closeUpdateModal()
    {
        $this->dispatchBrowserEvent('update-modal');

    }
//-------------------------------------------------------------------------------------------------
    public function render()
    {
        $emptyBrand=new Brand();
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands' => $brands,'emptyBrand'=>$emptyBrand])->extends('layouts.admin')->section('content');
    }


}
