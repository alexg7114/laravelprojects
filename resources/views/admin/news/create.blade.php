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

            <form method="post" action="{{ route('news.store', ['name' => 'test']) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                                @if(old('category_id') == $category->id) selected @endif>{{ $category->title }}
                            </option>
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


                <div class="form-group">
                    <label for="source_id">Source</label>
                    <select class="form-control" name="source_id" id="source_id">
                        @foreach($sources as $source)

                            <option value="{{ $source->id }}"
                                @if(old('source_id') == $source->id) selected @endif>{{ $source->title }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('source_id'))
                        <div class="alert alert-danger">
                            @foreach($errors->get('source_id') as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>


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
                    <label for="image">Logotype</label>
                    <input type="file" class="form-control" name="image" id="image">
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
                <button class="btn btn-success" type="submit">Add news item</button>

            </form>

        </div>
    </div>


@endsection
