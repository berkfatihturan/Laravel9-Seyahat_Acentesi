<header id="fh5co-header-section" class="sticky-banner">
    <div class="container">
        <div class="nav-header">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
            <h1 id="fh5co-logo"><a href="/"><i class="icon-airplane"></i> {{$dataSettings->title}} </a></h1>
            <!-- START #fh5co-menu-wrap -->
            @php
                $parentCategory=\App\Http\Controllers\HomeController::maincategorylist();
            @endphp

            <nav id="fh5co-menu-wrap" role="navigation">
                <ul class="sf-menu" id="fh5co-primary-menu">
                    <li class="@if($page=='home') active @endif">
                        <a href="{{route('home')}}">Home</a>
                    </li>

                    <li class="@if($page=='packages') active @endif">
                        <a href="vacation.html" class="fh5co-sub-ddown active">Packages</a>
                        <ul class="fh5co-sub-menu">
                            @foreach($parentCategory as $rs)
                            <li>
                                <a href="#">{{$rs->title}}</a>
                                <ul class="fh5co-sub-menu list-inline" style="width: 45vw;">
                                    <li style="width: 100%">
                                        <div class="row" style="width: 100%">
                                             @if(count($rs->children))
                                                 @include('home.categorytree',['children'=>$rs->children])
                                            @endif
                                        </div>
                                    </li>
                                </ul>

                            </li>
                            @endforeach
                            <!--
                            <li><a href="#">CSS3 &amp; HTML5</a></li>
                            <li><a href="#">Angular JS</a></li>
                            <li><a href="#">Node JS</a></li>
                            <li><a href="#">Django &amp; Python</a></li>
                            -->
                        </ul>
                    </li>
                    <li><a href="/faq">FAQ</a></li>
                    <li class="@if($page=='references') active @endif"><a href="{{route('references')}}">References</a></li>
                    <li class="@if($page=='about') active @endif"><a href="{{route('about')}}">About Us</a></li>
                    <li class="@if($page=='contact') active @endif"><a href="{{route('contact')}}">Contact</a></li>
                    <li class="user-menu">
                        <a href="/userpanel" class="fh5co-sub-ddown active" style="padding-top: 10px!important;">
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <span>{{Auth::user()->name}}</span>
                            @else
                            <span style="padding-right: 8px">Login</span>
                            @endif
                            <i class="fa-solid fa-user"style="font-size: 12px; color:white;padding: 10px; background-color: #F78536; border-radius: 50%"></i>
                        </a>
                        <ul class="fh5co-sub-menu">
                            <li><a href="/userpanel"><i class="fa-solid fa-id-badge"></i> My Account</a></li>
                            <li><a href=""><i class=" fa-solid fa-book-open"></i>Rezarvation</a></li>

                            @if($userCheck=Auth::check()!=null)
                                @if((Auth::user()->isAdmin()==true))
                                <li><a href="/admin"><i class=" fa-solid fa-screwdriver-wrench"></i>Admin Settings</a></li>
                                @endif
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li><a href="/logoutuser"><i class=" fa-solid fa-arrow-right-from-bracket"></i> Log Out</a></li>
                            @else
                                <li><a href="/loginadmin"><i class="fas fa-sign-in"></i> Log In</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
