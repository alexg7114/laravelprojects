<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return "Добро пожаловать : " . \Auth::user()->name . "<br>
            <a href='". route('news.index') ."'>В админку</a><br>
            <a href='". route('account.logout')."'>Выход</a>";
    }
}
