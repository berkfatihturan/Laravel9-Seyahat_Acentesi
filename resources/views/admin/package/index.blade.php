
@extends('layouts.adminbase')

@section('title', 'Package List')

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Package List</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="position: relative">
                            <div style="display: inline-block">
                                Package List
                            </div>
                            <div class="" style="display: inline-block; position: absolute; right: 10px; top:5px;">
                                <button onclick="window.location.href='{{route('admin_package_create')}}'" class="btn btn-inverse"><i class="glyphicon glyphicon-plus" style="margin-right: 5px;" ></i>Add</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5% ">#</th>
                                            <th style="width: 20%">Category</th>
                                            <th style="width: 20%">Title</th>
                                            <th style="width: 10% ">Price</th>
                                            <th style="width: 10%">Quantity</th>
                                            <th style="width: 10%">Image</th>
                                            <th style="width: 10%">Status</th>
                                            <th>Gallery</th>
                                            <th style="width: 5%">Edit</th>
                                            <th style="width: 5%">Delete</th>
                                            <th style="width: 5%">Show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{\App\Http\Controllers\AdminPanel\PackageController::getParentsTree($rs->category,$rs->category->title)}}</td>
                                            <td>{{$rs->title}}</td>
                                            <td>{{$rs->price}}</td>
                                            <td>{{$rs->quantity}}</td>
                                            <td>
                                                @if($rs->image)
                                                    <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" height="50px">
                                                @endif
                                            </td>
                                            <td>{{$rs->status}}</td>
                                            <td>
                                                <button onclick="window.location.href='{{route('admin_image_index',['pid'=>$rs->id])}}'" class="btn btn-inverse">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="25px" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                        <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                            <td> <a href="{{route('admin_package_edit',['id'=>$rs->id])}}" class="btn btn-block btn-info btn-sm">Edit</a> </td>
                                            <td> <a href="{{route('admin_package_destroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm">Delete</a> </td>
                                            <td> <a href="{{route('admin_package_show',['id'=>$rs->id])}}" class="btn btn-block btn-success btn-sm">Show</a> </td>
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
