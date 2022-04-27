@extends('layouts.frontbase')

@section('title', 'Travel Agency')

@section('head')

    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('nagivation')
@endsection

@section('content')
    <div class="container mt-12">

        <div class="detail-header">
            <div class="row">
                <div class="col-lg-8 col-xs-8 col-sm-7">
                    <div class="hotel">
                        <div class="clearfix">
                            <h1 class="hotel__name pull-left">Divan Mersin</h1>
                        </div>
                        <div class="hotel__region">
                            <i class="fa fa-map-marker" aria-hidden="true"></i> Mersin - Mersin Merkez
                            <a href="javascript:void(0);" class="map-link mapTriggerDetail">Haritada Görüntüle</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-4 m-pl-5 col-sm-5">
                    <div class="row mt-10">
                        <div class="col-lg-5 col-sm-5">
                            <ul class="detail-header__fav-share-btn list-inline">
                                <li class="fav-share-btn-list list-inline-item px-0">
                                    <div class="btn btn-default btn-block favorite-icon add-favorite" data-toggle="tooltip" data-placement="top" title="" data-original-title="Favorilerime Ekle">
											<span>
												<i class="fa fa-heart-o"></i>
											</span>
                                    </div>
                                </li>

                                <li class="fav-share-btn-list list-inline-item px-0">
                                    <button type="button" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Paylaş">
										<span data-toggle="tooltip" data-placement="top" title="" data-original-title="Paylaş">
											<i class="fa fa-share-alt" aria-hidden="true"></i>
										</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" rel="nofollow" onclick="popUpAc('/content/shareonfacebook?url=https%3A%2F%2Ftatilsepeti.com%2Fdivan-mersin%3FRT%3D5', 400, 400)"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook'ta Paylaş</a></li>
                                        <li><a href="javascript:void(0);" rel="nofollow" onclick="popUpAc('/content/shareontwitter?url=https%3A%2F%2Ftatilsepeti.com%2Fdivan-mersin%3FRT%3D5&amp;status=Divan Mersin - tatilsepeti.com - 444 44 20', 1100, 800)"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter'da Paylaş</a></li>


                                        <li class="hidden-lg hidden-md"><a href="javascript:void(0);" rel="nofollow" onclick="popUpAc('/content/shareonwhatsapp?url=https%3A%2F%2Ftatilsepeti.com%2Fdivan-mersin%3FRT%3D5&amp;status=Divan Mersin - tatilsepeti.com - 444 44 20', 400, 400)"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp'tan Paylaş</a></li>

                                        <li role="separator" class="divider"></li>
                                        <li><a href="javascript:void(0);" rel="nofollow" onclick="GetShareForm('Tesis', '6374', 'Divan+Mersin', 'https%3A%2F%2Fwww.tatilsepeti.com%2Fdivan-mersin%3FRT%3D5');"><i class="fa fa-envelope" aria-hidden="true"></i> Arkadaşıma Tavsiye Et</a></li>
                                        <li><a href="javascript:void(0);" rel="nofollow" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i> Yazıcıya Gönder</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 col-sm-7 hidden-xs">
                            <button class="btn btn-primary btn-block" rel="nofollow" onclick="scrollToAnchor('dev-roomList');">Rezervasyon Yap</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mySlides">
            <div class="numbertext">1 / 6</div>
            <img src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103529910670.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 6</div>
            <img src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103534590678.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 6</div>
            <img src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103495746610.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 6</div>
            <img src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103519614652.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">5 / 6</div>
            <img src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103487166595.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">6 / 6</div>
            <img src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103504638625.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="https://tatilsepeti.cubecdn.net/Files/TesisResim/06374/tsr06374636002103529910670.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
            </div>
            <div class="column">
                <img class="demo cursor" src="img_5terre.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
            <div class="column">
                <img class="demo cursor" src="img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
            </div>
            <div class="column">
                <img class="demo cursor" src="img_lights.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
            </div>
            <div class="column">
                <img class="demo cursor" src="img_nature.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
            </div>
            <div class="column">
                <img class="demo cursor" src="img_snow.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
            </div>
        </div>
    </div>


    <div class="container">
        <h2>Carousel Example</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="la.jpg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <img src="chicago.jpg" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                    <img src="ny.jpg" alt="New york" style="width:100%;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>






    </div>
@endsection
@section('foot')
    <script src="{{asset('assets')}}/js/deneme.js"></script>
@endsection
