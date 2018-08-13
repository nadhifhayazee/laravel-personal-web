 @extends('layout.admin-master') @section('content')

<h2>Buat Postingan</h2>

<form action="/admin" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="post_category_id" class="col-sm-2 control-label">Kategori Id</label>
        <div class="col-sm-10">
            <input type="text" name="post_category_id" class="form-control" placeholder="Kategori_id" value="{{ $post->post_category_id }}">
        </div>

    </div>
    <div class="form-group">
        <label for="post_title" class="col-sm-2 control-label">Judul Post</label>
        <div class="col-sm-10">
            <input type="text" name="post_title" class="form-control" placeholder="Judul Post" value="{{ $post->post_title }}">
        </div>

    </div>
    <div class="form-group">
        <label for="post_author" class="col-sm-2 control-label">Penulis</label>
        <div class="col-sm-10">
            <input type="text" name="post_author" class="form-control" placeholder="Penulis" value="{{ $post->post_author }}">
        </div>

    </div>
    <div class="form-group">
        <label for="post_date" class="col-sm-2 control-label">Tanggal Posting</label>
        <div class="col-sm-10">
            <input type="date" name="post_date" class="form-control" placeholder="Tanggal Post" value="{{ $post->post_date }}">
        </div>

    </div>
    <div class="form-group">
        <label for="post_image" class="col-sm-2 control-label">Gambar Postingan</label>
        <div class="col-sm-10">
            <input type="file" name="post_image" class="form-control" value="{{ $post->post_image }}">
        </div>

    </div>
    <div class="form-group">
        <label for="post_content" class="col-sm-2 control-label">Konten</label>
        <div class="col-sm-10">
            <textarea name="post_content" rows="20" class="form-control" placeholder="Konten Post">{{ $post->post_content }}"</textarea>
        </div>

    </div>
    <div class="form-group">
        <label for="post_tags" class="col-sm-2 control-label">Tags</label>
        <div class="col-sm-10">
            <input type="text" name="post_tags" class="form-control" placeholder="Tags" value="{{ $post->post_tags }}">
        </div>

    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
                <button style="margin-top: 20px" type="submit" name="submit" class="btn btn-success">UPDATE</button>
        </div>
        
       
    </div>


</form>

@endsection