<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Smart Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-start vh-100">
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="text-center mb-3">Sign Up</h5>
            <form action="/register" method="POST">
              @csrf

              <div class="mb-2">
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="First Name" required>
              </div>

              <div class="mb-2">
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" placeholder="Last Name" required>
              </div>
              
              <div class="mb-2">
                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username" required>
              </div>

              <div class="mb-2">
                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Email" required>
              </div>
              
  
              <div class="mb-2">
                <input type="tel" class="form-control form-control-sm" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required>
              </div>

              <div class="mb-3">
                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password" required>
              </div>

              <button type="submit" class="btn btn-primary w-100 btn-sm">Sign Up</button>

              <div class="text-center mt-3">
                <small>Already have an account? <a href="/login">Login</a></small>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
