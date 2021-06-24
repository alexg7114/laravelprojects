@extends('layouts.admin')
@section('title') Add the source - @parent @stop
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

            <form method="post" action="{{ route('sources.store', ['name' => 'test']) }}" enctype="multipart/form-data">
                @csrf



                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @error('title') Любая ошибка @enderror
                    @if($errors->has('title'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('title') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>



                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                    @if($errors->has('description'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('description') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <br>
                <button class="btn btn-success" type="submit">Add the news source</button>

            </form>

        </div>
    </div>


@endsection

