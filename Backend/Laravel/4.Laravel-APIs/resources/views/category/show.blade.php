<html>
<body>
@include('components.table.css-links')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            Category #{{$category->id}} {{$category->name}} <br>Products:
            <a href="{{route('admin.category.index')}}"><i class="fa fa-arrow-circle-o-right" style="margin-left: 1000px;margin-top: -30px;color: #0e9f6e">Back</i></a>
        </h2>
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
                                            Product ID
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
                                    </div>


                                    @foreach($products as $product)
                                        <div class="row">
                                            <div class="cell" data-title="#" style="width: 400px" >
                                                <a href="#">{{$product->id}}</a>
                                            </div>

                                            <div class="cell" data-title="Name" style="width: 450px">
                                                <a href="#"  style="display: inline">{{$product->name}}</a>
                                            </div>

                                            <div class="cell" data-title="Price" style="width: 140px">
                                                <a style="display: inline">{{$product->price}}</a>
                                            </div>

                                            <div class="cell" data-title="Quantity" style="width: 10px">
                                                <a style="display: inline">{{$product->quantity}}</a>
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
