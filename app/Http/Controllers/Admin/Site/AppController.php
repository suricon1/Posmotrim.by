<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Controllers\Controller;
use View;

class AppController extends Controller
{
    public function __construct()
    {
        View::share ('site_open', ' menu-open');
        View::share ('site_active', ' active');
    }
}