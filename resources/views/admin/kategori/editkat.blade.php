<?php use App\Http\Controllers\AdminController;?>

@extends('layout.admin-master')

@section('content')

    <h2>Kategori</h2>

    <div class="row">
       

        <div class="col-sm-4">
        <form action="/admin/kategori/{{$category->cat_id}}" method="POST">
                <div class="form-group" id='addCat'>
                    {{ csrf_field() }}
                    <label for="addCategory">Edit Kategori</label>
                <input type="text" class="form-control" id="jdl-cat" name="cat_title" placeholder="Judul Kategori" value="{{$category->cat_title}}">
                    <button style="margin-top: 20px" type="submit" class="btn btn-primary" id="tmb-btn" name="submit">Edit</button>
                    <input type="hidden" name="_method" value="put">
                </div>
            </form>
        </div>

        <div class="col-sm-6 col-sm-offset-1">

                <table class="table table-bordered text-center">
        
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kategori</th>
                        </tr>
                    </thead>
                    @php($i = 1)
                    @foreach($categories as $category)
            
                    <tr>
                        <td> {{ $i }} </td>
                       
                        <td> {{ $category->cat_title }} </td>
                        <td><a href="/admin/kategori/editkat/{{$category->cat_id}}">Edit</a></td>
                        <td><a href="">Hapus</a></td>
                    </tr>
                        @php($i++)
                    @endforeach
            
                </table>
                </div>

    </div>

@endsection
