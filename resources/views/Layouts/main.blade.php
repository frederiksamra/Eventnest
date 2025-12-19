<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

    <title>@yield('title', 'Admin Dashboard')</title>

    <style>
        body {
            font-size: 0.9rem; 
            background-color: #f8f9fa; 
        }

        /* Styling untuk sidebar navigasi di sebelah kiri */
        .sidebar {
            position: fixed; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            z-index: 100; 
            padding: 48px 0 0; 
            background-color: #343a40;
        }

        /* Container untuk konten sidebar yang dapat di-scroll */

        /* Styling untuk link navigasi di dalam sidebar */
        .sidebar .nav-link {
            font-weight: 500; 
            color: #d1d1d1; 
            padding: 10px 20px; 
        }

        /* Efek hover saat kursor berada di atas link navigasi */
        .sidebar .nav-link:hover {
            color: #fff; 
            background-color: rgba(255,255,255,0.1);
        }

        /* Styling untuk link navigasi yang sedang aktif/dipilih */
        .sidebar .nav-link.active {
            color: #fff; 
            background-color: #007bff;
        }

        /* Styling untuk brand di navbar */
        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
        }

        /* Styling untuk konten utama halaman */
        main {
            padding-top: 60px;
        }

        /* Styling untuk komponen card Bootstrap */
        .card {
            border: none;
        }

        /* Styling untuk gambar profil pengguna */
        .user-profile img {
            border: 2px solid #fff;
        }
    </style>
  </head>
  <body>
    
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">EVENNEST</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item dropdown text-nowrap">
            <a class="nav-link dropdown-toggle user-profile" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->image ? asset('/storage/image/'.Auth::user()->image) : asset('/storage/image/No_Image_Available.jpg') }}" 
                     width="30" height="30" class="rounded-circle mr-2">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="userDropdown">
                <div class="dropdown-item text-center">
                     <small class="text-muted"><i class="bi bi-clock"></i> <span id="realtime-clock">{{ date('H:i') }}</span> WIB</small>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/changepass"><i class="bi bi-key"></i> Ubah Password</a>
                <a class="dropdown-item" href="/logout" onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ ($key ?? '') == 'home' ? 'active' : '' }}" href="/home">
                  <i class="bi bi-house-door mr-2"></i> Dashboard
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ ($key ?? '') == 'event' ? 'active' : '' }}" href="/event">
                  <i class="bi bi-calendar-event mr-2"></i> Master Event
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ ($key ?? '') == 'users' ? 'active' : '' }}" href="/users">
                  <i class="bi bi-people mr-2"></i> Data Pengguna
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link {{ ($key ?? '') == 'unggulan' ? 'active' : '' }}" href="/chart">
                  <i class="bi bi-star mr-2"></i> Chart Statistik
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('title')</h1>
            </div>

            @if(session('alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>

            <footer class="mt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2025 Project UAS PWL</p>
            </footer>

        </main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            
            // Realtime Clock
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                $('#realtime-clock').text(hours + ':' + minutes);
            }
            
            // Update setiap detik
            setInterval(updateClock, 1000);
            updateClock(); // Panggil langsung agar tidak delay
        });
    </script>
  </body>
</html>