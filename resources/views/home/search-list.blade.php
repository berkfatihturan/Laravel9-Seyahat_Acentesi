@extends('layouts.frontbase')

@section('title', 'Travel Agency')

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/search.css">
@endsection

@section('nagivation')
@endsection

@section('content')

    <div class="container">

        <ul class="list-package" style="list-style: none">

            @foreach($data as $rs)

                <li class="package-{{$rs->id}}">

                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-9 col-md-8 col-sm-7">
                                        <h3>{{$rs->title}}</h3>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-5">
                                        <p style="text-align: right">{{$rs->start_date}} <span style="font-weight: 600"> / </span> {{$rs->end_date}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="package-image col-md-3">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="package-descriptions col-md-6">
                                    <div class="package-descriptions__item">
                                        <p>{{$rs->descriptions}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="package-price_box">
                                        <div class="package-price_box__content">
                                            <p class="nights">{{$rs->nights + 1}} Day - {{$rs->nights}} Nights</p>
                                            <p class="price">{{$rs->price}} TL</p>
                                            <p class="tax-info">({{$rs->tax}}% tax including)</p>
                                            <p><a class="btn btn-primary package-detail" href="/package/{{$rs->id}}">Show</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>


            @endforeach

        </ul>

    </div>

@endsection