<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function form(){

        $Category = Category::all();
        
        return view('admin.add-blog', compact('Category'));

    }

    public function adminEntry(Request $request)
    {
        // Get user cookie
        $cookie = $request->cookie('user');
        // If cookie missing — redirect to login
        if (!$cookie) {
            return redirect('/login')->with('error', 'Please log in first.');
        }
        // Decode cookie data
        $data = json_decode($cookie, true);

        // If not admin — redirect
        if (!isset($data['role']) || $data['role'] !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }
        // Load all blogs
        $blogs = BlogModel::all();
        
        // Pass data to view
        return view('admin.admin', [
            'blogs' => $blogs,
            'userName' => $data['name'] ?? 'Admin'
        ]);
    }
    public function dashboard(Request $request)
    {
        // Get user cookie
        $cookie = $request->cookie('user');

        // If cookie missing — redirect to login
        if (!$cookie) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        // Decode cookie data
        $data = json_decode($cookie, true);

        // If not admin — redirect
        if (!isset($data['role']) || $data['role'] !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }

        // Load all blogs
        $blogs = BlogModel::all();

        // Pass data to view
        return view('admin.admin-dashboard', [
            'blogs' => $blogs,
            'userName' => $data['name'] ?? 'Admin'
        ]);
    }

    public function index()
    {
        // Protect admin page
        if(session('user_role') !== 'admin') {
            return redirect('/home')->with('error', 'Access denied.');
        }
        // Get all blogs
        $blogs = BlogModel::all();  // returns a Collection of Blog models

        // Or you may want pagination: Blog::paginate(10);
        return view('admin.admin-dashboard', compact('blogs'));
    }

    public function showBlogs()
    {
        $blogs = BlogModel::orderBy('created_at', 'desc')->get(); // fetch all blogs
        return view('blog', compact('blogs')); // pass to public blog view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1️⃣ Validate only the fields
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required'
            // 'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // 2️⃣ Store the file and get the path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('record', 'public'); // storage/app/public/record
            $validatedData['image'] = $path; // add path to data
        }

        // 3️⃣ Create the blog
        BlogModel::create($validatedData);

         return redirect()->route('admin.admin-dashboard') // 👈 named route
                     ->with('success', 'Blog created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the blog by ID
        $blog = BlogModel::find($id);

        // If blog not found, redirect or show 404
        if (!$blog) {
            return redirect()->route('home')->with('error', 'Blog not found.');
            // Or use abort(404);
            // abort(404, 'Blog not found');
        }

        // Return the view and pass the blog data
        return view('view-blog', compact('blog'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the blog
        $blog = BlogModel::findOrFail($id);

        // Fetch all categories
        $Category = Category::all();

        // Pass both to the view
        return view('admin.edit-blog', compact('blog', 'Category'));
    }


    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, String $id)
{
    $request->validate([
        'title'   => 'required|string|max:255',
        'category' => 'required|string|max:225',
        'content' => 'required|string',
        'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
    ]);

    $blog = BlogModel::findOrFail($id);
    $blog->title = $request->input('title');
    $blog->category = $request->input('category');
    $blog->content = $request->input('content');

    // ✅ Replace existing image with same path
    if ($request->hasFile('image')) {
        $file = $request->file('image');

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            // 🔁 Overwrite old file using same filename/path
            Storage::disk('public')->put($blog->image, file_get_contents($file));
        } else {
            // 📂 No old image? create a new file with blog_<id>.ext
            $filename = 'record/blog_' . $blog->id . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, file_get_contents($file));
            $blog->image = $filename;
        }
    }

    $blog->save();

    return redirect()->route('admin.blogs.edit', $blog->id)
                     ->with('success', 'Blog updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = BlogModel::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted!');
    }

    /** 
        * search blog
    */
   public function searchBlog(Request $request)
    {
        $search = $request->input('query', '');

        if(trim($search) === '') {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }
 
        else {
            $blogs = BlogModel::where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->get();
        }

        return view('search-results', compact('blogs', 'search'));
    }
}
