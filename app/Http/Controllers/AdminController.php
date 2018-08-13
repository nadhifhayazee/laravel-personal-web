<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Category;
use App\Models\Admin;

class AdminController extends Controller
{
    public function home(){

        $posts = Post::all();
        $admin = Admin::first();
        $categories = Category::all();
        return view('admin/index', ['posts' => $posts, 'admin' => $admin, 'categories' => $categories]);

    }
    public function create(){

        $posts = Post::all();
        $admin = Admin::first();
        $categories = Category::all();
        return view('admin/create-post', ['posts' => $posts, 'admin' => $admin, 'categories' => $categories]);

    }
    public function upload(Request $request){

        

        $image = $request->file('post_image');
        $imagename = $request->file('post_image')->getClientOriginalName();
        $path = $image->move(public_path('/img'), $imagename);

        $post = new Post;

        $post->post_category_id = $request->post_category_id;
        $post->post_title = $request->post_title;
        $post->post_author = $request->post_author;
        $post->post_date = $request->post_date;
        $post->post_image = $imagename;
        $post->post_content = $request->post_content;
        $post->post_tags = $request->post_tags;
        $post->save();

        return redirect('admin')->with('alert-success','Postingan anda berhasil dibuat!');

    }

    public function edit($id) {
        $post = Post::find($id);
        $admin = Admin::first();
        return view('/admin/edit', ['post' => $post, 'admin' => $admin]);

    }

    public function destroy($id){

        Post::find($id)->delete();

        return redirect('admin');

    }
}
