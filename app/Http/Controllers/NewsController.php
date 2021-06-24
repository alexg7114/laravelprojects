<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreate;
use App\Models\News;
use App\Services\FileUploadService;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(NewsCreate $request, FileUploadService $uploadService): \Illuminate\Http\RedirectResponse
    {


        $fields = $request->validated();
        $fields['slug'] = \Str::slug($fields['title']);
        $fields['image'] = $uploadService->upload($request);


        $news = News::create($fields);
        if ($news) {
            return redirect()->route('news.index');
        }

        return back()->withInput();

    }

}
