<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Tambahkan ini

class PostController extends Controller
{
    use AuthorizesRequests; // Tambahkan ini

    public function index()
    {
        $posts = Post::where('author_id', auth()->id())->get();
        return view('myblog', ['title' => 'My Blog', 'posts' => $posts]);
    }
    public function lihat()
    {
        $posts = Post::where('author_id', auth()->id())->get();
        return view('profile', ['title' => 'profile']);
    }

    public function create()
    {
        $categories = Category::all();
        return view('addBlog', ['title' => 'Add Blog', 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required',
        ]);
        $validated['body'] = Purifier::clean($validated['body']);
        $post = new Post();
        $post->title = $validated['title'];
        $post->category_id = $validated['category_id'];
        $post->author_id = auth()->id(); 
        $post->slug = Str::slug($validated['title']);
        $post->body = $validated['body'];
        $post->save();

        return redirect()->route('myblog.index')->with('success', 'Blog post created successfully.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=> $slug]);
    }

    public function edit(Post $post)
    {
        // Authorize the request
        $this->authorize('update', $post);

        $categories = Category::all();
        return view('editBlog', [
            'title' => 'Edit Blog',
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Post $post)
    {
        // Authorize the request
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required',
        ]);
        $validated['body'] = Purifier::clean($validated['body']);

        $post->title = $validated['title'];
        $post->category_id = $validated['category_id'];
        $post->slug = Str::slug($validated['title']);
        $post->body = $validated['body'];
        $post->save();

        return redirect()->route('myblog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Authorize the request
        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('myblog.index')->with('success', 'Blog post deleted successfully.');
    }
    public function perbarui(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Mengambil pengguna yang sedang login
        $user = Auth::user();
    
        // Memperbarui data pengguna
        $user->name = $request->name;
        $user->bio = $request->bio;
    
        if ($request->hasFile('photo')) {
            // Menentukan nama file unik
            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            // Menyimpan file foto di folder public/img
            $request->photo->move(public_path('img'), $filename);
            // Menyimpan path ke database
            $user->photo = 'img/' . $filename;
        }
    
        $user->save();
    
        return redirect()->route('profile.lihat')->with('success', 'Profile updated successfully!');
    }
 
}
