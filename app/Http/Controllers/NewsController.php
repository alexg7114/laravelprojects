<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
//        dump($this->newsList);
//        dd($this->newsList);
//        dd(\request());
//        dd(app());
        return view('news.index', [
           'newsList' => $this->newsList
        ]);
    }

    public function show(int $id)
    {
        return view('news.show', [
            'id' => $id
        ]);
    }
}
