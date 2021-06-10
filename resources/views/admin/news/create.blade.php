@extends('layouts.admin')
@section('title') Add the news item - @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Add the news item</h1>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

            <form method="post" action="{{ route('news.store') }}">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <form method="post" action="{{ route('news.store') }}">
                    @csrf

                <div class="form-group">
                    <label for="source_id">Source</label>
                    <select class="form-control" name="source_id" id="source_id">
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}">{{ $source->title }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                </div>



                </div>
                <div class="form-group">
                    <label for="image">Logotype</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" value="{{ old('description') }}"></textarea>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Add news item</button>

            </form>

            </div>

        </div>
    </div>

@endsection
