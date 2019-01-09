@extends('layout.admin-master')

@section('content')

    <h2>Profil</h2>

    <form action="/admin/profil/{{$admin->id}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="admin_name">Nama Admin</label>
            <input type="text" name="admin_name" placeholder="Nama Admin" class="form-control">
        </div>

        <div class="form-group">
                <label for="admin_passwordLama">Password Lama Admin</label>
                <input type="password" name="admin_passwordLama" placeholder="Password Admin" class="form-control">
        </div>

        <div class="form-group">
            <label for="admin_password">Password Baru Admin</label>
            <input type="password" name="admin_passwordBaru" placeholder="Password Admin" class="form-control">
        </div>

        <div class="form-group">
            <label for="passwordConfirm">Konfirmasi Password</label>
            <input type="password" name="passwordConfirm" placeholder="Konfirmasi Password" class="form-control">
        </div>

        <button style="margin-top: 20px; margin-bottom: 20px" type="submit" class="btn btn-success" name="submit">Update Profil</button>
        <input type="hidden" name="_method" value="put">
    </form>

@endsection