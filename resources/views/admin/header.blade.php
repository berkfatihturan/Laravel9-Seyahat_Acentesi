<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin/" style="padding-top: 15px;background: #00CA79;opacity: .9;">@yield('companyName')</a>
    </div>

    <div class="header-right">

        <a href="{{route('admin_message_index')}}" class="btn btn-info" style="background: none;border: none" title="New Message">@if(\App\Models\Message::countMessage()>0)<b>{{\App\Models\Message::countMessage()}} </b>@endif<i class="fa fa-envelope-o fa-2x"></i></a>
        <a href="{{route('home')}}" class="btn btn-primary" style="background: none; border: none" title="Home"><i style="font-size: 22px" class="fas fa-home-lg"></i></a>
        <a href="/logoutuser" class="btn btn-danger" style="background: none; border: none" title="Logout"><i class="fas fa-sign-out fa-2x"></i></a>

    </div>
</nav>
