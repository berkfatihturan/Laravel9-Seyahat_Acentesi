<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div" style="position: relative;">
                    <img src="{{asset('assets')}}/admin/img/user.png" class="img-thumbnail" style="position: absolute;left: 10px;"/>

                    <div class="inner-text" style="display: inline-block; position: absolute; top:auto; right: 10px;">
                        <span style="font-size: 18px;font-weight: 600">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        <br/>
                        <small><span>{{$us=\Illuminate\Support\Facades\Auth::user()->roles->first()->name}}</span>

                        </small>
                    </div>
                </div>

            </li>



            <li>
                <a href="#"><i class="fa fa-desktop "></i>Reservation<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin_reservation_index',['status'=>'New'])}}"><i class="fa fa-circle-o "></i></i>New</a>
                    </li>

                    <li>
                        <a href="{{route('admin_reservation_index',['status'=>'Accepted'])}}"><i class="fa fa-circle-o "></i></i>Accepted</a>
                    </li>


                    <li>
                        <a href="{{route('admin_reservation_index',['status'=>'Cancelled'])}}"><i class="fa fa-circle-o "></i>Cancelled</a>
                    </li>

                    <li>
                        <a href="{{route('admin_reservation_index',['status'=>'Completed'])}}"><i class="fa fa-circle-o "></i>Completed</a>
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
                <a  href="{{route('admin_mainStyleSetting',['id'=>\App\Models\Image::first()])}}"><i class="fa fa-dashboard "></i>Extra Settings</a>
            </li>

        </ul>
    </div>

</nav>
