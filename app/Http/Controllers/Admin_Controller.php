<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_Controller extends Controller
{
    public function index()
    {
        return view('admin.homeAdmin');
    }
}
