<?php use App\Http\Controllers\AdminController;?>

@extends('layout.admin-master')

@section('content')

    <h2>Kategori</h2>

    <div class="row">
       

        <div class="col-sm-4">
            <form action="/admin/kategori" method="POST">
                <div class="form-group" id='addCat'>
                    {{ csrf_field() }}
                    <label for="addCategory">Tambah Kategori</label>
                    <input type="text" class="form-control" id="jdl-cat" name="cat_title" placeholder="Judul Kategori">
                    <button style="margin-top: 20px" type="submit" class="btn btn-primary" id="tmb-btn" name="submit">Tambah</button>
                    <button style="display: none; margin-top: 20px" type="submit" class="btn btn-danger" id="hps-btn" name="submit">Hapus</button>
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
            
                    <tr onclick="editCat(this)" id="judul">
                        <td> {{ $i }} </td>
                       
                        <td> {{ $category->cat_title }} </td>
                        <td><a href="/admin/kategori/editkat/{{$category->cat_id}}">Edit</a></td>
                        <td>
                             <form action="/admin/kategori/{{$category->cat_id}}" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-link">Hapus</button>
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                        @php($i++)
                    @endforeach
            
                </table>
                </div>

    </div>

@endsection
