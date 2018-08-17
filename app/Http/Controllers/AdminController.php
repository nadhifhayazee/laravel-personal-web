<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Category;
use App\Models\Admin;

class AdminController extends Controller
{
    public static function showCat($post){
            
        $cat = Category::find($post->post_category_id);
        
        return $cat->cat_title;

    }



    public function home(){

        $posts = Post::all();
        $admin = Admin::first();
        $categories = Category::all();
        return view('admin/index', ['posts' => $posts, 'admin' => $admin, 'categories' => $categories]);

    }
    public function create(){

        $post = Post::first();
        $admin = Admin::first();
        $categories = Category::all();
        return view('admin/create-post', ['post' => $post, 'admin' => $admin, 'categories' => $categories]);

    }
    public function upload(Request $request){

        

        $image = $request->file('post_image');
        $imagename = $image->getClientOriginalName();
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
        $categories = Category::all();
        return view('/admin/edit', ['post' => $post, 'admin' => $admin, 'categories' => $categories]);

    }

    public function update(Request $request, $id){
        $image = $request->file('post_image');
        $imagename = $image->getClientOriginalName();
        $path = $image->move(public_path('/img'), $imagename);
        Post::find($id)->update([
            'post_category_id' => $request->post_category_id,
            'post_title' => $request->post_title,
            'post_author' => $request->post_author,
            'post_date' => $request->post_date,
            'post_image' => $imagename,
            'post_content' => $request->post_content,
            'post_tags' => $request->post_tags,
        ]);

        return redirect('admin');
    }

    public function kategori(){

        $posts = Post::all();
        $admin = Admin::first();
        $categories = Category::all();
        return view('admin/kategori/index', ['posts' => $posts, 'admin' => $admin, 'categories' => $categories]);

    }

    public function addKategori(Request $request){
        $cat = [
            'cat_title' => $request->cat_title
        ];

        Category::create($cat);
        return redirect('/admin/kategori');
    }

    public function editCat($id){
        $category = Category::find($id);
        $categories = Category::all();
        $posts = Post::all();
        $admin = Admin::first();
        return view('/admin/kategori/editkat', ['category' => $category, 'categories' => $categories, 'posts' => $posts, 'admin' => $admin]);
    }

    public function updateCat(Request $request, $id){

        Category::find($id)->update([
            'cat_title' => $request->cat_title
        ]);
        return redirect('/admin/kategori');
    }

    public function destroyCat($id){

   
        Category::find($id)->delete();

        return redirect('/admin/kategori');

    }

    public function profil(){

        $posts = Post::all();
        $admin = Admin::first();
        $categories = Category::all();
        return view('admin/profil/index', ['posts' => $posts, 'admin' => $admin, 'categories' => $categories]);

    }

    public function profilUpdate(Request $request, $id){

        $this->validate($request, [
            'admin_name' => 'required',
            'admin_passwordLama' => 'required',
            'admin_passwordBaru' => 'required',
            'passwordConfirm' => 'required|same:admin_passwordBaru',
        ]);

        $admin = Admin::find(1);
        $old_pass = Hash::make($request->admin_passwordLama);
        $new_pass = $request->admin_passwordBaru;
        $conf_pass = $request->passwordConfirm;
        if(strcmp($admin->admin_password, $old_pass)==0 && strcmp($new_pass, $conf_pass)==0){
            
                $admin->update([
                    'admin_name' => $request->admin_name,
                    'admin_password' => Hash::make($request->admin_passwordBaru)
                ]);  
            } else
                return "<script>alert('Upadate gagal')</script>";
        
            return redirect('admin');

    }
  


    public function destroy($id){

   
        Post::find($id)->delete();

        return redirect('admin');

    }
}
