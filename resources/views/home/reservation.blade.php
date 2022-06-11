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
    <style>


        body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}


    </style>
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">

            <div class="row">

                <div id="pa" class="col-md-8">
                    <p style="font-size: 22px; font-weight: 600;margin-bottom: 20px; color: black; letter-spacing: 0.5px">Rezervation Information</p>


                    <form id="reservation-form" class="form-card"  role="form" action="{{route('reservation_store',['pid'=>$pack->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="margin: 20px 0; border-radius: 10px">


                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex">
                                    <label class="form-control-label px-3">Start Date<span class="text-danger"> *</span></label>
                                    <span style="display: none">@if($pack->start_date > now()->format('Y-m-d')) {{$dt=$pack->start_date}} @else {{$dt=now()->format('Y-m-d')}} @endif</span>
                                    <input type="date" id="start_date" name="start_date" placeholder="Start Date" onblur="validate(6)" min="{{$dt}}" max="{{$pack->end_date}}" required>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex">
                                    <label class="form-control-label px-3">Number of People<span class="text-danger"> *</span></label>
                                    <input type="number" id="person-form" name="person" value="1" min="1" max="{{$pack->max_people}}" onclick="getPerson()" onblur="validate(6)" required>
                                    <label style="font-size: 12px; font-weight: 300; opacity: .6; padding-left: 10px; margin-bottom: 0">*This package can be purchased for a maximum of {{$pack->max_people}} people at a time. There is an additional fee of {{$pack->extra_charge}}$ per person for more than {{$pack->num_people}} people in the package.</label>
                                    <script type='text/javascript'>
                                        function getPerson(){

                                            var person=$('#person-form').val();
                                            var price = {!! $pack->price !!};

                                            if(person > {!! $pack->num_people !!}){
                                                price = price + (person-{!! $pack->num_people !!}) * {!! $pack->extra_charge !!};
                                            }
                                            /*
                                            var panel=document.querySelector("#pa");
                                            const div = document.getElementById('node')
                                            const clone = div.cloneNode(true);
                                            clone.id = "node"+person;
                                            clone.style.display= "block";
                                            panel.appendChild(clone);
                                            */
                                            document.getElementById("price-form").value = price;
                                            return document.getElementById("price").innerHTML = price;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>

                        <p style="font-size: 22px; font-weight: 600;margin-bottom: 20px; color: black; letter-spacing: 0.5px">Contact Information</p>

                        <div class="card" style="margin: 20px 0; border-radius: 10px">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label>
                                    <input type="text" id="name" name="fname" placeholder="Enter your first name" onblur="validate(1)" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Id Number<span class="text-danger"> *</span></label>
                                    <input type="number" id="tcnumber" name="tcnumber" placeholder="Id Number" onblur="validate(2)" >
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label>
                                    <input type="email" id="email" name="email" placeholder="Email" onblur="validate(3)" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Phone number<span class="text-danger"> *</span></label>
                                    <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" onblur="validate(4)">
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex">
                                    <label class="form-control-label px-3">Address<span class="text-danger"> *</span></label>
                                    <textarea type="text" id="address" name="address" placeholder="Address" onblur="validate(6)"></textarea>
                                </div>
                            </div>

                            <input class="form-control" type="hidden" name="price" value="{{$pack->price}}" required>
                            <input id="price-form" class="form-control" type="hidden" placeholder="amount" name="amount" required>
                            <!--
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Job title<span class="text-danger"> *</span></label>
                                    <input type="text" id="job" name="job" placeholder="" onblur="validate(5)">
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Request a demo</button> </div>
                            </div>
                            -->
                        </div>
                    </form>
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

                                <p id="price">{{$pack->price}}</p>
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
        function validate(val) {
            v1 = document.getElementById("fname");
            v2 = document.getElementById("lname");
            v3 = document.getElementById("email");
            v4 = document.getElementById("mob");
            v5 = document.getElementById("job");
            v6 = document.getElementById("ans");

            flag1 = true;
            flag2 = true;
            flag3 = true;
            flag4 = true;
            flag5 = true;
            flag6 = true;

            if(val>=1 || val==0) {
                if(v1.value == "") {
                    v1.style.borderColor = "red";
                    flag1 = false;
                }
                else {
                    v1.style.borderColor = "green";
                    flag1 = true;
                }
            }

            if(val>=2 || val==0) {
                if(v2.value == "") {
                    v2.style.borderColor = "red";
                    flag2 = false;
                }
                else {
                    v2.style.borderColor = "green";
                    flag2 = true;
                }
            }
            if(val>=3 || val==0) {
                if(v3.value == "") {
                    v3.style.borderColor = "red";
                    flag3 = false;
                }
                else {
                    v3.style.borderColor = "green";
                    flag3 = true;
                }
            }
            if(val>=4 || val==0) {
                if(v4.value == "") {
                    v4.style.borderColor = "red";
                    flag4 = false;
                }
                else {
                    v4.style.borderColor = "green";
                    flag4 = true;
                }
            }
            if(val>=5 || val==0) {
                if(v5.value == "") {
                    v5.style.borderColor = "red";
                    flag5 = false;
                }
                else {
                    v5.style.borderColor = "green";
                    flag5 = true;
                }
            }
            if(val>=6 || val==0) {
                if(v6.value == "") {
                    v6.style.borderColor = "red";
                    flag6 = false;
                }
                else {
                    v6.style.borderColor = "green";
                    flag6 = true;
                }
            }

            flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

            return flag;
        }
    </script>
@endsection
