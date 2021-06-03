@extends('layouts.admin')
@section('title') Add the order - @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Add the order</h1>
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
                    <label for="customername">Customername</label>
                    <input type="text" class="form-control" name="customername" id="customername" value="{{ old('customername') }}">
                </div>

                <div class="form-group">
                    <label for="telephonenumber">Telephone number</label>
                    <input type="text" class="form-control" name="telephonenumber" id="telephonenumber" value="{{ old('telephonenumber') }}">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email value="{{ old('email') }}">
                </div>


                <div class="form-group">
                    <label for="information">Information</label>
                    <textarea class="form-control" name="information" id="information" value="{{ old('information') }}"></textarea>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Add the information</button>

            </form>

        </div>

    </div>
    </div>

@endsection

