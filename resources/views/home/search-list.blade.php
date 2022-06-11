@extends('layouts.frontbase')

@section('title','Search | '.$dataSettings->title)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/userpanel.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')

    <div class="container">
        @if(!$data->isEmpty())
            @if(isset($category))
                <div class="category-top">
                    <h2 class="category-top__title">{{$category->title}}</h2>
                    <span class="category-top__keywords">{{$category->keywords}}</span>
                </div>
            @endif
            <ul class="list-package" style="list-style: none">
                @foreach($data as $rs)

                    @php
                        $img = \App\Models\Image::where('package_id','=',$rs->id)->get();
                    @endphp


                    <div class="well well-custume" style="margin-bottom: 15px; padding-bottom: 2px" >
                        <div class="row">

                            <div class="col-md-3" style="padding-right: 8px">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" class="img-responsive " alt="" style="border-radius: 5px;  object-fit:cover;">

                            </div>
                            <div class="col-md-9" style="padding-left: 8px">
                                <div class="row">
                                    <div class="col-md-10 col-sm-9">
                                        <a  href="{{route('home_package',['pid'=>$rs->id])}}" style="font-size: 18px; font-weight: 600; color: black">{{$rs->title}}</a>
                                    </div>
                                    <div class="col-md-2 col-sm-3" style="">
                                        @if($rs->status=='True')
                                            <a href="{{route('home_package',['pid'=>$rs->id])}}" class="btn btn-success pull-right btn-lg" style="color: white !important;">Detail <i class="fas fa-angle-right " style="position: relative; top: 2px"></i></a>
                                        @elseif($rs->status=='False')
                                            <a href="#" class="btn btn-danger pull-right btn-lg" style="color: white !important;">Detail <i class="fas fa-angle-right"></i></a>
                                        @endif

                                    </div>
                                </div>

                                <div class="row" style="position: relative; left: 10px; margin-top: 10px; margin-bottom: 15px;">
                                    <div class="col-md-3" style="">
                                        <p style="margin: 0;font-size: 14px; font-weight: 400;">Number of People</p>
                                        <p style="margin: 0; font-weight: 600">{{$rs->num_people}} People</p>
                                    </div>

                                    <div class="col-md-3" style="">
                                        <p style="margin: 0;font-size: 14px; font-weight: 400;">Max People</p>
                                        <p style="margin: 0; font-weight: 600">{{$rs->max_people}} People</p>
                                    </div>

                                    <div class="col-md-3" style="">
                                        <p style="margin: 0;font-size: 14px; font-weight: 400;">Extra Charge</p>
                                        <p style="margin: 0; font-weight: 600">${{$rs->extra_charge}}</p>
                                    </div>

                                    <div class="col-md-3" style="">
                                        <p style="margin: 0;font-size: 14px; font-weight: 400;">Package Price</p>
                                        <p style="margin: 0; font-weight: 600">${{$rs->price}} (+{{$rs->tax}} Tax)</p>
                                    </div>


                                </div>

                                <div class="row" style="position: relative; left: 10px">
                                    <div class="col-md-3" style="">
                                        <p style="margin: 0;font-size: 14px; font-weight: 400;">Start date</p>
                                        <p style="margin: 0; font-weight: 600">{{$rs->start_date}}</p>
                                    </div>
                                    <div class="col-md-3" style="">
                                        <p style="margin: 0;font-size: 14px; font-weight: 400;">End date</p>
                                        <p style="margin: 0; font-weight: 600">{{$rs->end_date}}</p>
                                    </div>
                                    <div class="col-md-4" style="">
                                        <p style="margin: 0; font-size: 14px; font-weight: 400;">Package Time</p>
                                        <p style="margin: 0; font-weight: 600">{{$rs->nights}} Nights, {{$rs->nights+1}} Gün</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style="margin-top: 2px; margin-bottom: 0;"/>

                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <a  href="#detail-text-{{$rs->id}}" style="font-size: 12px; letter-spacing: .4px; opacity: .8" data-toggle="collapse"> Detail <i class="fas fa-angle-down fa-sm"></i></a>
                            </div>

                            <div class="collapse col-md-12 " id="detail-text-{{$rs->id}}" style="margin: 10px 0; padding: 5px">

                                <div class="col-md-5" style="padding:0 8px 0 5px ">
                                    <div id="myCarousel-{{$rs->id}}" class="carousel slide" data-ride="carousel">

                                        <!-- Wrapper for slides -->
                                        @php
                                            $cnt=0;
                                        @endphp
                                        <div class="carousel-inner">
                                            @foreach($img as $i)
                                                <div class="item @if($cnt++==0) active @endif">
                                                    <img src="{{\Illuminate\Support\Facades\Storage::url($i->image)}}"  style="width:100%;">
                                                </div>
                                            @endforeach

                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel-{{$rs->id}}" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel-{{$rs->id}}" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-7" style="padding:0 5px 0 5px">
                                    <ul class="nav nav-tabs " role="tablist">
                                        <li role="presentation" class="active" style=""><a href="#detail-{{$rs->id}}" style="color: black;" aria-controls="campaign" role="tab" data-toggle="tab">Detail</a></li>
                                        <li role="presentation" class=""> <a href="#descriptions-{{$rs->id}}" style="color: black;" aria-controls="campaign" role="tab" data-toggle="tab">Descriptions</a></li>
                                    </ul>
                                    <div class="tab-content" style="padding: 20px 0 10px 5px">
                                        <div role="tabpanel" class="tab-pane @if(\Illuminate\Support\Facades\Session::get('info')==null) active @endif" id="detail-{{$rs->id}}" style="height: 300px; overflow:hidden;">
                                            {!! $rs->detail !!}
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="descriptions-{{$rs->id}}" style="height: 300px; overflow: hidden;">
                                            {{$rs->descriptions}}
                                        </div>
                                    </div>
                                </div>
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
