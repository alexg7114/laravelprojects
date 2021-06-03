
@extends('layouts.admin')
@section('title') Add the feedback - @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Add the feedback</h1>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

{{--            <form method="post" action="{{ route('news.store') }}">--}}
                <form method="post" action="">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                </div>

                <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <textarea class="form-control" name="feedback" id="feedback" value="{{ old('feedback') }}"></textarea>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Add the feedback</button>

            </form>

        </div>

    </div>
    </div>

@endsection

