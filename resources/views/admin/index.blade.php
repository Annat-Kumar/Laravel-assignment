@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <h3>Welcome to admin dashboard</h3>
                    <p>You can create new Blog, edit and delete from this section.</p>
                    <p><a href="/blog">Blog Listing</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
