@extends('layouts.adminwindows')

@section('title', 'Main Style Settings')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{asset('assets')}}/css/index.css">
@endsection


@section('content')

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

    </script>
@endsection

