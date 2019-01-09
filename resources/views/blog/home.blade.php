<?php use App\Http\Controllers\AdminController;?>
@extends('layout.master')

@section('content')

    <h1 class="page-header">
        <strong>Selamat Membaca</strong>
        <small><em>Para Penuntut Ilmu</em></small>
     </h1>

    @foreach($posts as $post)

   
    <!-- First Blog Post -->

    <h2>
        <a style="color: black;" href="/blog/post/{{$post->post_title}}">{{ $post->post_title }}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{ $post->post_author }}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Diposting pada {{ $post->post_date }}</p>
    <hr>
    <img class="img-responsive" src="img/{{ $post->post_image }}" alt="">
    <hr>
    <p style="font-size: 17px"> {{ substr($post->post_content,0,150) }}... </p>
    <a class="btn btn-primary" href="/blog/post/{{$post->post_title}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
        
    @endforeach

@endsection

