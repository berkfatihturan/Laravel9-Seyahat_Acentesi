@extends('layouts.adminwindows')

@section('title', "Resenvation Detail")

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')

    <div id="page-wrapper m-0" style="overflow: hidden">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"><span style="color: #0d6aad"> {{$data->user->name}}</span>'s Reservation  For <span style="color: #00b3ee">{{$data->package->title}}</span></h1>
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
                                Reservation Detail
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
                                        <th style="width: 10%"> User Name</th>
                                        <td>{{$data->user->name}}</td>
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
                                        <th style="width:10%;">Start Date</th>
                                        <td>{{$data->start_date}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Person</th>
                                        <td>{{$data->person}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Prıce</th>
                                        <td>{{$data->price}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Amount</th>
                                        <td>{{$data->amount}}</td>
                                    </tr>

                                    <tr style="margin-bottom: 10px">
                                        <th style="width:10%;">phone_number</th>
                                        <td>{{$data->phone_number}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">email</th>
                                        <td>{{$data->email}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">id_number</th>
                                        <td>{{$data->id_number}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">address</th>
                                        <td>{{$data->address}}</td>
                                    </tr>

                                    <form id="checkout-form" action="{{route("admin_reservation_update",['id'=>$data->id])}}" method="post">
                                        @csrf
                                        <tr>
                                            <th style="width:10%;">Note</th>
                                            <td>
                                                <textarea cols="100" rows="10" name="note">{{$data->note}}</textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th style="width:10%;">Status</th>
                                            <td>
                                                <select id="status" class="form-control"  name="status">
                                                    <option value="New" @if($data->status=='New') selected @endif>New</option>
                                                    <option value="Completed" @if($data->status=='Completed') selected @endif>Completed</option>
                                                    <option value="Accepted" @if($data->status=='Accepted') selected @endif>Accepted</option>
                                                    <option value="Cancelled" @if($data->status=='Cancelled') selected @endif>Cancelled</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:10px;">Update</button>
                                            </td>
                                        </tr>
                                    </form>

                                    <tr>
                                        <th style="width:10%;">Ip</th>
                                        <td>{{$data->IP}}</td>
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
