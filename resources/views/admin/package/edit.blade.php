
@extends('layouts.adminbase')

@section('title', 'Edit '. $data->title)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Edit Package : {{$data->title}} </h1>
                    <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            BASIC FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" action="/admin/package/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Parent Package</label>
                                    <select class="form-control"  name="category_id">
                                        <option value="0"> Main Package</option>
                                        @foreach($dataList as $rs)
                                            <option value="{{$rs->id}}" @if($rs->id == $data->category_id) selected @endif>
                                                {{\App\Http\Controllers\AdminPanel\CategoryContoller::getParentsTree($rs,$rs->title)}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="Title" name="title" value="{{$data->title}}">
                                </div>

                                <div class="form-group">
                                    <label>Keywords</label>
                                    <input class="form-control" type="text" placeholder="keywords" name="keywords" value="{{$data->keywords}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" type="text" placeholder="Description" name="descriptions" value="{{$data->descriptions}}">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" type="number" name="price" value="{{$data->price}}">
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" type="number" name="quantity" value="{{$data->quantity}}">
                                </div>

                                <div class="form-group">
                                    <label>Min Quantity</label>
                                    <input class="form-control" type="number" name="minquantity" value="{{$data->minquantity}}">
                                </div>

                                <div class="form-group">
                                    <label>Tax %</label>
                                    <input class="form-control" type="number" name="tax" value="{{$data->tax}}">
                                </div>

                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="form-control" name="detail">
                                        {{$data->detail}}
                                    </textarea>
                                </div>


                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option selected>{{$data->status}}</option>
                                        <option>True</option>
                                        <option>False</option>
                                    </select>
                                </div>



                                <button type="submit" class="btn btn-info">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>


@endsection
