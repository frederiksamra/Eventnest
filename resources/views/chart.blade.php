@extends('layouts.main')
@section('title', 'Chart Statistik')
@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-people-fill"></i> Total Pengguna</h5>
                <h2 class="display-4">{{ $totalUser }}</h2>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-calendar-event"></i> Total Event</h5>
                <h2 class="display-4">{{ $totalEvent }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white font-weight-bold">
                <i class="bi bi-bar-chart-line"></i> Grafik Statistik Data
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm">
             <div class="card-header bg-white font-weight-bold">
                Informasi Sistem
            </div>
            <div class="card-body">
                <p>Selamat datang di halaman dashboard admin. Berikut adalah ringkasan data sistem Anda saat ini.</p>
                
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    
    var labels = {!! json_encode($chartLabels) !!};
    var data = {!! json_encode($chartData) !!};

    var myChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Data',
                data: data,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', 
                    'rgba(75, 192, 192, 0.6)'  
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection