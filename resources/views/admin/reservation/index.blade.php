@extends('layouts.adminbase')

@section('title',"Reservation List | ". $R_status)

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">{{$R_status}} Reservation List</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="position: relative">
                            <div style="display: inline-block">
                                {{$R_status}} Reservation List
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 5% ">#</th>
                                        <th style="width: 15%">Package Name</th>
                                        <th style="width: 10%">User Name</th>
                                        <th style="width: 2% ">Person</th>
                                        <th style="width: 5%">Start Date</th>
                                        <th style="width: 5%">Price</th>
                                        <th style="width: 5%">Amount</th>
                                        <th style="width: 5%">Status</th>
                                        <th style="width: 5%">Show</th>
                                        @if($R_status=='New')
                                        <th style="width: 5%">Cancel</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservation as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->package->title}}</td>
                                            <td>{{$rs->user->name}}</td>
                                            <td>{{$rs->person}}</td>
                                            <td>{{$rs->start_date}}</td>
                                            <td>{{$rs->price}}</td>
                                            <td>{{$rs->amount}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td> <a href="{{route('admin_reservation_show',['id'=>$rs->id])}}" onclick="return !window.open(this.href,'','width=1000,height=800')" class="btn btn-block btn-success btn-sm">Show</a> </td>
                                            @if($R_status=='New')
                                            <td> <a href="{{route('admin_reservation_cancel',['id'=>$rs->id,'status'=>$R_status])}}" class="btn btn-block btn-danger btn-sm">Cancel</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Kitchen Sink -->
                </div>
            </div>

        </div>
    </div>

@endsection
