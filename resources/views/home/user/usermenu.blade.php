
<ul class="sub-menu">
    <li class="sub-menu__item"><a href="/admin"><i class="fa-solid fa-id-badge"></i> My Account</a></li>
    <li class="sub-menu__item"><a href="#"><i class="fa-solid fa-book-open"></i>Rezarvation</a></li>
    @if(Auth::user()->isAdmin()==true)
        <li class="sub-menu__item"><a href="/admin"><i class="fa-solid fa-screwdriver-wrench"></i>Admin Settings</a></li>
    @endif
    <li class="sub-menu__item"><a href="/logoutuser"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a></li>
</ul>



