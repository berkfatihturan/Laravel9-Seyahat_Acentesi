@extends('layouts.frontbase')

@section('title', "Login | ". \App\Models\Setting::getSettings()->title)
@section('description', \App\Models\Setting::getSettings()->description)
@section('keywords', \App\Models\Setting::getSettings()->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url(\App\Models\Setting::getSettings()->icon))


@section('nagivation')
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">

            @include('auth.register')

        </div>
    </div>
@endsection

