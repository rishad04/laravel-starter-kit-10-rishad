@extends('backend.partials.master')
@section('title') {{ __('menus.dashboard') }} @endsection

@section('maincontent')

<!-- row -->
<div class="container-fluid">
    <div class="j-container">
        <div class="j-data-recv mb-20 grid-4">
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/box-primary.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Parcel</h6>
                            <span>9545612</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span>
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-up-green.png" alt="no image">
                        </i>
                        12%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-primary.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/user-green.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total User</h6>
                            <span>65246</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span>
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-up-green.png" alt="no image">
                        </i>
                        08%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-green.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/user-red.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Merchant</h6>
                            <span>35217</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span class="j-clr-red">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-down-red.png" alt="no image">
                        </i>
                        0.3%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-red.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/user-primary-2.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Delivery Man</h6>
                            <span>825412</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span>
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-up-green.png" alt="no image">
                        </i>
                        12%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-primary-2.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/home-red.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Branch</h6>
                            <span>2513</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span>
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-up-green.png" alt="no image">
                        </i>
                        12%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-red.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/dollar-primary-2.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Accounts</h6>
                            <span>52148</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span>
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-up-green.png" alt="no image">
                        </i>
                        12%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-primary-2.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/cart-green.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Partial Delivered</h6>
                            <span>7523</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span>
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-up-green.png" alt="no image">
                        </i>
                        07%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-green.png" alt="no image">
                    </p>
                </div>
            </div>
            <div class="j-data-box">
                <div class="j-box-left">
                    <div class="j-box-icon">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/box-ylw.png" alt="no image">
                        </i>
                        <div class="j-box-txt">
                            <h6 class="heading-6">Total Parcel Delivered</h6>
                            <span>934789</span>
                        </div>
                    </div>
                </div>
                <div class="j-box-right">
                    <span class="j-clr-red">
                        <i>
                            <img src="{{asset('backend')}}/assets/img/icon/arrow-down-red.png" alt="no image">
                        </i>
                        0.4%
                    </span>
                    <p class="mb-0">
                        <img src="{{asset('backend')}}/assets/img/shape/wave-ylw.png" alt="no image">
                    </p>
                </div>
            </div>
        </div>
        <div class="j-data-chart">
            <div class="j-chart-parent mb-20">
                <div class="j-chart-box">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Income/ Expense</h4>
                            <div class="basic-dropdown">
                                <div class="dropdown custom-dropdown">
                                    <button type="button" class="btn-ami" data-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            Yearly 2023
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">
                                            <span class="flg-lfex">
                                                Arabic
                                            </span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="flg-lfex">
                                                Bangla
                                            </span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="flg-lfex">
                                                English
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-with-area" class="ct-chart ct-golden-section"></div>
                            <ul class="j-card-list j-card-list-dir">
                                <li>
                                    <span></span>
                                    Income
                                </li>
                                <li>
                                    <span class="clr-red"></span>
                                    Expense
                                </li>
                                <li>
                                    <span class="clr-green"></span>
                                    Balance
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="j-chart-box">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Courier Revenue</h4>
                            <div class="basic-dropdown">
                                <div class="dropdown custom-dropdown">
                                    <button type="button" class="btn-ami" data-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            Yearly 2023
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">
                                            <span class="flg-lfex">
                                                Arabic
                                            </span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="flg-lfex">
                                                Bangla
                                            </span>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="flg-lfex">
                                                English
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="morris_bar" class="morris_chart_height"></div>
                            <ul class="j-card-list j-card-list-dir">
                                <li>
                                    <span></span>
                                    Income
                                </li>
                                <li>
                                    <span class="clr-red"></span>
                                    Expense
                                </li>
                                <li>
                                    <span class="clr-green"></span>
                                    Balance
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="j-chart-parent-2 grid-3">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title">Delivery Man Statements</h4>
                        <div class="basic-dropdown">
                            <div class="dropdown custom-dropdown">
                                <button type="button" class="btn-ami" data-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        Weekly
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            Arabic
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            Bangla
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            English
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body j-card-flex">
                        <div class="j-card-left">
                            <ul class="j-card-list">
                                <li>
                                    <span></span>
                                    Income
                                </li>
                                <li>
                                    <span class="clr-red"></span>
                                    Expense
                                </li>
                                <li>
                                    <span class="clr-green"></span>
                                    Balance
                                </li>
                            </ul>
                        </div>
                        <div id="morris_donught" class="morris_chart_height j-crcl"></div>
                    </div>
                </div>
                <div class="card  mb-0">
                    <div class="card-header">
                        <h4 class="card-title">Merchant Statements</h4>
                        <div class="basic-dropdown">
                            <div class="dropdown custom-dropdown">
                                <button type="button" class="btn-ami" data-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        Weekly
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            Arabic
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            Bangla
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            English
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="simple-line-chart" class="ct-chart ct-golden-section"></div>
                        <ul class="j-card-list j-card-list-dir">
                            <li>
                                <span></span>
                                Income
                            </li>
                            <li>
                                <span class="clr-red"></span>
                                Expense
                            </li>
                            <li>
                                <span class="clr-green"></span>
                                Balance
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title">Branch Statements</h4>
                        <div class="basic-dropdown">
                            <div class="dropdown custom-dropdown">
                                <button type="button" class="btn-ami" data-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        Weekly
                                        <i class="fa fa-angle-down"></i>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            Arabic
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            Bangla
                                        </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="flg-lfex">
                                            English
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body j-card-flex">
                        <div class="j-card-left">
                            <ul class="j-card-list">
                                <li>
                                    <span></span>
                                    Income
                                </li>
                                <li>
                                    <span class="clr-red"></span>
                                    Expense
                                </li>
                                <li>
                                    <span class="clr-green"></span>
                                    Balance
                                </li>
                            </ul>
                        </div>
                        <div id="morris_donught_2" class="morris_chart_height j-crcl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
