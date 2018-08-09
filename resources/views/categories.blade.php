@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="my-4">Categories</h2>
        </div>
        @foreach($categories as $category)
            @if($category->parent_id != "")
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <a href="products?categoryId={{$category->id}}" class="links circle">
                    @if ($category->image == "")
                        <img class="img-fluid d-block mx-auto circle"
                             src="{{ Voyager::image(setting('site.noimage')) }}" alt="" style="height:200px; width:250px;">
                    @else
                        <img class="img-fluid d-block mx-auto circle"
                             src="{{ Voyager::image($category->image) }}" alt="" class="img_categories">
                    @endif
                    <h3>{{$category->name}}</h3>
                </a>
            </div>
            @endif
        @endforeach
    </div>



@endsection