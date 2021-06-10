
@extends('layouts.admin')
@section('title') Categories list - @parent @stop
@section('content')
    <h1 class="h2">Categories list</h1>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
{{--        <h1 class="h2">Categories list</h1>--}}
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-secondary">Add the category</a>
            </div>

            </div>

            </div>
                <div class ="table-responsive">

                <table class="table table-bordered">
                    <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td><a href="">Edit</a>&nbsp;||&nbsp;<a href="">Delete</a> </td>
                        </tr>
                    @empty
                        <tr>
                            <td> colspan="4"<h3>No records</h3></td>
                        </tr>
                    @endforelse

                    </tbody>

                </table>
            </div>


@endsection
