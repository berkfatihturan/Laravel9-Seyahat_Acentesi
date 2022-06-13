@extends('layouts.frontbase')

@section('title', $dataSettings->title)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))


@section('nagivation')
    @include("home.nagivation")
@endsection

@section('head')
    <link rel="stylesheet" href="{{asset('assets')}}/css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Hot Tours</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @foreach($dataHot as $rs)
                <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn" >
                    <div href="#"><img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" style="height: 400px" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                        <div class="desc">
                            <span></span>
                            <h3>{{$rs->title}}</h3>
                            <span>{{$rs->nights}} nights </span>
                            <span class="price">{{$rs->price}}</span>
                            <a class="btn btn-primary btn-outline" href="/package/{{$rs->id}}">See Detail<i class="icon-arrow-right22"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-outline btn-lg" href="/list">See All Offers <i class="icon-arrow-right22"></i></a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-features">
        <div class="container">
            <div class="row">
                @foreach($dataCategory as $rs)
                    <div class="col-md-3 animate-box ">
                        <div class="feature-left">
							<span class="icon">
								<i class="icon-hotairballoon"></i>
							</span>
                            <div class="feature-copy">
                                <h3>{{$rs->title}}</h3>
                                <p>{{$rs->keywords}}</p>
                                <p><a href="{{route('home_categorypackage',['id'=>$rs->id, 'slug'=>$rs->title])}}">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div id="fh5co-destination">
        <div class="tour-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul id="fh5co-destination-list" class="animate-box">
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-1.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Los Angeles</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-2.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Hongkong</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-3.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Italy</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-4.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Philippines</h2>
                                </div>
                            </a>
                        </li>

                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-5.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Japan</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-half text-center">
                            <div class="title-bg">
                                <div class="case-studies-summary">
                                    <h2>Most Popular Destinations</h2>
                                    <span><a href="#">View All Destinations</a></span>
                                </div>
                            </div>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-6.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Paris</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-7.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Singapore</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-8.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Madagascar</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-9.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Egypt</h2>
                                </div>
                            </a>
                        </li>
                        <li class="one-forth text-center" style="background-images: url({{asset('assets')}}/imagess/place-10.jpg); ">
                            <a href="#">
                                <div class="case-studies-summary">
                                    <h2>Indonesia</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br/>

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>See More Tours</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @foreach($dataAll as $rs)
                    <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn" >
                        <div href="#"><img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" style="height: 400px" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                            <div class="desc">
                                <span></span>
                                <h3>{{$rs->title}}</h3>
                                <span>{{$rs->nights}} nights </span>
                                <span class="price">{{$rs->price}}</span>
                                <a class="btn btn-primary btn-outline" href="/package/{{$rs->id}}">See Detail<i class="icon-arrow-right22"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-outline btn-lg" href="/list">See All Offers <i class="icon-arrow-right22"></i></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
