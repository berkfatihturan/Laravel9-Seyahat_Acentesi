@extends('layouts.adminwindows')

@section('title', "Comment")

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')

    <div id="page-wrapper m-0" style="overflow: hidden">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Commment <span style="color: #0d6aad">{{$data->package->title}}</span> From <span style="color: #00b3ee">{{$data->user->name}}</span></h1>
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
                                Comment Detail
                            </div>
                            <p style="display: inline-block; position: absolute; right: 10px; top:5px;">
                                <button type="button" class="btn btn-danger" style="color: white"><a href="{{route('admin_comment_destroy',['id'=>$data->id])}}">Delete</a></button>
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
                                        <th style="width:10%;">User Id</th>
                                        <td>{{$data->user_id}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Package Id</th>
                                        <td>{{$data->package_id}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Package Tıtle</th>
                                        <td><a href="{{route('admin_package_show',['id'=>$data->package_id])}}">{{$data->package->title}}</a></td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Subject</th>
                                        <td>{{$data->subject}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Comment</th>
                                        <td>{{$data->comment}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Ip</th>
                                        <td>{{$data->IP}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">RATE</th>
                                        <td>{{$data->rate}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Status</th>
                                        <td>
                                            <form id="checkout-form" action="{{route("admin_comment_update",['id'=>$data->id])}}" method="post">
                                                @csrf
                                                <select id="status" class="form-control"  name="status">
                                                    <option value="New" @if($data->status=='New') selected @endif>New</option>
                                                    <option value="False" @if($data->status=='False') selected @endif>False</option>
                                                    <option value="True" @if($data->status=='True') selected @endif>True</option>
                                                </select>
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
