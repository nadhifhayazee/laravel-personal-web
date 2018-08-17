<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Models\Post;
use App\Models\Category;
use App\Models\Admin;

class BlogController extends Controller
{
    public function index(){

        $posts = Post::all();
        $categories = Category::all();
        return view('blog/home', ['posts' => $posts, 'categories' => $categories]);

    }

    public function search(Request $request){

        $query = $request->get('search');
        $posts = Post::where('post_tags', 'LIKE', '%' . $query . '%')->orWhere(
                            'post_title', 'LIKE', '%' . $query . '%')->get();
        $categories = Category::all();
        return view('blog/search', ['posts' => $posts, 'query' => $query, 'categories' => $categories]);

    }

    public function login(){
        $admin = Admin::find(1);
        return view('/blog/login-admin', ['admin' => $admin]);
    }

    public function loginProses(Request $request){

   
        $admin = Admin::find(1);
        $user = $request->username;
        $pass = Hash::make($request->password);
        if(strcmp($admin->admin_name, $user) == 0 && strcmp($admin->admin_password, $pass) == 0){
            return redirect('admin');
        }else 
        return redirect('blog');
            // return ('<script>alert("Login Failed!");
            // windows.location.assign("blog/home");
            // </script>');
            // return redirect('blog/home');
        //  else
        //     return ('<script>alert("Login Success!")</script>');

        
    }

    public function showPost($id){
        $post = Post::where('post_title','=', $id)->get()->first();
        $categories = Category::all();
        return view('/blog/post' ,['post' => $post, 'categories' => $categories]);
    }

    public function showPostCat($id){
        $categories = Category::all();
        $cat = Category::find($id);
        $posts = Post::where('post_category_id','LIKE', '%'. $id . '%')->get();
        
        return view('/blog/category' ,['posts' => $posts, 'categories' => $categories, 'cat' => $cat]);
    }
   
}
