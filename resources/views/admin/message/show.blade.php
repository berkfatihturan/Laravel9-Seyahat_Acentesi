@extends('layouts.adminwindows')

@section('title', "Messages")

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')

    <div id="page-wrapper m-0" style="overflow: hidden">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Message From {{$data->name}}</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12"></div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style="position: relative">
                            <div style="display: inline-block;">
                                Message Detail
                            </div>
                            <p style="display: inline-block; position: absolute; right: 10px; top:5px;">
                                <button type="button" class="btn btn-danger" style="color: white"><a href="{{route('admin_message_destroy',['id'=>$data->id])}}">Delete</a></button>
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="">
                                    <tr>
                                        <th style="width:15%;";>Id</th>
                                        <td>{{$data->id}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Subject</th>
                                        <td>{{$data->subject}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Name</th>
                                        <td>{{$data->name}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Email</th>
                                        <td>{{$data->email}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Phone</th>
                                        <td>{{$data->phone}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Message</th>
                                        <td>{{$data->message}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Ip</th>
                                        <td>{{$data->ip}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Status</th>
                                        <td>{{$data->status}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Admin Note</th>
                                        <td>
                                            <form id="checkout-form" action="{{route("admin_message_update",['id'=>$data->id])}}" method="post">
                                                @csrf
                                                <textarea class="form-control" id="editor" name="note" >
                                                    {{$data->note}}
                                                </textarea>
                                                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:10px;">Update</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Created Date</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Updated Date</th>
                                        <td>{{$data->updated_at}}</td>
                                    </tr>
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

@section('foot')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
