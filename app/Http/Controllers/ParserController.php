<?php

namespace App\Http\Controllers;

use App\Services\ParserService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(ParserService $service)
    {
        dd($service->getNews('https://news.yandex.ru/music.rss'));
    }
}
