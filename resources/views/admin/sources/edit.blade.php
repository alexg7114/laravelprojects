@extends('layouts.admin')
@section('title') Edit the source - @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Edit the source</h1>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form method="post" action="{{ route('sources.update', ['sources'=> $sources]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $sources->title }}">
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
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{!!  $sources->description !!}</textarea>
            @if($errors->has('description'))
                <div class="alert alert-danger">
                    @foreach($errors->get('description') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>


        <br>
        <button class="btn btn-success" type="submit">Edit the source</button>

        </form>



    </div>
    </div>

@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush


