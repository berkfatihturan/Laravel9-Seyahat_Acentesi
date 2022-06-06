@extends('layouts.frontbase')


@section('title','Review '.\Illuminate\Support\Facades\Auth::user()->name)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/userpanel.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
            <div class="col-md-10 user-text" id="comments">
                <h3 style="margin-bottom: 40px;margin-top: 20px;">Your Comments</h3>
                <label style="margin-left: 10px @if($info=="") display:none @endif">{{\Illuminate\Support\Facades\Session::get('info')}}</label>
                @foreach($comments as $cmt)

                    <div class="col-md-12 mb-2">
                        <div class="media g-mb-30 media-comment">

                            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <h4 class="package-title"><a href="{{route('home_package',['pid'=>$cmt->package_id])}}">{{$cmt->package->title}}</a></h4>
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

                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <a href="{{route('userpanel_commentsdestroy',['id'=>$cmt->id])}}">Delete</a>
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mr-20">
                                        <a href="#comment-update-form-{{$cmt->id}}" data-toggle="collapse"  class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover">
                                            <i class="fa-solid fa-message"></i>
                                            Update
                                        </a>
                                    </li>
                                    <li class="list-inline-item ml-auto">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            Status : {{$cmt->status}}
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div id="comment-update-form-{{$cmt->id}}" class="collapse col-xs-11 col-sm-11 float-right ">

                        <form id="checkout-form" class="form-block" style="width: 100%; margin-bottom: 10px;" method="post" action="{{route('userpanel_commentUpdate',['id'=>$cmt->id])}}">
                            @csrf
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group fl_icon">
                                    <input class="form-input" name="subject" type="text" placeholder="Subject" value="{{$cmt->subject}}">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <textarea name="comment" class="form-input" placeholder="Your Comment">{{$cmt->comment}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" style="width: auto">YOUR RATING:</label>
                                    <div class="rating">
                                        <input type="radio" name="rate" value="5" id="5-{{$cmt->id}}" @if($cmt->rate==5)  checked @endif><label for="5-{{$cmt->id}}">☆</label>
                                        <input type="radio" name="rate" value="4" id="4-{{$cmt->id}} " @if($cmt->rate==4)  checked @endif><label for="4-{{$cmt->id}}">☆</label>
                                        <input type="radio" name="rate" value="3" id="3-{{$cmt->id}}" @if($cmt->rate==3)  checked @endif><label for="3-{{$cmt->id}}">☆</label>
                                        <input type="radio" name="rate" value="2" id="2-{{$cmt->id}}" @if($cmt->rate==2)  checked @endif><label for="2-{{$cmt->id}}">☆</label>
                                        <input type="radio" name="rate" value="1" id="1-{{$cmt->id}}" ><label for="1">☆</label>
                                    </div>
                                    <input type="hidden" name="package_id" value="">
                                    <button class="btn btn-primary pull-right" style="border-radius: 5px; font-weight:500">Update</button>
                                </div>
                            </div>
                        </form>

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
