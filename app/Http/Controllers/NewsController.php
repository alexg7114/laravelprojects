<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
//        $model = new News();

        return view('news.index', [
            'newsList' => News::all()
//           'newsList' => $model->newsList()
        ]);
    }

    public function show(News $news)
    {
//        $news = News::findOrFail($id);
//        $model = new News();
//        $news = $model->news($id);

        return view('news.show', [
            'news' => $news
        ]);
    }
}
