@extends('layouts.adminbase')

@section('title', "Comment")

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Comment List</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="position: relative">
                            <div style="display: inline-block">
                                Message List
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 5% ">#</th>
                                        <th style="width: 3%">User Id</th>
                                        <th style="width: 10%"> User Name</th>
                                        <th style="width: 2%">Package Id</th>
                                        <th style="width: 20%">Package Name</th>
                                        <th style="width: 20%">Subject</th>
                                        <th style="width: 5%">Rate</th>
                                        <th style="width: 5%">Status</th>
                                        <th style="width: 5%">Show</th>
                                        <th style="width: 5%">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->user_id}}</td>
                                            <td>{{$rs->user->name}}</td>
                                            <td>{{$rs->package_id}}</td>
                                            <td><a href="{{route('admin_package_show',['id'=>$rs->package_id])}}">{{$rs->package->title}}</a></td>
                                            <td>{{$rs->subject}}</td>
                                            <td>{{$rs->rate}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td> <a href="{{route('admin_comment_show',['id'=>$rs->id])}}" onclick="return !window.open(this.href,'','width=1000,height=800')" class="btn btn-block btn-success btn-sm">Show</a> </td>
                                            <td> <a href="{{route('admin_comment_destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">Delete</a></td>
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
