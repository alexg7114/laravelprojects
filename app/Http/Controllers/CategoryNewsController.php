<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    public function index()
    {
        return view('/categoryNews/categoryNews');

    }
}
