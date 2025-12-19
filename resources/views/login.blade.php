<!doctype html>
<html lang="en">
  <head>
    <title>Login Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Styling untuk body */
        body {
            background: linear-gradient(135deg, #032b55ff 0%, #4db5ffff 100%); /* Latar belakang gradient diagonal dari biru tua ke biru terang untuk tampilan yang menarik */
            height: 100vh; 
        }

        /* Styling untuk card container form login */
        .card-login {
            border: none;
            border-radius: 15px;
        }

        /* Styling untuk header card (bagian atas card login) */
        .card-header {
            background-color: #fff; 
            border-bottom: none;
            padding-top: 30px; 
            text-align: center;
        }

        /* Styling untuk tombol login */
        .btn-login {
            background: #007bff;
            border: none; 
            padding: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        /* Efek hover saat kursor berada di atas tombol login */
        .btn-login:hover {
            background: #0056b3;
        }

        /* Styling untuk icon/text di sebelah kiri input field */
        .input-group-text {
            background-color: #f8f9fa;
        }

        /* Efek saat input field mendapat fokus (diklik/diketik) */
        .form-control:focus {
            box-shadow: none; 
            border-color: #80bdff;
        }

        /* Efek fokus untuk seluruh input group (icon + input field) */
        .input-group:focus-within .form-control, 
        .input-group:focus-within .input-group-text {
            border-color: #80bdff;
        }
    </style>
  </head>
  <body>
    
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="card card-login">
                    <div class="card-header">
                        <div class="text-primary mb-2">
                            <i class="bi bi-ticket-perforated-fill" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="font-weight-bold text-dark">Admin Login</h4>
                        <p class="text-muted small">Silakan masuk untuk mengelola event</p>
                    </div>

                    <div class="card-body px-4 pb-4">
                        
                        @if(session('alert'))
                            <div class="alert alert-danger alert-dismissible fade show text-center small" role="alert">
                                {{ session('alert') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="/ceklogin" method="post">
                            @csrf 
                            
                            <div class="form-group">
                                <label for="email" class="small text-muted mb-1">Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="small text-muted mb-1">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-login btn-block shadow-sm">
                                    MASUK SEKARANG
                                </button>
                            </div>

                        </form>
                    </div>
                    
                    <div class="card-footer bg-light text-center py-3">
                        <small>Bukan admin? <a href="/" class="font-weight-bold">Kembali ke Pencarian</a></small>
                    </div>
                </div>

                <div class="text-center mt-3 text-white small">
                    &copy; 2025 Project UAS PWL
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>