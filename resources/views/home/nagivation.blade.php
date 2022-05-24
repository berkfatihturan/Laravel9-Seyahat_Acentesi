
<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets')}}/images/cover_bg_1.jpg);">

        <div class="" style="width: 100%; height: 100%; position: absolute; top: 0px; z-index: 1">
            <!-- -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 100%">
                <ol class="carousel-indicators">
                    @foreach($dataNavImage as $rs)
                        @foreach($rs->images as $img)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$cnt}}" class="@if($cnt++==0) active @endif"></li>
                        @endforeach
                    @endforeach
                </ol>
                <div class="carousel-inner {{$cnt=0}}" style="height: 100%">
                    @foreach($dataNavImage as $rs)
                        @foreach($rs->images as $img)
                            <div  class="carousel-item @if($cnt++==0) active @endif" style="height: 100%">
                                <div  class="crousel-item-index row" style="background-image:url({{\Illuminate\Support\Facades\Storage::url($img->image)}})">
                                    <div  class="crousel-item-index__detail col-sm-6 col-sm-push-1 col-md-6 col-md-push-1 desc" style="">
                                        {!! $img->slider_text !!}
                                    </div>
                                </div><!--<img class="d-block w-100" style="height: 100%;width: 100%" src="{{\Illuminate\Support\Facades\Storage::url($img->image)}}" alt="First slide">-->
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <!--
            <p>HandCrafted by <a href="http://frehtml5.co/" target="_blank" class="fh5co-site-name">FreeHTML5.co</a></p>
            <h2>Exclusive Limited Time Offer</h2>
            <h3>Fly to Hong Kong via Los Angeles, USA</h3>
            <span class="price">$599</span>-->
            <!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
        </div>

        <div class="desc">
            <div class="container">
                <div class="row" style="width: 100%">
                    <div class="col-sm-5 col-md-5">
                        <div class="tabulation animate-box">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Flights</a>
                                </li>
                                <li role="presentation">
                                    <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Hotels</a>
                                </li>
                                <li role="presentation">
                                    <a href="#packages" aria-controls="packages" role="tab" data-toggle="tab">Packages</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="flights">
                                    <div class="row">
                                        <form role="form" action="/search" method="post">
                                            @csrf
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <div class="input-field">
                                                    <label for="from">From:</label>
                                                    <input type="text" class="form-control" id="from-place" placeholder="Los Angeles, USA"/>
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <div class="input-field">
                                                    <label for="from">To:</label>
                                                    <input type="text" class="form-control" id="to-place" placeholder="Tokyo, Japan"/>
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-start">Check In:</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="mm/dd/yyyy"/>
                                                </div>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt alternate">
                                                <div class="input-field">
                                                    <label for="date-end">Check Out:</label>
                                                    <input type="text" class="form-control" id="date-end" placeholder="mm/dd/yyyy"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mt">
                                                <section>
                                                    <label for="class">Class:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>Economy</option>
                                                        <option value="economy">Economy</option>
                                                        <option value="first">First</option>
                                                        <option value="business">Business</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Adult:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Children:</label>
                                                    <select class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" class="btn btn-primary btn-block" value="Search Flight">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="hotels">
                                </div>

                                <div role="tabpanel" class="tab-pane" id="packages">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="desc2 animate-box fadeInUp animated">
                    <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">

                        <div>
                            @foreach($dataNavImage as $rs)
                                {!! $rs->detail !!}
                            @endforeach
                        </div>
-->
                        <!--
                        <p>HandCrafted by <a href="http://frehtml5.co/" target="_blank" class="fh5co-site-name">FreeHTML5.co</a></p>
                        <h2>Exclusive Limited Time Offer</h2>
                        <h3>Fly to Hong Kong via Los Angeles, USA</h3>
                        <span class="price">$599</span>
                         <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>

