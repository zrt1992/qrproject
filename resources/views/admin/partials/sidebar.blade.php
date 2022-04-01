<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <style type="text/css">
                .collapse i{
                    padding: 0px 5px 0px 0px !important;
                }
            </style>
            <ul id="sidebarnav">
                <!-- <li class="nav-small-cap">PERSONAL</li> -->
                <li> <a class="waves-effect waves-dark" href="{{route('admin')}}"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                </br>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-plus"></i><span class="hide-menu">QR</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('qr.index')}}"><i class="fa fa-home"></i><span>Generate Qr</span></a></li>
                        <!-- <li><a href="#"><i class="fa fa-home"></i><span>Qr List</span></a></li> -->
                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('user.index')}}"><i class="icon-speedometer"></i><span class="hide-menu">Users</span></a>
                </li>
                <form action="{{route('logout')}}" method="post" id="form-logout" style="display: none;">
                    @csrf
                </form>
                    <li> <a class="waves-effect waves-dark" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit();" aria-expanded="false"><i class="fa fa-sign-out-alt text-success"></i><span class="hide-menu">Log Out</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>