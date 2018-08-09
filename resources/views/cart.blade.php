@extends('layouts.master')
@section('content')

    @php
        $lp = 0;
    @endphp
    <form>
        @csrf
        <table style="color: white; border: white">
            <thead>
            <tr>
                <th>Lp.</th>
                <th>Nazwa</th>
                {{--<th>Zdjęcie</th>--}}
                <th>Ilość</th>
                <th>Cena</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            {{--@if(isset($products))--}}
            {{--@foreach($products as $product)--}}
            {{-- Koszyk wykorzystujacy sesje --}}
            {{--<tr>--}}
            {{--<td>{{ $lp++ }}</td>--}}
            {{--<td>{{ $product["item"]->name }}</td>--}}
            {{--<td><img src=""></td>--}}
            {{--<td>{{ $product["qty"] }}</td>--}}
            {{--<td>{{ $product["price"] }}</td>--}}
            {{--</tr>--}}

            {{-- Koszyk z wykorzystaniem ciasteczek wypisujacy w php--}}
            {{--<tr>--}}
            {{--<td>{{ $lp++ }}</td>--}}
            {{--<td>{{ $product["item"]["name"] }}</td>--}}
            {{--<td><img src=""></td>--}}
            {{--<td>--}}
            {{--<input type="number" name="{{ $product['item']['id'] }}"--}}
            {{--min="1" max="999" step="1"--}}
                   {{--value="{{ $product["qty"] }}" style="color: black;"></td>--}}
            {{--<td>{{ $product["price"] }}</td>--}}
            {{--</tr>--}}

            {{-- Koszyk z wykorzystaniem ciasteczek wypisujacy w knockout.js--}}
            <tbody class="" data-bind="foreach: products()">
                @php
                    $lp++;
                @endphp
                <tr>
                    <td>{{ $lp }}</td>
                    <td data-bind="text: name"></td>
                    {{--<td><img data-bind="attr: { src: image }"></td>--}}
                    <td>
                        {{--<input style="color: black;" data-bind="text: name">--}}
                        <input type="number" min="1" max="999" style="color: black;" data-bind="value: qty, inputText: qty">
                    </td>
                    <td data-bind="text: price"></td>
                    <td>
                        <input type="button" data-bind="click: increaseQty()" value="+" style="color: black;">
                    </td>
                    <td>
                        <input type="button" data-bind="click: decreaseQty()" value="-" style="color: black;">
                    </td>
                    <td>
                        <input type="button" data-bind="" value="X" style="color: black;">
                    </td>
                </tr>
            </tbody>

            {{--@endforeach--}}
            {{--@endif--}}
        </table>
    </form>
@endsection