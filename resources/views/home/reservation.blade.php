@extends('layouts.frontbase')

@section('title', "Reservation | ". $pack->title)
@section('description', \App\Models\Setting::getSettings()->description)
@section('keywords', \App\Models\Setting::getSettings()->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url(\App\Models\Setting::getSettings()->icon))


@section('nagivation')
@endsection

@section('head')
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets')}}/css/sub-nav.css">
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">

            <div class="row">

                <div id="pa" class="col-md-8">
                    <p style="font-size: 22px; font-weight: 600;margin-bottom: 20px; color: black; letter-spacing: 0.5px">Rezervation Information</p>

                    <div class="well well-custume" >
                        <form id="reservation-form" role="form" action="{{route('reservation_store',['pid'=>$pack->id])}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Start Date</label>
                                <input class="form-control" type="date" placeholder="Title" name="start_date" min="{{$pack->start_date}}" max="{{$pack->end_date}}" required>
                            </div>

                            <div class="form-group">
                                <label>Person</label>
                                <input id="person-form" class="form-control" type="number" name="person" value="1" min="1" onclick="getPerson()" required>
<!--
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button id="down" class="btn btn-default" onclick=" down('0')"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <input type="text" id="myNumber" class="form-control input-number" value="1" />
                                    <div class="input-group-btn">
                                        <button id="up" class="btn btn-default" onclick="up('10')"><span class="glyphicon glyphicon-plus"></span></button>
                                    </div>
                                </div>
                                -->
                                <script type='text/javascript'>
                                    function getPerson(){

                                        var model=$('#person-form').val();
                                        var price = model * {!! $pack->price !!};

                                        var panel=document.querySelector("#pa");
                                        const div = document.getElementById('node')
                                        const clone = div.cloneNode(true);
                                        clone.id = "node"+model;
                                        clone.style.display= "block";
                                        panel.appendChild(clone);


                                        document.getElementById("price-form").value = price;
                                        return document.getElementById("price").innerHTML = price;
                                    }
                                </script>
                            </div>

                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" rows="4" cols="50" name="note">
                                </textarea>
                            </div>
                            <input class="form-control" type="hidden" name="price" value="{{$pack->price}}" required>
                            <input id="price-form" class="form-control" type="hidden" placeholder="amount" name="amount" required>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="panel-heading" style="font-weight: 600; font-size: 18px">
                            Rezervasyon Detayları
                        </div>
                        <div class="panel-body" style="padding: 7px">

                            <div class="row" style="position: relative; left: 10px">
                                <div class="col-md-4" style="padding: 5px;">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($pack->image)}}" class="img-responsive " alt="" style=" border-radius: 5px; object-fit:cover;">
                                </div>
                                <div class="col-md-8" style="padding: 5px;font-weight: 500; font-size: 16px">
                                    <span>{{$pack->title}}</span>
                                </div>
                            </div>
                            <hr/>
                            <div class="row" style="position: relative; left: 10px">
                                <div class="col-md-6" style="">
                                    <p style="margin: 0;font-size: 14px; font-weight: 400;">Departure date</p>
                                    <p style="margin: 0; font-weight: 600">{{$pack->start_date}}</p>
                                </div>
                                <div class="col-md-6" style="">
                                    <p style="margin: 0; font-size: 14px; font-weight: 400;">Package Time</p>
                                    <p style="margin: 0; font-weight: 600">{{$pack->nights}} Nights, {{$pack->nights+1}} Gün</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="well" style="background: white; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div style="font-weight: 600; margin-bottom: 15px; padding: 0 8px">
                            <span style="font-size: 16px">TOTAL PRICE </span>
                            <span id="" style="font-size: 16px" class="pull-right">

                                <p id="price"></p>
                            </span>
                        </div>
                        <hr/>
                        <input type="submit" form="reservation-form" style="width: 100%" type="button" class="btn btn-success btn-lg" value="Complete to Reservations"/>

                    </div>

                </div>
            </div>
            <!-- /. ROW  -->

            <div id="node" style="display: none">
                <div class="well well-custume" >
                    <form id="reservation-form" role="form" action="{{route('reservation_store',['pid'=>$pack->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Start Date</label>
                            <input class="form-control" type="date" placeholder="Title" name="start_date" min="{{$pack->start_date}}" max="{{$pack->end_date}}" required>
                        </div>

                        <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" rows="4" cols="50" name="note">
                                </textarea>
                        </div>

                    </form>
                </div>,
            </div>

        </div>
    </div>

@endsection

@section('foot')
    <script type='text/javascript'>

    </script>
@endsection
