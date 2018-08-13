@extends('layout.admin-master')

@section('content')

    <h2>Daftar Postingan</h2>

    <table class="table table-bordered text-center">

        <thead>
            <tr>
                <th class="text-center">Judul Postingan</th>
                <th class="text-center">Penulis</th>
                <th class="text-center">Waktu Posting</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Tags</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>

        @foreach($posts as $post)

        <tr>
            <td> {{ $post->post_title }} </td>
            <td> {{ $post->post_author }} </td>
            <td> {{ $post->post_date }} </td>
            <td> <img style="width: 200px" src="/img/{{ $post->post_image }}" alt=""> </td>
            <td> {{ $post->post_tags }} </td>
            <td>
                <a href="/admin/edit/{{$post->post_id}}">Edit</a> &emsp;
                <form action="/admin/{{$post->post_id}}" method="POST">
                    
                    <input name="submit" class="btn btn-link" type="submit" value="Hapus">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </td>
        </tr>

        @endforeach

    </table>

@endsection