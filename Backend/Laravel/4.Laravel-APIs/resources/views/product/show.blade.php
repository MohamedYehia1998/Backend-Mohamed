<x-app-layout>
    <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #3f83f8;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #007bff;
        }

    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }} Product #{{$product->id}}
        </h2>
    </x-slot>


    <form style="width: 800px;margin-left: 340px; margin-top: 30px" >

        <label>Product Name</label>
        <input style="margin-bottom: 20px" type="text" name="name" value="{{$product->name}}" readonly>

        <label>Price</label>
        <input type="number" min="0" step="0.01" name="price" value="{{$product->price}}" style="border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;" readonly>

        <label>Quantity</label>
        <input type="number" min="0" step="1" name="quantity" value="{{$product->quantity}}" style="border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; margin-bottom: 25px" readonly> <br>


        <label>Category</label>
        <input style="margin-bottom: 20px" type="text" name="name" value="{{$product->category->name}}" readonly>


        <a href="{{route('admin.product.index')}}" class="btn btn-danger">Back</a>
    </form>

</x-app-layout>
