
@extends('layouts.adminbase')

@section('title', 'FAQ List')

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">FAQ</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="position: relative">
                            <div style="display: inline-block">
                                FAQ
                            </div>
                            <div class="" style="display: inline-block; position: absolute; right: 10px; top:5px;">
                                <button onclick="window.location.href='{{route('admin_faq_create')}}'" class="btn btn-inverse"><i class="glyphicon glyphicon-plus" style="margin-right: 5px;" ></i>Add</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 3% ">#</th>
                                        <th style="width: 10%">Question</th>
                                        <th style="width: 30%">Answer</th>
                                        <th style="width: 3%">Status</th>
                                        <th style="width: 5%">Edit</th>
                                        <th style="width: 5%">Delete</th>
                                        <th style="width: 5%">Show</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->question}}</td>
                                            <td>{!! $rs->answer !!}</td>
                                            <td>{{$rs->status}}</td>
                                            <td> <a href="{{route('admin_faq_edit',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">Edit</a> </td>
                                            <td> <a href="{{route('admin_faq_destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">Delete</a> </td>
                                            <td> <a href="{{route('admin_faq_show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">Show</a> </td>
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
        <!-- /. PAGE INNER  -->
    </div>


@endsection
