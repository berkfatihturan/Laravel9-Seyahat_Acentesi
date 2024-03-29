@extends('layouts.frontbase')

@section('title', $pack->title)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))

@section('head')

    <link rel="stylesheet" href="{{asset('assets')}}/css/package.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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

                                <div class="hotel__name pull-left">
                                    <div class="btn btn-primary clearfix" style=" float: left; margin-right: 10px; padding: 6px; font-weight:600; font-size: 15px;">{{number_format($pack->comment->average('rate'),1)}}</div>
                                    <h1>{{$pack->title}}</h1>
                                </div>
                        </div>

                        <div class="hotel__region">
                            <i class="fa fa-map-marker" aria-hidden="true"></i> Mersin - Mersin Merkez
                            <a href="javascript:void(0);" class="map-link mapTriggerDetail">Haritada Görüntüle</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-4 m-pl-5 col-sm-5">
                    <div class="row mt-10">
                        <div class="col-lg-5 col-sm-5 pr-0">
                            <ul class="detail-header__fav-share-btn list-inline pull-right">
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
                            <a href="{{route('reservation_create',['pid'=>$pack->id])}}" class="btn btn-primary btn-block btn-lg">Rezervasyon Yap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="carousel-container position-relative row">

                <!-- Sorry! Lightbox doesn't work - yet. -->

                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%">
                    <div class="carousel-inner">
                        @foreach($data as $rs)
                            <div class="carousel-item @if($counter==0) active @endif" data-slide-number="{{$counter++}}" style="height: 65vh;">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery" style="object-fit: cover;object-position: center">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Carousel Navigation -->
                <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($data as $rs)
                            @if($counter2 % 6 ==0)
                                <div class="carousel-item @if($counter2==0) active @endif">
                                    <div class="row mx-0" >
                                        @endif

                                        <div id="carousel-selector-{{$counter2}}" class="thumb col-3 col-sm-2 px-0 py-2 @if($counter2==0) selected @endif" data-target="#myCarousel" data-slide-to="{{$counter2}}">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($rs->image)}}" class="img-fluid" alt="...">
                                        </div>

                                        @if($counter2 % 6 == 5)
                                    </div>
                                </div>
                            @endif
                            <span style="display: none">{{$counter2++}}</span>
                        @endforeach

                        @if($counter2 % 6 !=0)
                    </div>
                </div>
                @endif
            </div>
            <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div> <!-- /row -->
    </div> <!-- /container -->

    <div class="detail-tab my-5">
        <ul class="nav nav-tabs " role="tablist">
            <li role="presentation" class="@if(\Illuminate\Support\Facades\Session::get('info')==null) active @endif"><a href="#detail" style="color: black;" aria-controls="campaign" role="tab" data-toggle="tab">Detail</a></li>
            <li role="presentation" class=""> <a href="#descriptions" style="color: black;" aria-controls="campaign" role="tab" data-toggle="tab">Descriptions</a></li>
            <li role="presentation" class="@if(\Illuminate\Support\Facades\Session::get('info')!=null) active @endif"> <a href="#reviews" style="color: black;" aria-controls="campaign" role="tab" data-toggle="tab">Reviews ( {{$pack->comment->count('id')}} )</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane @if(\Illuminate\Support\Facades\Session::get('info')==null) active @endif" id="detail">
                {!! $pack->detail !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="descriptions">
                {{$pack->descriptions}}
            </div>
            <div role="tabpanel" class="tab-pane @if(\Illuminate\Support\Facades\Session::get('info')!=null) active @endif" id="reviews">
                <div class="row">

                    <form id="checkout-form" class="form-block" style="width: 100%; margin-bottom: 10px;" method="post" action="{{route('packagecomment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group fl_icon">
                                    <input class="form-input" name="subject" type="text" placeholder="Subject">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <textarea name="comment" class="form-input" placeholder="Your Comment"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" style="width: auto">YOUR RATING:</label>
                                    <div class="rating">
                                        <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <input type="hidden" name="package_id" value="{{$pack->id}}">
                                    <label style="margin-left: 10px">{{\Illuminate\Support\Facades\Session::get('info')}}</label>
                                    @auth
                                        <button class="btn btn-primary pull-right" style="border-radius: 5px; font-weight:500">Submit</button>
                                    @else
                                        <a href="/loginuser" class="btn btn-primary pull-right" style="border-radius: 5px; font-weight:400"> For Submit Your Review, Please Login</a>
                                    @endauth
                                </div>
                            </div>

                        </div>
                    </form>



                    @foreach($dataComment as $cmt)
                    <div class="col-md-12 mb-2">
                        <div class="media g-mb-30 media-comment">
                            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <div class="star-rating pull-right">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star @if($cmt->rate>1) checked @endif"></span>
                                        <span class="fa fa-star @if($cmt->rate>2) checked @endif"></span>
                                        <span class="fa fa-star @if($cmt->rate>3) checked @endif"></span>
                                        <span class="fa fa-star @if($cmt->rate>4) checked @endif"></span>
                                    </div>
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$cmt->user->name}}</h5>

                                    <span class="g-color-gray-dark-v4 g-font-size-12">{{$cmt->created_at->diffForHumans()}}</span>
                                </div>
                                <div>
                                    <h4 style="font-weight: 600; margin-top: 10px">{{$cmt->subject}}</h4>
                                    <p>{{$cmt->comment}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <div class="media g-mb-30 media-comment">
                            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image Description">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0">John Doe</h5>
                                    <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                                </div>

                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                                    felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>

                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                            178
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mr-20">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                            34
                                        </a>
                                    </li>
                                    <li class="list-inline-item ml-auto">
                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                            Reply
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pager">
                    <li><a href="#">Previous</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>


        </div>
    </div>

    </div>
@endsection

@section('foot')
    <script src="{{asset('assets')}}/js/deneme.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
