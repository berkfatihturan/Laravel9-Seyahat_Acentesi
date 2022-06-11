@extends('layouts.frontbase')

@section('title','FAQ')
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/userpanel.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="col-md-offset-2 text-center heading-section animate-box fadeInUp animated" style="margin:50px auto; margin-top: 0">
                <h3 style="margin-bottom: 5px">FAQ</h3>
            </div>

            <div class="panel-group">
                @foreach($data as $rs)
                    <div class="panel panel-default" style="margin-bottom: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="panel-heading" style="background-color: #F78536; opacity: .7;">
                            <h3 class="panel-title" style="text-align: center; color: white; opacity: 1">
                                <a data-toggle="collapse" href="#{{$rs->id}}" onclick="deneme()">{{$rs->question}}</a>
                            </h3>
                        </div>
                        <div class="collapse" id="{{$rs->id}}"style="height: 0px;">
                            <div class="panel-body" style="text-align: center">
                                {!! $rs->answer !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <script src="{{asset('assets')}}/js/deneme.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
