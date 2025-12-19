@extends('layouts.main')
@section('title','User')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Ganti Password</h2>
        </div>
        <div class="card-body">
            <form action="/password/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="password_lama">Old Password</label>
                    <input type="password" name="password_lama" id="password_lama" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="password_baru">New Password</label>
                    <input type="password" name="password_baru" id="password_baru" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="password_konfirmasi">Confirm Password</label>
                    <input type="password" name="password_konfirmasi" id="password_konfirmasi" class="form-control"required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection