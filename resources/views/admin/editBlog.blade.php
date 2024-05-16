@extends('layouts.app') <!-- Assuming you have a main layout file -->

@section('content')
    <div class="container">
        <h1>Edit Blog Post</h1>

        <form method="POST" action="{{ route('updateBlog', $blog->id) }}">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required>{{ $blog->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <span class="can-spn" style="margin-left: 20px"><a href="/blog" class="btn btn-danger">Cancel</a></span>
        </form>
    </div>
@endsection
