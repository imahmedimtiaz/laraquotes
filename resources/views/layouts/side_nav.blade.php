<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" 
                        src="{{ asset('assets/img/profile_small.jpg') }}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">
                                {{Auth::user()->name}}  
                            </span>
                            <span class="text-muted text-xs block">{{Auth::user()->email}} <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="">Profile</a></li>
                            <!-- <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li> -->
                        </ul>
                    </div>
                    <div class="logo-element">
                        TBK
                    </div>
                </li>

                <li class="{{ request()->route()->named('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                    <i class="fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{route('quotes.index')}}">
                        <i class="fa fa-list"></i> 
                        <span class="nav-label">Quotes</span>
                    </a>
                </li>

                
            </ul>
        </div>
    </nav>
