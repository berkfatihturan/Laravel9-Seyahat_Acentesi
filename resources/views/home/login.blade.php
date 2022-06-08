@extends('layouts.frontbase')

@section('title', "Login | ". \App\Models\Setting::getSettings()->title)
@section('description', \App\Models\Setting::getSettings()->description)
@section('keywords', \App\Models\Setting::getSettings()->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url(\App\Models\Setting::getSettings()->icon))


@section('nagivation')
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">

            <div class="row text-center " style="padding-top:10px;">
                <div class="col-md-12">
                    <h1 class="" style="font-weight: 700;text-transform: uppercase;color: #F78536;font-size: 28px; margin-bottom: 10px">{{\App\Models\Setting::getSettings()->title}}</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                    <div class="panel-body">

                        @error('error')
                        <div class="form-group input-group" style="width: 100%">
                            <div class="alert alert-danger" style="margin-bottom: 5px; text-align: center">
                                <strong>{{$message}}</strong>
                            </div>
                        </div>
                        @enderror

                        <form role="form" action="{{route('loginUsercheck')}}" method="post">
                            @csrf
                            <hr/>
                            <h5 style="margin-bottom: 10px">Enter Details to Login</h5>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag" style="font-size: 17px; position: relative; top: 2px; right: 5px;" ></i></span>
                                <x-jet-input style="height: 42px!important;" id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus placeholder="Your Email"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" style="font-size: 17px; position: relative; top: 2px; right: 5px;"></i></span>
                                <x-jet-input style="height: 42px!important;" id="password" type="password" class="form-control" name="password" placeholder="Your Password" autocomplete="current-password"/>
                            </div>
                            <div class="form-group">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600" style="font-weight: 400">{{ __('Remember me') }}</span>
                                </label>
                                <span class="pull-right">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </span>
                            </div>

                            <button type="submit" href="index.html" class="btn btn-primary">Login Now</button>
                            <hr />
                            Not register ? <a href="/registeruser" >Register a new membership </a>
                        </form>
                    </div>

                </div>


            </div>

        </div>
    </div>
@endsection

