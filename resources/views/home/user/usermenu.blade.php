<a href="@if(Auth::check()) /admin @else /loginadmin @endif" class="fh5co-sub-ddown active" style="padding-top: 10px!important;">
    @if(\Illuminate\Support\Facades\Auth::check())
        <span>{{Auth::user()->name}}</span>
    @else
        <span style="padding-right: 8px">Login</span>
    @endif
    <i class="fa-solid fa-user "style="font-size: 12px; color:white;padding: 10px; background-color: #F78536; border-radius: 50%"></i>
</a>
<ul class="fh5co-sub-menu">
    <li><a href="/admin"><i class="fa-solid fa-id-badge"></i> My Account</a></li>
    <li><a href="#"><i class="fa-light fa-book-arrow-right"></i>Rezarvation</a></li>
    <li><a href="/logoutuser"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a></li>
</ul>
