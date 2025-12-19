<!doctype html>
<html lang="en">

<head>
    <title>Cari Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { background-color: #f8f9fa; }
        .hero-section {
            background: linear-gradient(to right, #17a2b8, #138496);
            padding: 60px 0;
            color: white;
            margin-bottom: 40px;
        }
        .card-event {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card-event:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .badge-custom { font-size: 0.8rem; padding: 5px 10px; }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">TIKET EVENT</a>
            <div class="ml-auto">
                <a href="/login" class="btn btn-outline-light btn-sm">Login Admin</a>
            </div>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Temukan Event Seru</h1>
            <p class="lead">Cari event, workshop, atau seminar favoritmu di sini</p>
            
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <form action="/" method="GET">
                        <div class="input-group input-group-lg">
                            <input type="text" name="q" class="form-control rounded-left" 
                                   placeholder="Cari nama event, lokasi, atau kategori..." 
                                   value="{{ request('q') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-warning font-weight-bold text-dark">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        
        <div class="row mb-3">
            <div class="col-md-12">
                <h4 class="border-left border-info pl-3 text-secondary">
                    @if(request('q'))
                        Hasil pencarian: "{{ request('q') }}"
                    @else
                        Event Terbaru
                    @endif
                </h4>
            </div>
        </div>

        <div class="row">
            @forelse($ev as $item)
            <div class="col-md-4 mb-4">
                <div class="card card-event h-100">
                    <div class="position-relative">
                        <img src="{{ $item->image ? asset('/storage/image/'.$item->image) : asset('/storage/image/No_Image_Available.jpg') }}" 
                             alt="Poster Event" class="card-img-top">
                        <span class="badge badge-warning position-absolute p-2" style="top:10px; right:10px;">
                            {{ $item->category }}
                        </span>
                    </div>

                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge badge-{{ $item->status == 'Open' ? 'success' : 'danger' }}">
                                {{ $item->status }}
                            </span>
                        </div>

                        <h5 class="card-title font-weight-bold text-dark">{{ $item->event_name }}</h5>
                        
                        <div class="text-muted small mb-3">
                            <div class="d-flex align-items-center mb-1">
                                <i class="bi bi-calendar-event mr-2"></i> 
                                {{ $item->event_date }}
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock mr-2"></i> 
                                {{ $item->start_time }} - {{ $item->end_time }}
                            </div>
                        </div>

                        <p class="card-text text-secondary mb-2">
                            <i class="bi bi-geo-alt-fill text-danger"></i> {{ $item->location }}
                        </p>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-person-circle"></i> {{ $item->organizer }}
                            </small>
                            <span class="font-weight-bold text-primary">
                                Rp {{ number_format($item->ticket_price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-light" role="alert">
                    <i class="bi bi-emoji-frown display-4 text-muted"></i>
                    <h4 class="mt-3 text-muted">Maaf, event tidak ditemukan.</h4>
                    <p>Coba gunakan kata kunci lain.</p>
                    <a href="/" class="btn btn-outline-info">Reset Pencarian</a>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>