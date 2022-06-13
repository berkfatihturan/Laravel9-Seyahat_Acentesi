@extends('layouts.frontbase')

@section('title','FAQ')
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/userpanel.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/search.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('content')

    <div class="container">
        @if(!$data->isEmpty())

            <div class="row category-top">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box fadeInUp animated mb-5 mt-2">
                    <h3 class="category-top__title">FAQ</h3>
                </div>
            </div>

            <ul class="list-package" style="list-style: none;">
                @foreach($data as $rs)

                    <div class="well well-custume" style="margin-bottom: 15px; padding: 10px; margin-bottom: 40px" >
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <a  href="#detail-text-{{$rs->id}}" data-toggle="collapse"> {{$rs->question}}</a>
                            </div>

                        </div>


                        <div class="row">
                            <div class="collapse col-md-12 " id="detail-text-{{$rs->id}}" style="margin: 10px 0; padding: 5px">
                                {!! $rs->answer  !!}
                            </div>
                        </div>
                    </div>

                @endforeach
            </ul>
            <!---
            @if(isset($category))
                <div class="category-bottom">
                    <span class="category-bottom__descriptions">{{$category->description}}</span>
                </div>
            @endif
            -->
        @else
            <div class="cant-find"> SORRY, THERE IS NO PACKAGE MATCHING YOUR CRITERIA. </div>
        @endif
    </div>

@endsection

@section('foot')
    <script src="{{asset('assets')}}/js/deneme.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
