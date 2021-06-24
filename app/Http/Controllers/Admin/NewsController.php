<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::select(['id','category_id', 'source_id','title', 'created_at', 'status'])->paginate(5);

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.create', [
            'categories' => $categories,
            'sources' => $sources,
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


        $fields= $request->validated();
        $fields['slug'] = \Str::slug($fields['title']);
        $fields['image'] = $uploadService->upload($request);


       $news = News::create($fields);
        if($news) {
            return redirect()->route('news.index');
        }

        return back()->withInput();


//        public function store(Request $request)
//    {
//        try {
//
//            $this->validate($request, ['title' => 'required']);
//            $fields = $request->only(['category_id', 'source_id', 'title', 'description', 'image']);
//            $fields['slug'] = \Str::slug($fields['title']);
//
//            $news = News::create($fields);
//            if ($news) {
//                return redirect()->route('news.index');
//            }
//
//            return back();
//        }catch(ValidationException $exception) {
//            dd($exception->validator->getMessageBag()->all());
//        }
//    }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news, FileUploadService $uploadService)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $fields= $request->only(['category_id', 'source_id','title', 'description', 'image', 'status']);
        $fields['slug'] = \Str::slug($fields['title']);
        $fields['image'] = $uploadService->upload($request);


//        if($request->hasFile('image')) {
//            $file = $request->file('image');
//            $originalExt = $file->getClientOriginalExtension();
//            $fileName = Str::random(10) . "." . $originalExt;
//            $fields['image'] = $file->storeAs('/news', $fileName, 'public');
//        }



       $news = $news->fill($fields)->save();
        if($news) {
            return redirect()->route('news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back();

//        $news->title = $request->input('title');
//        $news->description = $request->input('description');
//        $news->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $status = $news->delete();
        if($status) {
            return response()->json(['ok' => 'ok']);
        }
    }
}
