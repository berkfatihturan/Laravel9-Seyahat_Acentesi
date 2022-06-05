@extends('layouts.adminwindows')

@section('title', 'Main Style Settings')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{asset('assets')}}/css/index.css">
@endsection


@section('content')

    <div class="sidebar-container" style="position: relative" id="sidebar">
        <div class="sidebar__button" id="side-bar__button">
            <button onclick="hidde()">
                <i style="color: red;" class="fa-solid fa-align-justify bg"></i>
                <span style="color: red; font-weight: 600; ">Update</span>
            </button>
        </div>

        <div class="sidebar-hidde" id="sidebar-form">
            <div class="" id="image-edit-form">

                <form role="form" action="{{route('admin_image_update',['id'=>$img->id])}}" method="post"
                      enctype="multipart/form-data" class="form-group col-md-12">
                    @csrf

                    <div class="dropdown-item">
                        <label>Title</label>
                        <input class="form-control" type="text" placeholder="Title" name="title" value="{{$img->title}}">
                    </div>

                    <div class="form-group" class="dropdown-item">
                        <label>Image</label>
                        <input class="form-control" type="file" name="image" value="{{$img->image}}">
                    </div>

                    <div class="form-group" class="dropdown-item">
                        <label>Image Slıder Detail</label>
                        <textarea class="form-control editor" name="slider_text">
                                                {!! $img->slider_text !!}
                                            </textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Update</button>
                </form>

        </div>
    </div>


    <div id="page-wrapper m-0" >
        <div id="page-inner fh5co-cover m-0">
            <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>

                <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="">
                    <div  class="crousel-item-index row" style="background-image:url({{\Illuminate\Support\Facades\Storage::url($img->image)}}); width:100%;height:800px;">

                        <div class="crousel-item-index__img col-sm-3">
                            <img src="{{asset('assets')}}/admin/img/search.png" style="z-index: 3; height: 100%" >
                        </div>

                        <div  class="crousel-item-index__detail col-sm-6 col-sm-push-1 col-md-6 col-md-push-1 desc">
                            {!! $img->slider_text !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('foot')
    <script>

        const allEditors = document.querySelectorAll('.editor');
        for (let i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }

        function hidde(){
            var sidebar_form = document.getElementById("sidebar-form");
            var sidebar_button = document.getElementById("side-bar__button")
            sidebar_form.classList.toggle("sidebar");
            sidebar_button.classList.toggle("sidebar__button-active");

        }

    </script>
@endsection

