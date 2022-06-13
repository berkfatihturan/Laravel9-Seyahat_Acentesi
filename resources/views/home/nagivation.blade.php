
<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset('assets')}}/images/cover_bg_1.jpg);">

        <div class="" style="width: 100%; height: 100%; position: absolute; top: 0px; z-index: 1">
            <!-- -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 100%;">
                <ol class="carousel-indicators" style=" margin: 0 auto;">
                    @foreach($dataNavImage as $rs)

                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$cnt}}" class="@if($cnt++==0) active @endif"></li>

                    @endforeach
                </ol>
                <div class="carousel-inner {{$cnt=0}}" style="height: 100%">

                        @foreach($dataNavImage as $img)
                            <div  class="carousel-item @if($cnt++==0) active @endif" style="height: 100%">
                                <div  class="crousel-item-index row" style="background-image:url({{\Illuminate\Support\Facades\Storage::url($img->image)}})">
                                    <div  class="crousel-item-index__detail col-sm-6 col-sm-push-1 col-md-6 col-md-push-1 desc" style="z-index: 3">
                                        {!! $img->slider_text !!}
                                        <a href="{{route('home_package',['pid'=>$img->package->id])}}" class="btn btn-primary btn-lg">See More</a>
                                    </div>
                                </div><!--<img class="d-block w-100" style="height: 100%;width: 100%" src="{{\Illuminate\Support\Facades\Storage::url($img->image)}}" alt="First slide">-->
                            </div>
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

        <div class="desc" style="width: 45vw">
            <div class="container">
                <div class="row deneme" style="width: 100%">
                    <div class="col-sm-4 col-md-5"></div>
                    <div class="col-sm-8 col-md-6" style="max-width: 500px;">
                        <div class="tabulation animate-box">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Packages</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="flights">
                                    <div class="row">
                                        <form role="form" action="/search" method="post">
                                            @csrf

                                            <div class="col-sm-12 mt">
                                                <section>
                                                    <label for="class">Category:</label>
                                                    <select name="category_id" class="cs-select cs-skin-border">
                                                        @foreach($CategoryList as $rs)
                                                            <option value="{{$rs->id}}">
                                                                {{\App\Http\Controllers\AdminPanel\CategoryContoller::getCategory($rs,$rs->title)}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </section>
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
                                                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="mm/dd/yyyy"/>
                                                </div>
                                            </div>

                                            <div class="col-xxs-12 col-xs-6 mt">
                                                <section>
                                                    <label for="class">Adult:</label>
                                                    <select name="mum_people_adult" class="cs-select cs-skin-border">
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
                                                    <select name="mum_people_children" class="cs-select cs-skin-border">
                                                        <option value="" disabled selected>1</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" class="btn btn-primary btn-block" value="Search">
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



