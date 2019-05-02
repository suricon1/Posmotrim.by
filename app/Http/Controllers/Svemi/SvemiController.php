<?php

namespace App\Http\Controllers\Svemi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SvemiController extends Controller
{
    public function index()
    {
        return view('svemi.index');
    }
}
