@extends('layouts.frontbase')

@section('title', "References | ". $dataSettings->title)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))


@section('nagivation')
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">

            {!! $dataSettings->references !!}

        </div>
    </div>
@endsection
