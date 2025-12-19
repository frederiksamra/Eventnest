@extends('layouts.main')
@section('title','User')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tambah User</h2>
        </div>
        <div class="card-body">
            <form action="/users/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" accept="image/*" name="image" id="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection