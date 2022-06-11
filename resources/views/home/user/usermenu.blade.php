

<ul class="sub-menu">
    <li class="sub-menu__item">
        <a class="@if($page=="User") active @endif" href="/userpanel"><i class="fa-solid fa-id-badge"></i> My Account</a>
    </li>
    <li class="sub-menu__item">
        <a class="@if($page=="reservation") active @endif" href="{{route('reservation_index')}}"><i class="fa-solid fa-book-open"></i>Rezarvation</a>
    </li>
    <li class="sub-menu__item">
        <a class="@if($page=="comment") active @endif" href="{{route('userpanel_comments')}}"><i class="fa-solid fa-book-open"></i>Review</a>
    </li>

    <li class="sub-menu__item">
        <a class="@if($page=="mypackage") active @endif" href="{{route('userpanel_mypackage')}}"><i class="fa-solid fa-book-open"></i>My Packages</a>
    </li>

    @if(Auth::user()->isAdmin()==true)
        <li class="sub-menu__item">
            <a class="@if($page=="") active @endif" href="/admin"><i class="fa-solid fa-screwdriver-wrench"></i>Admin Settings</a>
        </li>
    @endif
    <li class="sub-menu__item">
        <a class="@if($page=="") active @endif" href="/logoutuser"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
    </li>
</ul>

