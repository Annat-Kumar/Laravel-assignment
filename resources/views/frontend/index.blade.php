@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Blog </div>

                <div class="card-body">
                    <h3>Blog Listing</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <!-- Add more table cells for additional columns -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
