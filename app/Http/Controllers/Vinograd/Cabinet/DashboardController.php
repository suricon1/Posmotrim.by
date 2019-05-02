<?php

namespace App\Http\Controllers\Vinograd\Cabinet;

use App\Repositories\MenuRepository;
use App\Http\Controllers\Controller;
use View;

class DashboardController extends Controller
{
    public function __construct (MenuRepository $menu)
    {
        View::share ('headerMenu', $menu->getMenu());
        View::share ('domain', 'cabinet');
    }

    public function index()
    {
        return view('cabinet.index');
    }
}
