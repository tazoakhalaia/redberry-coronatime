<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SessionController extends Controller
{
    public function index() : View {
        return view('login');
    }
}
