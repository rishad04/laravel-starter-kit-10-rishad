<?php

namespace App\Enums;

interface ImageSize
{

    // General Image size
    const IMAGE_16x16       = [16, 16]; // favicon
    const IMAGE_32x32       = [32, 32]; // favicon

    const IMAGE_80x80       = [80, 80];
    const IMAGE_100x100     = [100, 100];
    const IMAGE_128x128     = [128, 128];
    const IMAGE_370x240     = [370, 240];
    const IMAGE_770x460     = [770, 460];
    const IMAGE_1200x600    = [1280, 600];

    const LOGO_210x44     = [210, 44];

    const HEADER_LOGO_IMG    = [90, 30];
    const HEADER_TOPBAR_LOGO = [12, 12];

    const BLOG_IMAGE_ONE   = [80, 80]; //
    const BLOG_IMAGE_TWO   = [370, 240]; //
    const BLOG_IMAGE_THREE = [770, 460]; //
    const BLOG_IMAGE_FOUR  = [311, 198]; //

    // merchant user img
    const MERCHANT_IMAGE_ONE = [80, 80]; //
    const MERCHANT_IMAGE_TWO = [100, 100]; //

    const TESTIMONIAL_CLIENT_IMAGE = [1280, 600];

    // Client : MODULE
    const CLIENT_LOGO       = [100, 100];
    const CLIENT_IMAGE_TWO  = [150, 80];
    // section image
    const BREADCRUMB_IMAGE    = [1920, 400];
    const HERO_SECTION_IMAGE  = [811, 640];
    const ABOUT_US_IMAGE      = [620, 510];

    // Our Archievement Section    
    const COUNTER_IMAGE_SMALL      = [250, 240];
    const COUNTER_IMAGE_BIG        = [382, 369];
    //Icons
    const COUNTER_SMALL_ICON       = [30, 30];
    const COUNTER_ICON             = [35, 35];
    const COUNTER_ICON_2           = [32, 32];
    const COUNTER_ICON_3           = [33, 33];



    const DELIVERY_CALCULATION_BG_IMAGE     = [612, 457];
    const FAQ_IMAGE                         = [652, 504];
    const COVERAGE_AREA_BG_IMAGE            = [766, 427];
    const SIGNIN_IMAGE                      = [643, 499];
    const SIGNUP_IMAGE                      = [643, 599];
}
