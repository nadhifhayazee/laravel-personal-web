@extends('layout.master')


@section('content')

    @if(!count($posts))

    <h1 class="page-header">
       <strong> Maaf..Data Tidak ditemukan! : </strong>
     </h1>


    
    @else
     
    <h1 class="page-header">
        <strong>Hasil Kategori {{$cat->cat_title}} : </strong>
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
    <img class="img-responsive" src="{{ URL::to('/') }}/img/{{ $post->post_image }}" alt="">
    <hr>
    <p> {{ $post->post_content }} </p>
    <a class="btn btn-primary" href="/blog/post/{{$post->post_title}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
    

    @endforeach


    @endif

@endsection
