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

    const LOGO_210x44       = [210, 44];
    const HEADER_LOGO_IMG   = [90, 30];
}
