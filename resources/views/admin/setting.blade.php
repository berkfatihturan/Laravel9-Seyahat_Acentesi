@extends('layouts.adminbase')

@section('title', 'Settings')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('companyName',$data->company)

@section('content')

    <div id="page-wrapper">
        <div id="page-inner">
            <h1 class="page-head-line">Settings</h1>

            <form role="form" action="/admin/setting/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab">General</a>
                        </li>
                        <li class=""><a href="#smtpemail" data-toggle="tab">Smtp Email</a>
                        </li>
                        <li class=""><a href="#socialmedia" data-toggle="tab">Social Media</a>
                        </li>
                        <li class=""><a href="#aboutus" data-toggle="tab">About Us</a>
                        </li>
                        <li class=""><a href="#contact" data-toggle="tab">Contact Page</a>
                        </li>
                        <li class=""><a href="#references" data-toggle="tab">References</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane fade active in " id="general">

                            <input class="form-control" id="id" type="hidden" placeholder="Title" name="id" value="{{$data->id}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" id="title" type="text" placeholder="Title" name="title" value="{{$data->title}}" required>
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" type="text" placeholder="keywords" name="keywords" value="{{$data->keywords}}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" type="text" placeholder="Description" name="description" value="{{$data->description}}">
                            </div>

                            <div class="form-group">
                                <label>Company</label>
                                <input class="form-control" type="text" placeholder="Company" name="company" value="{{$data->company}}">
                            </div>

                            <div class="form-group">
                                <label>Adress</label>
                                <input class="form-control" type="text" placeholder="Adress" name="address" value="{{$data->address}}">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{$data->phone}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" placeholder="Email" name="email" value="{{$data->email}}">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option selected>{{$data->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" type="file" name="icon">
                            </div>

                        </div>


                        <div class="tab-pane fade" id="smtpemail">

                            <div class="form-group">
                                <label>Smtp Server</label>
                                <input class="form-control" type="text" placeholder="Smtp Server" name="smtpserver" value="{{$data->smtpserver}}">
                            </div>

                            <div class="form-group">
                                <label>Smtp Email</label>
                                <input class="form-control" type="text" placeholder="Smtp Email" name="smtpemail" value="{{$data->smtpemail}}">
                            </div>

                            <div class="form-group">
                                <label>Smtp Password</label>
                                <input class="form-control" type="password" placeholder="Smtp Password" name="smtppassword" value="{{$data->smtppassword}}">
                            </div>

                            <div class="form-group">
                                <label>Smtp Port</label>
                                <input class="form-control" type="number" name="smtpport" value="{{$data->smtpport}}">
                            </div>

                        </div>


                        <div class="tab-pane fade" id="socialmedia">

                            <div class="form-group">
                                <label>Fax</label>
                                <input class="form-control" type="text" placeholder="Fax" name="fax" value="{{$data->fax}}">
                            </div>

                            <div class="form-group">
                                <label>Facebook</label>
                                <input class="form-control" type="text" placeholder="Facebook" name="facebook" value="{{$data->facebook}}">
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <input class="form-control" type="text" placeholder="Instagram" name="ınstagram" value="{{$data->instagram}}">
                            </div>

                            <div class="form-group">
                                <label>Twitter</label>
                                <input class="form-control" type="text" placeholder="Twitter" name="twitter" value="{{$data->twitter}}">
                            </div>

                            <div class="form-group">
                                <label>Youtube</label>
                                <input class="form-control" type="text" placeholder="Youtube" name="youtube" value="{{$data->youtube}}">
                            </div>

                        </div>


                        <div class="tab-pane fade" id="aboutus">

                            <div class="form-group">
                                <label>About Us</label>
                                <textarea class="form-control editor" name="aboutus">
                                {{$data->aboutus}}
                            </textarea>
                            </div>

                        </div>


                        <div class="tab-pane fade" id="contact">
                            <div class="form-group">
                                <label>Contact</label>
                                <textarea class="form-control editor" name="contact">
                                {{$data->contact}}
                            </textarea>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="references">
                            <div class="form-group">
                                <label>References</label>
                                <textarea class="form-control editor" name="references">
                                {{$data->references}}
                            </textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="panel-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>

            </form>

        </div>

        <!-- /. PAGE INNER  -->
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
