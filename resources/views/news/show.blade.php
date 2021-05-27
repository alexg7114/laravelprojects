@extends('layouts.main')
@section('title') News {{ $id }} -@parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">News - {{ $id }}</h1>
                <p class="lead text-muted">Our site news</p>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container" id ="content-test">

        Get new with id = {{ $id }}

    </div>
    </div>
    @endsection

{{--@push('js')--}}
{{--    <script>--}}
{{--        alert ("Hello");--}}
{{--        document.addEventListener("DOMContentLoaded", function() {--}}
{{--                const container = document.getElementById("#content-test");--}}
{{--                container.innerText = "It is Java Script";--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
