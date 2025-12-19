@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

{{-- 2. Welcome Banner --}}
<div class="jumbotron bg-white shadow-sm border-bottom">
    <h1 class="display-4">Halo, {{ Auth::user()->name ?? 'Admin' }}!</h1>
    <p class="lead">Selamat datang di Sistem Manajemen Event.</p>
    <hr class="my-4">
    <p>Gunakan menu di bawah ini untuk akses cepat ke fitur utama website Anda.</p>
</div>

{{-- 3. Menu Akses Cepat (Button ke Search & Chart) --}}
<div class="row">
    
    <div class="col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Halaman Pengunjung</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Cari & Lihat Event</div>
                        <p class="text-muted mt-2 small">
                            Halaman ini digunakan oleh pengunjung untuk mencari data event (Sesuai Ketentuan Poin 2a).
                        </p>
                        <a href="/" class="btn btn-primary">
                            <i class="bi bi-search"></i> Buka Halaman Pencarian
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-globe" style="font-size: 3rem; color: #ddd;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Fitur Unggulan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Statistik & Grafik</div>
                        <p class="text-muted mt-2 small">
                            Lihat visualisasi data event dan pengguna dalam bentuk grafik (Sesuai Ketentuan Poin 2g).
                        </p>
                        <a href="/chart" class="btn btn-success">
                            <i class="bi bi-bar-chart-line"></i> Lihat Statistik
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-graph-up" style="font-size: 3rem; color: #ddd;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection