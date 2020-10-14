<html>
    <body>
        @include('components.table.css-links')
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
                    {{ __('Search Categories:') }}
                    <button onclick="myFunction()"><i class="fa fa-plus" style="margin-left: 1000px;margin-top: -30px;color: #0e9f6e">Add New Category</i></button>
                    <form action="{{route('admin.category.search')}}" method="GET">
                        <input type="text"  name="search" value="{{\Illuminate\Support\Facades\Request::query('search')}}" style="margin-left: 170px;margin-top:-25px;background-color: gainsboro;border-radius: 30px;font-size: 0.8em;color: #4b5563">
                        <button type="submit" style="margin-left: 350px;margin-top: -20px"><i class="fa fa-search"></i></button>
                    </form>
                </h2>
                <form action="">
                    <button type="submit" style="margin-left: 375px;margin-top: -20px;font-size: 20px"><i class="fa fa-refresh"></i></button>
                </form>
            </x-slot>

            <div style="height: 10px"></div>
            <form action="{{route('admin.category.store')}}" style="display:none; margin-left: 1150px; margin-bottom: 1050px" id="creation" method="POST">
                @csrf
                <input type="text" name='name' style="background-color:gainsboro;border-radius:20px;display: inline" placeholder=" New Category Name" required>
                <button type="submit"><i class="fa fa-save" style="font-size: 20px"></i></button>
                <button onclick="myFunction2()"><i class="fa fa-close" style="font-size: 20px;color:darkred"></i></button>
            </form>


            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="limiter">
                            <div class="container-table100">
                                <div class="wrap-table100">
                                    <div class="table">
                                        @if(count($categories)!=0)
                                            <div class="row header">
                                                <div class="cell" >
                                                    #
                                                </div>
                                                <div class="cell" >
                                                    Category Name
                                                </div>
                                                <div class="cell" >
                                                    Actions
                                                </div>
                                            </div>


                                            @foreach($categories as $category)
                                            <div class="row">
                                                <div class="cell" data-title="#" >
                                                    <a href="#">{{$category->id}}</a>
                                                </div>
                                                @php
                                                    $before_id = strval($category->id);
                                                    $after_id= strval(-1*$category->id);
                                                @endphp
                                                <div class="cell" data-title="Name">
                                                    <a href="#" id="{{$before_id}}" style="display: inline">{{$category->name}}</a>
                                                    <form action="{{route('admin.category.update',$category)}}" style="display: none" id="{{$after_id}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name='name' style="background-color:gainsboro;border-radius:20px;display: inline" value=" {{$category->name}}" required>
                                                        <button type="submit"><i class="fa fa-save" style="font-size: 20px"></i></button>
                                                        <button onclick="myFunc2({{$before_id}})"><i class="fa fa-close" style="font-size: 20px;color:darkred"></i></button>
                                                    </form>
                                                </div>
                                                <div class="cell" data-title="Actions">
                                                    <form action="{{route('admin.category.destroy',$category)}}" style="display: inline", method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure to delete this category ?');" style="border: 0; background: none;">
                                                            <i class="fa fa-trash-o" style="font-size: 25px;color: red; aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                        <a href="{{route('admin.category.show', $category)}}"><i class="fa fa-book" style="font-size: 25px;color: #3f83f8"></i></a>
                                                        <button onClick="myFunc({{$before_id}});"><i class="fa fa-edit" style="font-size: 25px;color: darkorange"></i></button>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div style="margin-top: 30px; margin-left: 10px">{{$categories->withQueryString()->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
        <script>
            function myFunction() {
                document.getElementById("creation").style.display = "inline";
            }

            function myFunction2() {
                document.getElementById("creation").style.display = "none";
            }

            function myFunc(id)
            {
                var before_id = id;
                var after_id = "-".concat(before_id);
                document.getElementById(before_id).style.display = "none";
                document.getElementById(after_id).style.display = "inline";
            }

            function myFunc2(id)
            {
                var before_id = id;
                var after_id = "-".concat(before_id);
                document.getElementById(before_id).style.display = "inline";
                document.getElementById(after_id).style.display = "none";
            }
        </script>
        @include('components.table.js-links')
    </body>
</html>
