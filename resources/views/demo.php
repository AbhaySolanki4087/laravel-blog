
 public function searchBlog(Request $request)
    {
        // dd($request->all()); // dumps request data
        $search = $request->input('query');
        //check input is not empty rather it show all data
        if (empty(trim($search))) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }
        // Search in 'title' or 'content' columns
        $blogs = BlogModel::where('title', 'LIKE', "%{$search}%")->get();

        // Return the search results view
        return view('search-results', compact('blogs', 'search'));
    }

    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|exists:categories,name',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,mp3,mp4|max:51200', // up to 50MB
        ]);

        // Handle file upload
        $path = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/attachments', $filename); // storage/app/public/attachments/...
            // storeAs returns path like "public/attachments/..."
            // Save only relative path for retrieval (strip 'public/')
            $path = str_replace('public/', '', $path);
        }

        $blog = BlogModel::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'attachment' => $path,
        ]);

        // Increment category counter
        Category::where('name', $validated['category'])->increment('number_of_blogs');

        return redirect()->route('blogs.all')->with('success', 'Blog created.');
    }

    public function destroy($id)
    {
        $blog = BlogModel::findOrFail($id);

        // decrement category count
        if ($blog->category) {
            Category::where('name', $blog->category)
                ->where('number_of_blogs', '>', 0)
                ->decrement('number_of_blogs');
        }

        // delete attachment file if present
        if ($blog->attachment) {
            Storage::disk('public')->delete($blog->attachment); // blog->attachment is path without 'public/'
        }

        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted.');
    }
}
