@extends('layouts.master')
@section('content')

    <div class="container">
        <table id="cart" class="table table-hover table-condensed table-light">
            <thead>
            <tr>
                <th style="width:8%">No.</th>
                <th style="width:50%">Product</th>
                <th style="width:8%">Quantity</th>
                <th style="width:10%">Price</th>
                <th style="width:22%"></th>
            </tr>
            </thead>
            <tbody data-bind="foreach: products()">
            <tr>
                <td data-bind="text: ($index() + 1)"></td>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img data-bind="attr: { src: image }" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin" data-bind="text: name"></h4>
                        </div>
                    </div>
                </td>
                <td data-th="Quantity">
                    <input type="number" min="1" max="999" class="form-control text-center" data-bind="value: qty, inputText: qty">
                </td>
                <td data-th="Subtotal" class="text-center" data-bind="text: price"></td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm" data-bind="click: increaseQty()"><i>+</i></button>
                    <button class="btn btn-warning btn-sm" data-bind="click: decreaseQty()"><i>-</i></button>
                    <button class="btn btn-danger btn-sm" data-bind="click: $parent.removeFromCart"><i>x</i></button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td><a href="/products" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center">Total price: <strong data-bind="text: subtotal()"></strong> PLN</td>
                <td><a href="#" class="btn btn-success btn-block">Order <i class="fa fa-angle-right"></i></a></td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection