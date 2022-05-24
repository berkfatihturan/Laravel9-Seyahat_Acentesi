<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div" style="position: relative;">
                    <img src="{{asset('assets')}}/admin/img/user.png" class="img-thumbnail" style="position: absolute; top: ;left: 10px;"/>

                    <div class="inner-text" style="display: inline-block; position: absolute; top:auto; right: 10px;">
                        <span style="font-size: 18px;font-weight: 600">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        <br/>
                        <small>Last Login : 2 Weeks Ago </small>
                    </div>
                </div>

            </li>



            <li>
                <a href="#"><i class="fa fa-desktop "></i>Reservation<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>On Going</a>
                    </li>
                    <li>
                        <a href="notification.html"><i class="fa fa-bell "></i>Cancelled</a>
                    </li>
                    <li>
                        <a href="progress.html"><i class="fa fa-circle-o "></i>In Progress</a>
                    </li>
                </ul>
            </li>

            <li>
                <a  href="{{route('admin_category_index')}}"><i class="fa fa-dashboard "></i>Category</a>
            </li>

            <li>
                <a  href="{{route('admin_package_index')}}"><i class="fa fa-dashboard "></i>Package</a>
            </li>

            <li>
                <a  href="{{route('admin_comment_index')}}"><i class="fa fa-dashboard "></i>Comments</a>
            </li>

            <li>
                <a  href="{{route('admin_user_index')}}"><i class="fa fa-dashboard "></i>Users</a>
            </li>

            <li>
                <a  href="{{route('admin_faq_index')}}"><i class="fa fa-dashboard "></i>FAQ</a>
            </li>

            <li>
                <a  href="{{route('admin_message_index')}}"><i class="fa fa-dashboard "></i>Messages</a>
            </li>

            <li>
                <a  href="/admin/setting"><i class="fa fa-dashboard "></i>Settings</a>
            </li>

            <li>
                <a  href="{{route('admin_mainStyleSetting',['id'=>\App\Models\Image::first()])}}"><i class="fa fa-dashboard "></i>Main Style Settings</a>
            </li>

        </ul>
    </div>

</nav>
