@extends('layouts.frontbase')

@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/userpanel.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('nagivation')
@endsection

@section('content')
    <div class="container mt-12">


        <h1 style="margin-bottom: 30px; padding: 10px 10px 10px 0; border-bottom: 1px solid #F78536;">Welcome {{Auth::user()->name}}</h1>
        <div class="row">
            <div class="col-md-2 user-nav">
                @include('home.user.usermenu')
            </div>
            <div class="col-md-10 user-text">
                <h3 style="margin-bottom: 40px;margin-top: 20px;">Your Comments</h3>
                @foreach($comments as $cmt)
                    <div class="col-md-12 mb-2">
                        <div class="media g-mb-30 media-comment">
                            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <div class="star-rating pull-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star @if($cmt->rate>1) checked @endif"></span>
                                        <span class="fa fa-star @if($cmt->rate>2) checked @endif"></span>
                                        <span class="fa fa-star @if($cmt->rate>3) checked @endif"></span>
                                        <span class="fa fa-star @if($cmt->rate>4) checked @endif"></span>
                                    </div>
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$cmt->user->name}}</h5>

                                    <span class="g-color-gray-dark-v4 g-font-size-12">{{$cmt->created_at->diffForHumans()}}</span>
                                </div>
                                <div>
                                    <h4 style="font-weight: 600; margin-top: 10px">{{$cmt->subject}}</h4>
                                    <p>{{$cmt->comment}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- /row --><!-- /container -->


@endsection

@section('foot')
    <script src="{{asset('assets')}}/js/deneme.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
