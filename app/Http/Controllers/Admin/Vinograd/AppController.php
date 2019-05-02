<?php

namespace App\Http\Controllers\Admin\Vinograd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;

class AppController extends Controller
{
    public function __construct()
    {
        View::share ('vinograd_open', ' menu-open');
        View::share ('vinograd_active', ' active');
    }
}