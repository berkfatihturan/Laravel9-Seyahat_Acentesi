
@extends('layouts.adminbase')

@section('title', 'Show '. $data->title)

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">{{$data->title}} </h1>
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
                                Package List
                            </div>
                            <p style="display: inline-block; position: absolute; right: 10px; top:5px;">
                                <button type="button" class="btn btn-info" style="color: white"><a class="text-decoration-none" href="{{route('admin_package_edit',['id'=>$data->id])}}">Edit</a></button>
                                <button type="button" class="btn btn-danger" style="color: white"><a href="{{route('admin_package_destroy',['id'=>$data->id])}}">Delete</a></button>
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="">
                                    <tr>
                                        <th style="width:10%;";>Id</th>
                                        <td>{{$data->id}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;";>Category</th>
                                        <td>
                                            @if($data->category!=NULL)
                                                {{\App\Http\Controllers\AdminPanel\CategoryContoller::getParentsTree($data->category,$data->category->title)}}
                                            @else
                                                Other
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Title</th>
                                        <td>{{$data->title}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Keywords</th>
                                        <td>{{$data->keywords}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Descriptions</th>
                                        <td>{{$data->descriptions}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Nights</th>
                                        <td>{{$data->nights}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Price</th>
                                        <td>{{$data->price}}</td>
                                    </tr>

                                    <!-- Extra -->
                                    <tr>
                                        <th style="width:10%;">Tour Max People</th>
                                        <td>{{$data->max_people}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Tour Person</th>
                                        <td>{{$data->num_people}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Extra Charge</th>
                                        <td>{{$data->extra_charge}}</td>
                                    </tr>



                                    <tr>
                                        <th style="width:10%;">Start Date</th>
                                        <td>{{$data->start_date}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">End Date</th>
                                        <td>{{$data->end_date}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Tax</th>
                                        <td>{{$data->tax}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Detail</th>
                                        <td>{!! $data->detail !!}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Image</th>
                                        <td>
                                            @if($data->image)
                                                <img src="{{Storage::url($data->image)}}" class="col-md-12">
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;">Status</th>
                                        <td>{{$data->status}}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:10%;";>Uploaded By</th>
                                        <td>{{$data->user->name}}</td>
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
