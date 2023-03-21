<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4>Brands</h4></div>
                <div class="card-body">
                    @foreach($category->brands as $brand)
                        <label for="" class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{$brand->id}}">{{$brand->name}}
                        </label>
                    @endforeach

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header"><h4>Price</h4></div>
                <div class="card-body">
                        <label for="" class="d-block">
                            <input type="radio" wire:model="priceInput" value="high-to-low">High to Low
                        </label>
                    <label for="" class="d-block">
                        <input type="radio" wire:model="priceInput" value="low-to-high">Low to High
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if($product->quantity<=0)
                                    <label class="stock bg-danger">Out of Stock</label>
                                @else
                                    <label class="stock bg-success">In Stock</label>
                                @endif
                                <a href="{{url('/collections/'.$product->category->slug.'/'.$product->slug)}}">

                                    @if($product->productImages->count() > 0)

                                        <img src="{{asset('storage/product_image/'.$product->productImages[0]->image)}}" alt="{{$product->name}}">
                                @endif
                            </div>
                            <div class="product-card-body">
                                <br>
                                <p class="product-brand">{{$product->brandinfo->name}}</p>
                                <h5 class="product-name">
                                    {{$product->name}}

                                </h5>
                                </a>
                                <div>
                                    <span class="selling-price">${{$product->selling_price}}</span>
                                    <span class="original-price">${{$product->original_price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <h5>No Products Available for {{$category->name}} </h5>
                @endforelse
            </div>
        </div>
    </div>

</div>
