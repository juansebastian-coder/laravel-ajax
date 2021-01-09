<?php

namespace App\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function panel()
    {
        return view('administrator.panel');
    }

    public function access()
    {
        return view('administrator.access');
    }

    public function report()
    {
        return view('administrator.report');
    }
}
