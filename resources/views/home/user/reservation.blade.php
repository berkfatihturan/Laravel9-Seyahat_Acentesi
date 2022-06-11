@extends('layouts.frontbase')

@section('title','User '.\Illuminate\Support\Facades\Auth::user()->name)
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
                @foreach($reservation as $rs)
                <div class="well well-custume" style="margin-bottom: 15px; padding-bottom: 2px" >
                    <div class="row">

                        <div class="col-md-3" style="padding-right: 8px">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($rs->package->image)}}" class="img-responsive " alt="" style="border-radius: 5px;  object-fit:cover;">

                        </div>
                        <div class="col-md-9" style="padding-left: 8px">
                            <div class="row">
                                <div class="col-md-10 col-sm-9">
                                    <a  href="{{route('home_package',['pid'=>$rs->package->id])}}" style="font-size: 18px; font-weight: 600; color: black">{{$rs->package->title}}</a>
                                </div>
                                <div class="col-md-2 col-sm-3" style="">
                                    @if($rs->status=='New')
                                        <a href="#" class="btn btn-warning pull-right">Pending</a>
                                    @elseif($rs->status=='Accepted')
                                        <a href="#" class="btn btn-success pull-right" style="color: white !important;">Accepted</a>
                                    @elseif($rs->status=='Cancelled')
                                        <a href="#" class="btn btn-danger pull-right" style="color: white !important;">Canceled</a>
                                    @elseif($rs->status=='Completed')
                                        <a href="#" class="btn btn-secondary pull-right" style="color: white !important;">Completed</a>
                                    @endif

                                </div>
                            </div>

                            <div class="row" style="position: relative; left: 10px; margin-top: 10px; margin-bottom: 15px;">
                                <div class="col-md-6" style="">
                                    <p style="margin: 0;font-size: 14px; font-weight: 400;">Number of People</p>
                                    <p style="margin: 0; font-weight: 600">{{$rs->person}} People</p>
                                </div>

                                <div class="col-md-4" style="">
                                    <p style="margin: 0;font-size: 14px; font-weight: 400;">Package Price</p>
                                    <p style="margin: 0; font-weight: 600">${{$rs->price}}</p>
                                </div>

                                <div class="col-md-2" style="">
                                    <p style="margin: 0;font-size: 14px; font-weight: 400;">Total </p>
                                    <p style="margin: 0; font-weight: 600">${{$rs->amount}}</p>
                                </div>

                            </div>

                            <div class="row" style="position: relative; left: 10px">
                                <div class="col-md-6" style="">
                                    <p style="margin: 0;font-size: 14px; font-weight: 400;">Start date</p>
                                    <p style="margin: 0; font-weight: 600">{{$rs->start_date}}</p>
                                </div>
                                <div class="col-md-4" style="">
                                    <p style="margin: 0; font-size: 14px; font-weight: 400;">Package Time</p>
                                    <p style="margin: 0; font-weight: 600">{{$rs->package->nights}} Nights, {{$rs->package->nights+1}} Gün</p>
                                </div>
                                @if($rs->status=='New')
                                    <div class="col-md-2" style="">
                                        <form style="margin: 10px auto; text-align: center" action="{{route('reservation_cancel',['id'=>$rs->id])}}">
                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr style="margin-top: 2px; margin-bottom: 0;"/>

                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                            <a  href="#detail-text-{{$rs->id}}" style="font-size: 12px; letter-spacing: .4px; opacity: .8" data-toggle="collapse"> Detail <i class="fas fa-angle-down fa-sm"></i></a>
                        </div>

                        <div class="collapse col-md-12 " id="detail-text-{{$rs->id}}" style="margin-bottom: 10px">
                            <div>
                                {{$rs->note}}
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
<!--
{{$rs->id}}

{{$rs->price}}


{{$rs->note}}

{{$rs->user->name}}
-->
