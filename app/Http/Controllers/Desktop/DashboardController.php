<?php

namespace App\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }


    public function modelWeb()
    {
        return view('modelweb');
    }


    public function mensaje()
    {
        return 'prueba de nuestro middleware';
    }
    
}
