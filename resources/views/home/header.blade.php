
<header id="fh5co-header-section" class="sticky-banner">
    <div class="container">
        <div class="nav-header">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
            <h1 id="fh5co-logo"><a href="/"><i class="icon-airplane"></i>{{$dataSettings->title}} </a></h1>
            <!-- START #fh5co-menu-wrap -->
            <nav id="fh5co-menu-wrap" role="navigation">
                <ul class="sf-menu" id="fh5co-primary-menu">
                    <li class="@if($page=='home') active @endif"><a href="{{route('home')}}">Home</a></li>
                    <li class="@if($page=='packages') active @endif">
                        <a href="vacation.html" class="fh5co-sub-ddown active">Packages</a>
                        <ul class="fh5co-sub-menu">
                            <li><a href="#">Family</a>
                                <ul class="fh5co-sub-menu list-inline">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3>Deneme</h3>
                                            </div>
                                            <div class="col-md-4">.col-md-4</div>
                                            <div class="col-md-4">.col-md-4</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">.col-md-4</div>
                                            <div class="col-md-4">.col-md-4</div>
                                            <div class="col-md-4">.col-md-4</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">CSS3 &amp; HTML5</a></li>
                            <li><a href="#">Angular JS</a></li>
                            <li><a href="#">Node JS</a></li>
                            <li><a href="#">Django &amp; Python</a></li>
                        </ul>
                    </li>
                    <li><a href="flight.html">Flights</a></li>
                    <li><a href="hotel.html">Hotel</a></li>
                    <li class="@if($page=='references') active @endif"><a href="{{route('references')}}">References</a></li>
                    <li class="@if($page=='about') active @endif"><a href="{{route('about')}}">About Us</a></li>
                    <li class="@if($page=='contact') active @endif"><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
