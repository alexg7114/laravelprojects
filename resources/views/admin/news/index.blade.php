@extends('layouts.admin')
@section('title') News list - @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.create') }}" class="btn btn-sm btn-outline-secondary">Add the news item</a>

            </div>

        </div>
    </div>

    <div class ="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Category</th>
                <th>Source</th>
                <th>Title</th>
                <th>Status</th>
                <th>Date the news was added</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->source->title }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at->format('d-m-Y H:i') }}</td>
                    <td><a href="{{ route('news.edit', ['news' => $news]) }}">Edit</a>&nbsp;||&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $news->id }}">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td> colspan="4"<h3>No records</h3></td>
                </tr>
            @endforelse

            </tbody>

        </table>
        <div>{{ $newsList->links() }}</div>
    </div>

@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DomContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            console.log(el);
            el.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const rel = e.getAttribute("rel");
                if(confirm("Are you sure you want to delete with #ID " + rel + " ?")) {
                    submit("/admin/news/" + rel).then(() => {
                        location.reload();
                    })
                }
            });
        })
        });
        async function submit(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }

    </script>
    @endpush
