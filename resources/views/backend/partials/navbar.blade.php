	<!--**********************************
          Nav header start
      ***********************************-->
      <div class="nav-header">
        <a href="/" class="brand-logo">
          <img src="{{asset('backend')}}/assets/img/logo/logo.png" alt="no image">


        </a>
        <a class="logo-icon" href="#">
            <img src="{{asset('backend')}}/assets/img/logo/favicon.png" alt="Logo">
        </a>
        <div class="nav-control">
          <div class="hamburger ham-nav">
            <i class="ti-angle-double-left jjj-left"></i>
            <i class="ti-angle-double-right jjj-right"></i>
          </div>
        </div>
      </div>
      <!--********************************** Nav header end***********************************-->

      <!--********************************** Header start***********************************-->
      <div class="header">
        <div class="header-content">
          <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
              <div class="j-header-container">
                <div class="j-header-content">
                  <div class="j-search">
                    <form class="j-search-form">
                      <input class="j-form-control" type="search" placeholder="Search">
                      <button type="submit" class="j-form-btn">
                        <i>
                          <img src="{{asset('backend')}}/assets/img/icon/search.png" alt="no image">
                        </i>
                      </button>
                    </form>
                  </div>
                  <div class="j-to-do">
                    <a href="#" class="j-td-btn">
                      <img src="{{asset('backend')}}/assets/img/icon/to-do.png" class="jj" alt="no image">
                      <span>To Do</span>
                    </a>
                  </div>
                  <div class="nav-lang">
                    <div class="dropdown custom-dropdown">
                      <button type="button" class="btn-ami" data-toggle="dropdown">
                        <span>
                          <img src="{{asset('backend')}}/assets/img/flag/flg-english.png" alt="no image"> En <i
                            class="fa fa-angle-down"></i>
                        </span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                          <span class="flg-lfex">
                            <img src="{{asset('backend')}}/assets/img/flag/flg-english.png" alt="no image"> English
                          </span>
                        </a>
                        <a class="dropdown-item" href="#">
                          <span class="flg-lfex">
                            <img src="{{asset('backend')}}/assets/img/flag/flg-arabic.png" alt="no image"> Arabic
                          </span>
                        </a>
                        <a class="dropdown-item" href="#">
                          <span class="flg-lfex">
                            <img src="{{asset('backend')}}/assets/img/flag/flg-bangla.png" alt="no image"> Bangla
                          </span>
                        </a>
                        <a class="dropdown-item" href="#">
                          <span class="flg-lfex">
                            <img src="{{asset('backend')}}/assets/img/flag/flg-spanish.png" alt="no image"> Spanish
                          </span>
                        </a>
                        <a class="dropdown-item" href="#">
                          <span class="flg-lfex">
                            <img src="{{asset('backend')}}/assets/img/flag/flg-india.png" alt="no image"> Hindi
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="day-night">
                    <a class="j-nav-lk" href="#">
                      <i class="nav-bell">
                        <img src="{{asset('backend')}}/assets/img/icon/d.png" alt="no image">
                      </i>
                    </a>
                  </div>
                  <div class="dropdown notification_dropdown">
                    <a class="j-nav-lk" href="#" role="button" data-toggle="dropdown">
                      <i class="nav-bell">
                        <img src="{{asset('backend')}}/assets/img/icon/bell.png" alt="no image">
                      </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <ul class="list-unstyled">
                        <li class="media dropdown-item">
                          <span class="success">
                            <i class="ti-user"></i>
                          </span>
                          <div class="media-body">
                            <a href="#">
                              <p>
                                <strong>Martin</strong> has added a
                                <strong>customer</strong> Successfully
                              </p>
                            </a>
                          </div>
                          <span class="notify-time">3:20 am</span>
                        </li>
                        <li class="media dropdown-item">
                          <span class="primary">
                            <i class="ti-shopping-cart"></i>
                          </span>
                          <div class="media-body">
                            <a href="#">
                              <p>
                                <strong>Jennifer</strong> purchased Light Dashboard 2.0.
                              </p>
                            </a>
                          </div>
                          <span class="notify-time">3:20 am</span>
                        </li>
                        <li class="media dropdown-item">
                          <span class="danger">
                            <i class="ti-bookmark"></i>
                          </span>
                          <div class="media-body">
                            <a href="#">
                              <p>
                                <strong>Robin</strong> marked a <strong>ticket</strong> as
                                unsolved.
                              </p>
                            </a>
                          </div>
                          <span class="notify-time">3:20 am</span>
                        </li>
                        <li class="media dropdown-item">
                          <span class="primary">
                            <i class="ti-heart"></i>
                          </span>
                          <div class="media-body">
                            <a href="#">
                              <p>
                                <strong>David</strong> purchased Light Dashboard 1.0.
                              </p>
                            </a>
                          </div>
                          <span class="notify-time">3:20 am</span>
                        </li>
                        <li class="media dropdown-item">
                          <span class="success">
                            <i class="ti-image"></i>
                          </span>
                          <div class="media-body">
                            <a href="#">
                              <p>
                                <strong> James.</strong> has added a
                                <strong>customer</strong> Successfully
                              </p>
                            </a>
                          </div>
                          <span class="notify-time">3:20 am</span>
                        </li>
                      </ul>
                      <a class="all-notification" href="#">See all notifications <i
                          class="ti-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                  <div class="dropdown header-profile">
                    <a class="nav-np" href="#" role="button" data-toggle="dropdown">
                      <img src="{{static_asset('backend')}}/assets/img/icon/usr.png" class="np" alt="no image">
                      <h6 class="heading-6 mb-0">Albert’s</h6>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="./app-profile.html" class="dropdown-item">
                        <i class="icon-user"></i>
                        <span class="ml-2">Profile </span>
                      </a>
                      <a href="./email-inbox.html" class="dropdown-item">
                        <i class="icon-envelope-open"></i>
                        <span class="ml-2">Inbox </span>
                      </a>
                      <a href="./page-login.html" class="dropdown-item">
                        <i class="icon-key"></i>
                        <span class="ml-2">Logout </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
