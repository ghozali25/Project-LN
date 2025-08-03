<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPbiController extends Controller
{
    public function index()
    {
        return view('dashboard-pbi.index');
    }
}
