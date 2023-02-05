
@extends('layouts.adminbase')

@section('title', 'Edit '. $data->title)

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Edit Category : {{$data->title}} </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            BASIC FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" action="/admin/category/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="form-control"  name="parent_id" required>
                                        <option value="0"> Main Category</option>
                                        @foreach($dataList as $rs)
                                            <option value="{{$rs->id}}" @if($rs->id == $data->parent_id) selected @endif>
                                                {{\App\Http\Controllers\AdminPanel\CategoryContoller::getParentsTree($rs,$rs->title)}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="Title" name="title" value="{{$data->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Keywords</label>
                                    <input class="form-control" type="text" placeholder="keywords" name="keywords" value="{{$data->keywords}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" type="text" placeholder="Description" name="description" value="{{$data->description}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image" value="{{$data->image}}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option selected>{{$data->status}}</option>
                                        <option>True</option>
                                        <option>False</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-info">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>


@endsection
