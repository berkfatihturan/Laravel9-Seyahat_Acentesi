
@extends('layouts.adminbase')

@section('title', 'Package ADD')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('companyName',$dataSetting->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Add Package</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            BASIC FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{route('admin_package_store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Parent Package</label>
                                    <select class="form-control"  name="category_id">
                                        <option value="0"> Main Package</option>
                                        @foreach($data as $rs)
                                            <option value="{{$rs->id}}"> {{\App\Http\Controllers\AdminPanel\CategoryContoller::getParentsTree($rs,$rs->title)}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="Title" name="title" required>
                                </div>

                                <div class="form-group">
                                    <label>Keywords</label>
                                    <input class="form-control" type="text" placeholder="keywords" name="keywords">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" type="text" placeholder="Description" name="descriptions">
                                </div>

                                <div class="form-group">
                                    <label>Nights</label>
                                    <input class="form-control" type="number" name="nights" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" type="number" name="price" value="0">
                                </div>


                                <div class="form-group">
                                    <label>Tour Max People</label>
                                    <input class="form-control" type="number" name="max_people" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Tour Person</label>
                                    <input class="form-control" type="number" name="num_people" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Extra Charge</label>
                                    <input class="form-control" type="number" name="extra_charge" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input class="form-control" type="date" name="start_date">
                                </div>

                                <div class="form-group">
                                    <label>End Date</label>
                                    <input class="form-control" type="date" name="end_date">
                                </div>

                                <div class="form-group">
                                    <label>Tax %</label>
                                    <input class="form-control" type="number" name="tax" value="0">
                                </div>

                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="form-control" id="editor" name="detail"></textarea>
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
                                </div>


                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option>True</option>
                                        <option selected>False</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-info">Save</button>

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
