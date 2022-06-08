@extends('layouts.adminwindows')

@section('title', "User Detail")

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')

    <div id="page-wrapper m-0" style="overflow: hidden">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">User : {{$data->name}}</h1>
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
                               <a class="btn btn-danger" style="color: white" href="{{route('admin_user_destroy',['id'=>$data->id])}}">Delete</a>
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
                                        <th style="width:10%;">Name</th>
                                        <td>{{$data->name}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Email</th>
                                        <td>{{$data->email}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Role</th>
                                        <td>
                                            <ul style="padding-left: 0; list-style: none">
                                            @foreach($data->roles as $role)
                                                 <li style="margin-top: 8px"><a href="{{route('admin_user_deleteRole',['rid'=>$role->id,'uid'=>$data->id])}}" class="btn btn-danger btn-sm" style="padding: 2px;margin-right: 5px;">Delete</a> {{$role->name}} </li>
                                            @endforeach
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Add Role to User</th>
                                        <td>
                                            <form id="checkout-form" action="{{route("admin_user_addRole",['id'=>$data->id])}}" method="post">
                                                @csrf
                                                <select id="role" class="form-control"  name="role">
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:10px;">Update</button>
                                                @if(\Illuminate\Support\Facades\Session::get('error')!=null) <label class="alert alert-danger pull-right" style="margin: 0; padding: 5px 10px; position:relative; top: 6.3px;">{{\Illuminate\Support\Facades\Session::get('error')}}</label> @endif
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
