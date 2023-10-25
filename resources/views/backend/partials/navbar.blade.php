<!--**********************************            Nav header start        ***********************************-->
<div class="nav-header">
    <a href="{{ url('/')}}" class="brand-logo">
        <img src="{{ getImage(globalSettings('logo'),'image_one') }}" alt="Logo" />
    </a>
    <a class="logo-icon" href="{{ url('/')}}">
        <img src="{{ getImage(globalSettings('favicon'),'image_one') }}" alt="Logo" />
    </a>

    <div class="nav-control">
        <div class="hamburger ham-nav">
            <i class="ti-angle-double-left jjj-left"></i>
            <i class="ti-angle-double-right jjj-right"></i>
        </div>
    </div>
</div>

<!--**********************************            Nav header end        ***********************************-->

<!--**********************************            Header start        ***********************************-->

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="j-header-container">
                    <div class="j-header-content">
                        <div class="j-search">
                            <form class="j-search-form" action="{{ route('search') }}">
                                <input class="j-form-control" type="text" placeholder="Search" name="q" id="search" list="route_list" data-url="{{ route('search.route') }}">
                                <datalist id="route_list"> </datalist>
                                <button type="submit" class="j-form-btn"> <i class="icon-magnifier"></i> </button>
                            </form>

                        </div>

                        <div class="nav-lang">
                            <div class="dropdown custom-dropdown">
                                <button type="button" class="btn-ami" data-toggle="dropdown">
                                    <span>
                                        @if(app()->getLocale() == "en")
                                        <img src="{{asset('backend')}}/assets/img/flag/flg-english.png" alt="no image" /> En
                                        @elseif(app()->getLocale() == 'bn')
                                        <img src="{{asset('backend')}}/assets/img/flag/flg-bangla.png" alt="no image" /> Bn
                                        @elseif(app()->getLocale() == 'in')
                                        <img src="{{asset('backend')}}/assets/img/flag/flg-india.png" alt="no image" /> In
                                        @elseif(app()->getLocale() == 'ar')
                                        <img src="{{asset('backend')}}/assets/img/flag/flg-arabic.png" alt="no image" /> Ar
                                        @endif
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('setLocalization','en') }}">
                                        <span class="flg-lfex"> <img src="{{asset('backend')}}/assets/img/flag/flg-english.png" alt="no image" /> {{ __('label.english') }} </span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('setLocalization','ar') }}">
                                        <span class="flg-lfex"> <img src="{{asset('backend')}}/assets/img/flag/flg-arabic.png" alt="no image" /> {{ __('label.arabic') }} </span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('setLocalization','bn') }}">
                                        <span class="flg-lfex"> <img src="{{asset('backend')}}/assets/img/flag/flg-bangla.png" alt="no image" /> {{ __('label.bangla') }} </span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('setLocalization','in') }}">
                                        <span class="flg-lfex"> <img src="{{asset('backend')}}/assets/img/flag/flg-india.png" alt="no image" /> {{ __('label.hindi') }} </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="day-night">
                            <a class="j-nav-lk" href="#">
                                <i class="nav-bell">
                                    <img src="{{asset('backend')}}/assets/img/icon/d.png" alt="no image" />
                                </i>
                            </a>
                        </div>

                        <div class="dropdown notification_dropdown">
                            <a class="j-nav-lk" href="#" role="button" data-toggle="dropdown">
                                <i class="nav-bell">
                                    <img src="{{asset('backend')}}/assets/img/icon/bell.png" alt="no image" />
                                </i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="list-unstyled">

                                    <li class="media dropdown-item">
                                        <span class="success"> <i class="ti-user"></i> </span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p> <strong>Martin</strong> has added a <strong>customer</strong> Successfully </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="primary"> <i class="ti-shopping-cart"></i> </span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p> <strong>Jennifer</strong> purchased Light Dashboard 2.0. </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>

                                </ul>
                                <a class="all-notification" href="#"> {{ __('See all notifications') }} <i class="ti-arrow-right"></i> </a>
                            </div>
                        </div>


                        <div class="dropdown header-profile">
                            <a class="nav-np" href="#" role="button" data-toggle="dropdown">
                                <img src="{{ getImage(auth()->user()->image_id,'original') }}" class="np" alt="" />
                                <h6 class="heading-6 mb-0"> {{Auth::user()->name}} </h6>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('profile')}}" class="dropdown-item">
                                    <i class="icon-user"></i> <span class="ml-2">{{ __('menus.profile') }} </span>
                                </a>
                                <a href="{{route('password.update')}}" class="dropdown-item">
                                    <i class=" icon-key"></i> <span class="ml-2">{{ __('menus.change_password') }} </span>
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i> <span class="ml-2">Logout </span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>


{{-- @include('backend.todo.to_do_list') --}}

@push('scripts')

<script src="{{ asset('backend/js/navber.js') }}"></script>

@endpush
