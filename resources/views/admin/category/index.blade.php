
@extends('layouts.adminbase')

@section('title', 'Category List')

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Category List</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="position: relative">
                            <div style="display: inline-block">
                                Category List
                            </div>
                            <div class="" style="display: inline-block; position: absolute; right: 10px; top:5px;">
                                <button onclick="window.location.href='{{route('admin_category_create')}}'" class="btn btn-inverse"><i class="glyphicon glyphicon-plus" style="margin-right: 5px;" ></i>Add</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5% ">#</th>
                                            <th style="width: 20%">Parent</th>
                                            <th style="width: 20%">Title</th>
                                            <th style="width: 10% ">Image</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 5%">Edit</th>
                                            <th style="width: 5%">Delete</th>
                                            <th style="width: 5%">Show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{\App\Http\Controllers\AdminPanel\CategoryContoller::getParentsTree($rs,$rs->title)}}</td>
                                            <td>{{$rs->title}}</td>
                                            <td>
                                                @if($rs->image)
                                                    <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" height="50px">
                                                @endif
                                            </td>
                                            <td>{{$rs->status}}</td>
                                            <td> <a href="{{route('admin_category_edit',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">Edit</a> </td>
                                            <td> <a href="{{route('admin_category_destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">Delete</a></td>
                                            <td> <a href="{{route('admin_category_show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">Show</a> </td>
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
