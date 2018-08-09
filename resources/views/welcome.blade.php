@extends('layouts.master')
@section('content')
    <h1 style=" margin-top: 50px; text-align: center;">{{ setting('site.title') }}</h1>
    <h2 style=" text-align: center;">{{ setting('general.description') }}</h2>
    <div style="text-align: center; margin-top: 50px;">
        <img src="{{ Voyager::image(setting('site.logo')) }}">;
    </div>
@endsection