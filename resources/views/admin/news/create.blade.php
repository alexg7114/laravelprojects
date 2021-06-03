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
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
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
