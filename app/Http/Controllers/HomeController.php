<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = BlogModel::latest()->take(5)->get(); // take 5 latest blog
        return view('home', compact('blogs')); // pass to public blog view
    }

}
