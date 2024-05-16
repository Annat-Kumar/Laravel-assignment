@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <h3>Add New Blog</h3>
                    <!-- resources/views/blogs/create.blade.php -->

                    <form method="POST" action="{{ route('addnewblog') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                                @error('title')
                                    <span class="invalid-title" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                            @error('content')
                                    <span class="invalid-content" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <span class="can-spn" style="margin-left: 20px"><a href="/blog" class="btn btn-danger">Cancel</a></span>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
