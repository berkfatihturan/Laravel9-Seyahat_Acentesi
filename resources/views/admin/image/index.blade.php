@extends('layouts.adminbase')

@section('title', "Gallery ".$package->title)

@section('companyName',$dataSetting->company)

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12" style="position: relative;">
                    <div class="" style="display: inline-block; position: absolute; left: 30px; top:15%;">
                        <a href="{{route('admin_package_index')}}" class="btn btn-success"> Geri </a>
                    </div>
                    <h1 class="page-head-line" style="text-align: center;size: auto">{{$package->title}}</h1>
                    <div class="" style="display: inline-block; position: absolute; right: 30px; top:15%;">
                        <a href="#image-add-form" data-toggle="collapse" class="btn btn-success"><i class="glyphicon glyphicon-plus" style="margin-right: 5px;" ></i>Add</a>
                    </div>
                </div>
                <div class="collapse" id="image-add-form">
                    <form role="form" action="{{route('admin_image_store',['pid'=>$package->id])}}" method="post"
                          enctype="multipart/form-data" class="form-group col-md-12">
                        @csrf

                        <div class="dropdown-item">
                            <label>Title</label>
                            <input class="form-control" type="text" placeholder="Title" name="title" required>
                        </div>

                        <div class="form-group" class="dropdown-item">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>

                        <button type="submit" class="btn btn-info">Save</button>

                    </form>
                </div>
            </div>
            <!-- /. ROW  -->
            <div id="port-folio">
                @foreach($image as $rs)
                    @if($cal%3==0)
                        <div class="row ">
                            @endif
                            <div class="col-md-4 " style="margin-bottom: 20px; ">
                                <div class="portfolio-item awesome mix_all" data-cat="awesome" style="display: inline-block; opacity: 1; position: relative;">

                                    <div style="position: absolute; top:10px; right:20px;">
                                        <a href="{{route('admin_image_destroy',['pid'=>$package->id,'id'=>$rs->id])}}" class="btn d-print-inline btn-danger btn-sm">Delete</a>
                                    </div>

                                    @if($rs->image)

                                        <a class="" title="Image Title Here" href="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" onclick="return !window.open(this.href,'','width=1000,height=800')">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" class="img-responsive " alt="" style="  object-fit:cover;">
                                        </a>

                                    @endif
                                    <div class="overlay">
                                        <p>
                                            {{++$cal}} - {{$rs->title}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if($cal%3==0)
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
@endsection

@section('foot')
@endsection

