<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category;
    public function deleteCategory($category)
    {
        $this->dispatchBrowserEvent('open-modal');
        $this->category=$category;
    }
    public function closeModal()
    {
        $this->dispatchBrowserEvent('close-modal');

    }
    public function destroy( )
    {
        $category=Category::find($this->category);
        if ($category->image)
        {
            unlink(public_path('storage/'.$category->image));
        }
        $category->delete();
        session()->flash('message','Category Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $categories=Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
