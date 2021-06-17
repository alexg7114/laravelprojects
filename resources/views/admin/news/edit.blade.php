@extends('layouts.admin')
@section('title') Edit the news item - @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Edit the news item</h1>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form method="post" action="{{ route('news.update', ['news'=> $news]) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('category_id') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>

                <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
                    @csrf

                    <div class="form-group">
                        <label for="source_id">Source</label>
                        <select class="form-control" name="source_id" id="source_id">
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}"
                                @if($source->id === $news->source_id) selected @endif>{{ $source->title }}</option>

                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $news->title }}">
                        @error('title') Любая ошибка @enderror
                        @if($errors->has('title'))
                            <div class="alert alert-danger">
                                @foreach($errors->get('title') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>


        </div>
        <div class="form-group">
            <label for="image">Logotype</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{!!  $news->description !!}</textarea>
            @if($errors->has('description'))
                <div class="alert alert-danger">
                    @foreach($errors->get('description') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option>draft</option>
                <option>published</option>
                <option>blocked</option>
            </select>
        </div>

        <br>
        <button class="btn btn-success" type="submit">Edit the news item</button>

        </form>



    </div>
    </div>

@endsection

