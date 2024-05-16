@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <h3>Blog Listing</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td><a href="{{ route('editBlog', $blog->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td><form method="POST" action="{{ route('deleteBlog', $blog->id) }}" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                    </td>
                                    
                                    <!-- Add more table cells for additional columns -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    <br>
                    <div class="pagination">
                        {{ $blogs->links() }}
                    </div>

                    <br>
                    <br>

                    <p><a href="/addblog">Add New Blog</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
