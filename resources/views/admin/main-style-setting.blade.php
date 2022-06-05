@extends('layouts.adminbase')

@section('title', 'Main Style Settings')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        $(function(){
            $('a[rel="yukleme"]').click(function(e){
                pageurl = $(this).attr('href');
                $.ajax({url:pageurl,success: function(data){
                        $('body').html(data).find("body").html();
                    }});
                if(pageurl!=window.location){
                    window.history.pushState({path:pageurl},'',pageurl);
                }
                return false;
            });
        });
        $(window).bind('popstate', function() {
            $.ajax({url:location.pathname,success: function(data){
                    $('body').html(data).find("body").html();
                }});
        });
    </script>
@endsection


@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <h1 class="page-head-line">Settings</h1>

            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#general" data-toggle="tab">Slider</a>
                    </li>
                    <li class=""><a href="#smtpemail" data-toggle="tab">Smtp Email</a>
                    </li>
                    <li class=""><a href="#socialmedia" data-toggle="tab">Social Media</a>
                    </li>
                    <li class=""><a href="#aboutus" data-toggle="tab">About Us</a>
                    </li>
                    <li class=""><a href="#contact" data-toggle="tab">Contact Page</a>
                    </li>
                    <li class=""><a href="#references" data-toggle="tab">References</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in " id="general">

                        <div class="row">

                            <div class="col-md-12" style="position: relative;">
                                <h2 class="pull-left" style="">Main Page Slider</h2>
                                <div class="" style="display: inline-block; position: absolute; right: 30px; top:20%;">
                                    <a href="#image-add-form" data-toggle="collapse" class="btn btn-success"><i class="glyphicon glyphicon-plus" style="margin-right: 5px;" ></i>Add</a>
                                </div>
                            </div>

                            <div class="collapse col-md-12" id="image-add-form">
                                <form id="addImage" role="form" action="{{route('admin_mainStyleSetting_store',['pid'=>99])}}" method="post" enctype="multipart/form-data" class="form-group">
                                    @csrf
                                    <div class="dropdown-item">
                                        <label>Title</label>
                                        <input class="form-control" type="text" placeholder="Title" name="title" required>
                                    </div>

                                    <div class="form-group" class="dropdown-item">
                                        <label>Image</label>
                                        <input class="form-control" type="file" name="image" required>
                                    </div>
                                    <div class="form-group" class="dropdown-item">
                                        <label>Image Slıder Detail</label>
                                        <textarea class="form-control editor" name="slider_text"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-info">Add</button>
                                </form>
                            </div>

                        </div>

                        <div id="port-folio">
                            @foreach($image as $rs)
                                @if($cal%3==0)
                                    <div class="row ">
                                        @endif
                                        <div class="col-md-4 " style="margin-bottom: 20px; ">
                                            <div class="portfolio-item awesome mix_all" data-cat="awesome" style="display: inline-block; opacity: 1; position: relative;">

                                                <div style="position: absolute; top:10px; right:10px;">
                                                    <a href="{{route('admin_image_destroy',['pid'=>99,'id'=>$rs->id])}}" class="btn d-print-inline btn-danger btn-sm">Delete</a>
                                                </div>

                                                <div style="position: absolute; top:10px; left:10px;">
                                                    <a  href="{{route('admin_mainStyleSetting_show',['id'=>$rs->id])}}" class="btn btn-success btn-sm btn-sm" onclick="return !window.open(this.href,'','width=1800,height=900')">Show / Update</a>
                                                </div>

                                                @if($rs->image)

                                                    <a class="" title="Image Title Here" href="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" onclick="return !window.open(this.href,'','width=316,height=200')">
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
                </div>

                <div class="tab-pane fade" id="smtpemail">
                    <form role="form" action="/admin/setting/update" method="post" enctype="multipart/form-data">
                    @csrf
                </div>


                <div class="tab-pane fade" id="socialmedia">
                </div>

            </div>

        </div>

        <div class="panel-footer">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>

@endsection

@section('foot')
    <script>

        const allEditors = document.querySelectorAll('.editor');
        for (let i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }

        $(document).ready(function(){

            $('#myBtn').click(function(){

                if(window.location.href == ""){ //used to find the current page location
                    location.href = "#abc";
                    //at the bottom of page
                }
                else{
                    location.href = "#image-edit-form ";//the next page you want to take the user to
                }

            });

        });

        function reset(){
            $("#image-edit-form")[0].reset();
        }

    </script>
@endsection

