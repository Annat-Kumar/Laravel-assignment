<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    Public function index(){
        return view('admin/index');
    }
    
    Public function blogListing(){

        Paginator::useBootstrap();

        //$blogs = Blog::all(); // Retrieve all blog records from the database
        $blogs = Blog::paginate(5); // Paginate with 10 entries per page


        return view('admin/blogListing', ['blogs' => $blogs]);
    }

    Public function addBlog(){
        return view('admin/addBlog');
    }

    Public function addNewBlog(Request $request){
        //echo "<pre>"; print_r($request->all());exit;
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        // Additional fields can be assigned here (e.g., user_id)
        $blog->save();

        Session::flash('success', 'Blog post created successfully!');
        return redirect()->route('blog');

    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog post by ID
        return view('admin/editBlog', ['blog' => $blog]);
    }

    public function updateBlog(Request $request, $id)
    {
        //echo "<pre>"; print_r($request->all());exit;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog = Blog::findOrFail($id); // Find the blog post by ID
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->save();

        Session::flash('success', 'Blog post updated successfully!');

        return redirect()->route('blog');
    }



    public function destroy(Request $request, $id)
    {
        //echo "<pre>"; print_r($request->all());exit;
        $blog = Blog::findOrFail($id); // Find the blog post by ID

        // Delete the blog post
        $blog->delete();

        // Flash success message to session
        Session::flash('success', 'Blog post deleted successfully!');

        return redirect()->route('blog'); // Redirect back to blog index page
    }

}
