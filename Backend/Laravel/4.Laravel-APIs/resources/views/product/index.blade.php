<html>
<body>
@include('components.table.css-links')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Search Products:') }}
            <a href="{{route('admin.product.create')}}"><i class="fa fa-plus" style="margin-left: 1000px;margin-top: -30px;color: #0e9f6e">Add New Product</i></a>
            <form action="{{route('admin.product.search')}}" method="GET">
                <input type="search"  name="product_search" value="{{\Illuminate\Support\Facades\Request::query('product_search')}}" style="margin-left: 170px;margin-top:-25px;background-color: gainsboro;border-radius: 10px;font-size: 0.8em;color: #4b5563">
                <button type="submit" style="margin-left: 350px;margin-top: -20px"><i class="fa fa-search"></i></button>
            </form>
        </h2>
        <form action="">
            <button type="submit" style="margin-left: 375px;margin-top: -20px;font-size: 20px"><i class="fa fa-refresh"></i></button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="limiter">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table">
                                @if(count($products)!=0)
                                    <div class="row header">
                                        <div class="cell" >
                                            #
                                        </div>
                                        <div class="cell" >
                                            Product Name
                                        </div>
                                        <div class="cell" >
                                            Price
                                        </div>
                                        <div class="cell" >
                                            Quantity
                                        </div>
                                        <div class="cell" >
                                            Category Name
                                        </div>
                                        <div class="cell" >
                                            Category ID
                                        </div>
                                        <div class="cell" >
                                            Actions
                                        </div>
                                    </div>


                                    @foreach($products as $product)
                                        <div class="row">
                                            <div class="cell" data-title="#" >
                                                <a href="#">{{$product->id}}</a>
                                            </div>

                                            <div class="cell" data-title="Name" style="width: 200px">
                                                <a href="#"  style="display: inline">{{$product->name}}</a>
                                            </div>

                                            <div class="cell" data-title="Price" style="width: 140px">
                                                <a style="display: inline">{{$product->price}}</a>
                                            </div>

                                            <div class="cell" data-title="Quantity" style="width: 10px">
                                                <a style="display: inline">{{$product->quantity}}</a>
                                            </div>

                                            @if(!empty($product->category))
                                                <div class="cell" data-title="CategoryName" style="width:230px">
                                                    <a style="display: inline">{{$product->category->name}}</a>
                                                </div>

                                                <div class="cell" data-title="CategoryID" style="width:0px">
                                                    <a style="display: inline">{{$product->category->id}}</a>
                                                </div>
                                            @else
                                                <div class="cell" data-title="CategoryName" style="width:230px">
                                                    <a style="display: inline">Unassiged in seed</a>
                                                </div>

                                                <div class="cell" data-title="CategoryID" style="width:0px">
                                                    <a style="display: inline">Unassiged in seed</a>
                                                </div>
                                            @endif

                                            <div class="cell" data-title="Actions" style="width:170px">
                                                <form action="{{route('admin.product.destroy',$product)}}" style="display: inline", method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure to delete this product ?');" style="border: 0; background: none;">
                                                        <i class="fa fa-trash-o" style="font-size: 25px;color: red; aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('admin.product.show', $product)}}"><i class="fa fa-book" style="font-size: 25px;color: #3f83f8"></i></a>
                                                <a href="{{route('admin.product.edit', $product)}}"><i class="fa fa-edit" style="font-size: 25px;color: darkorange"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div style="margin-top: 30px; margin-left: 10px">{{$products->withQueryString()->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@include('components.table.js-links')
</body>
</html>
