<?php

namespace App\Http\Controllers\Admin\Site;

class DashboardController extends AppController
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
