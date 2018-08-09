@extends('layouts.master')
@section('content')
    <div class="container" style="margin-top: 200px;">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100" style=" text-align: center; padding-top:10px;">
                        <a href="#"><img class="" src="{{ Voyager::image($product->image) }}" alt=""
                                         style="max-height:200px; max-width:360px;" id="image-src"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#" id="product-name" value="{{ $product->name }}">{!! $product->name !!}</a>
                            </h4>
                            <h5 id="product-price" value="{{ $product->price }}">{{ $product->price }} PLN</h5>
                            {{--<p class="card-text">{!! $product->body !!}</p>--}}
                            <span id="product-qty" value="1"></span>
                            <a href="showProduct/{{ $product->id }}" class="btn btn-success pull-center"
                               role="button">Show description</a>
                        </div>
                        <div class="clearfix m-2" id="add-product-btn">
                            {{--<a href="{{ route('product.addToCart', ['id'=>$product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>--}}
                            {{--<a href="addToCart/{{ $product->id }}" class="btn btn-success pull-right" role="button">Add to Cart</a>--}}
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                @for($i=1; $i<=$product->rate; $i++)
                                    &#9733;
                                @endfor
                                @for(; $i<=5; $i++)
                                    &#9734;
                                @endfor
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection