<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Toko Faiz - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #a6a8ad;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      max-width: 900px;
      width: 100%;
    }
    .login-image {
      background-image: url('{{ asset('images/logo faiz.png') }}');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      min-height: 100%;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #4e73df;
    }
    .btn-primary {
      background-color: #4e73df;
      border: none;
    }
    .btn-primary:hover {
      background-color: #3752c9;
    }
  </style>
</head>
<body>
  <div class="login-card d-flex flex-column flex-lg-row">
    <div class="login-image d-none d-lg-block col-lg-6"></div>
    <div class="p-5 col-lg-6">
      <h2 class="mb-4 text-center">Selamat Datang di Toko Faiz</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required autofocus>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Kata Sandi</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Ingat Saya</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
      </form>
      <div class="mt-3 text-center">
        <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa kata sandi?</a>
      </div>
      <div class="mt-2 text-center">
        <a href="{{ route('register') }}" class="text-decoration-none">Belum punya akun? Daftar</a>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
