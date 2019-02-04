<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        \SEOMeta::setTitle('Dashboard');
        return view('admin.dashboard.index');
    }
}
