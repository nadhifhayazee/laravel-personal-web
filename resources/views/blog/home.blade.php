@extends('layout.master')

@section('content')

    <h1 class="page-header">
        <strong>Selamat Datang</strong>
        <small><em>Para Penuntut Ilmu</em></small>
     </h1>

    @foreach($posts as $post)

   
    <!-- First Blog Post -->

    <h2>
        <a href="#">{{ $post->post_title }}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{ $post->post_author }}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Diposting pada {{ $post->post_date }}</p>
    <hr>
    <img class="img-responsive" src="img/{{ $post->post_image }}" alt="">
    <hr>
    <p> {{ $post->post_content }} </p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
        
    @endforeach

@endsection

@section('categories')
    <ul class="list-unstyled">
    @foreach($categories as $category)

   
        
        <li><a href="#"> {{ $category->cat_title }} </a>
      


    @endforeach
</ul>

@endsection
