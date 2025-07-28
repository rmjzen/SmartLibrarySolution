<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Tabango Public Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">


  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $errors->first() }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="card shadow-sm p-4 w-100" style="max-width: 400px;">
    <h4 class="text-center mb-3">Login to Tabango Public Library</h4>
    <form action="/login" method="POST">
      @csrf
      
      
      <div class="mb-3">
        <input type="text" class="form-control form-control-sm" id="username" name="username" required placeholder="Username">
      </div>

      <div class="mb-3">
        <input type="password" class="form-control form-control-sm" id="password" name="password" required placeholder="Password">
      </div>

      <button type="submit" class="btn btn-primary w-100 btn-sm">Login</button>

      <div class="text-center mt-3">
        <small>Don't have an account? <a href="/register">Register here</a></small>
      </div>
    </form>
  </div>

  <!-- Bootstrap 5.3 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
