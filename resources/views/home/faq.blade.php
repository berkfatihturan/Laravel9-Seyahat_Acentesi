@extends('layouts.frontbase')

@section('title', "FAQ | ". $dataSettings->title)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))


@section('nagivation')
@endsection

@section('content')
    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="col-md-offset-2 text-center heading-section animate-box fadeInUp animated" style="margin:50px auto; margin-top: 0">
                <h3 style="margin-bottom: 5px">FAQ</h3>
            </div>

            <div class="panel-group" id="accordion">
                @foreach($data as $rs)
                    <div class="panel panel-default" style="margin-bottom: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="panel-heading" style="background-color: #F78536; opacity: .7;">
                            <h3 class="panel-title" style="text-align: center; color: white; opacity: 1">
                                <a data-toggle="collapse" data-parent="#accordion" href="#{{$rs->id}}" class="collapsed">{{$rs->question}}</a>
                            </h3>
                        </div>
                        <div id="{{$rs->id}}" class="panel-collapse collapse" style="height: 0px;">
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
