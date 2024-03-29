<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product=$product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[

        'products' => $this->product,
            'category' => $this->category
        ]);
    }
}
