<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Pagination\Paginator;

class FrontendController extends Controller
{
    

    Public function index(){

        Paginator::useBootstrap();
        //$blogs = Blog::all(); // Retrieve all blog records from the database
        $blogs = Blog::paginate(5);

        return view('frontend/index', ['blogs' => $blogs]);
    }
}
