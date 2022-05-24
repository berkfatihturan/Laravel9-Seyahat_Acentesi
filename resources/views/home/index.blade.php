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
                @foreach($data as $rs)
                <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn" >
                    <div href="#"><img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" style="height: 400px" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
                        <div class="desc">
                            <span></span>
                            <h3>{{$rs->title}}</h3>
                            <span>{{$rs->nights}} nights </span>
                            <span class="price">{{$rs->price}}</span>
                            <a class="btn btn-primary btn-outline" href="/package/{{$rs->id}}">Book Now <i class="icon-arrow-right22"></i></a>
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
                            <p><a href="#">Learn More</a></p>
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

    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Recent From Blog</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="fh5co-blog animate-box">
                        <a href="#"><img class="img-responsive" src="{{asset('assets')}}/images/place-1.jpg" alt=""></a>
                        <div class="blog-text">
                            <div class="prod-title">
                                <h3><a href="#">30% Discount to Travel All Around the World</a></h3>
                                <span class="posted_by">Sep. 15th</span>
                                <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p><a href="#">Learn More...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="fh5co-blog animate-box">
                        <a href="#"><img class="img-responsive" src="{{asset('assets')}}/images/place-2.jpg" alt=""></a>
                        <div class="blog-text">
                            <div class="prod-title">
                                <h3><a href="#">Planning for Vacation</a></h3>
                                <span class="posted_by">Sep. 15th</span>
                                <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p><a href="#">Learn More...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="fh5co-blog animate-box">
                        <a href="#"><img class="img-responsive" src="{{asset('assets')}}/images/place-3.jpg" alt=""></a>
                        <div class="blog-text">
                            <div class="prod-title">
                                <h3><a href="#">Visit Tokyo Japan</a></h3>
                                <span class="posted_by">Sep. 15th</span>
                                <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p><a href="#">Learn More...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-md-block"></div>
            </div>

            <div class="col-md-12 text-center animate-box">
                <p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Post <i class="icon-arrow-right22"></i></a></p>
            </div>

        </div>
    </div>
    <!-- fh5co-blog-section -->
    <div id="fh5co-testimonial" style="background-images:url({{asset('assets')}}/imagess/img_bg_1.jpg);">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box-testimony animate-box">
                        <blockquote>
                            <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                        </blockquote>
                        <p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="box-testimony animate-box">
                        <blockquote>
                            <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
                        </blockquote>
                        <p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="box-testimony animate-box">
                        <blockquote>
                            <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                        </blockquote>
                        <p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
