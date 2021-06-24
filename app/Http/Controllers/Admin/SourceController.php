<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::all();


        return view('admin.sources.index',[
            'sources' => $sources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fields= $request->validated();
        $fields['slug'] = \Str::slug($fields['title']);


        $news = Source::create($fields);
        if($news) {
            return redirect()->route('sources.index');
        }

        return back()->withInput();


        $request->validate([
            'title' => ['required']
        ]);

        $fields= $request->only(['title', 'description']);
        dump($fields);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $categories = Category::all();
            $sources = Source::all();
            return view('admin.sources.edit', [
                'categories' => $categories,
                'sources' => $sources

            ]);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        $fields= $request->only(['title', 'description']);
        $fields['slug'] = \Str::slug($fields['title']);


        $source = $sources->fill($fields)->save();
        if($source) {
            return redirect()->route('sources.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $source->delete();
        if($status) {
            return response()->json(['ok' => 'ok']);
        }
    }
}
