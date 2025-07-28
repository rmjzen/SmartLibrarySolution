

  


  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Barcode Generator - Borrower Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
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
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="card shadow-sm">
          <div class="card-header text-center bg-primary text-white">
            <h5 class="mb-0">Barcode Generator - Borrower Information</h5>
          </div>
          <div class="card-body">
            <form action="/generate-barcode" method="POST">
              @csrf
              
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="col-md-6">
                  <label for="school" class="form-label">Name of School</label>
                  <input type="text" class="form-control" id="school" name="school" required>
                </div>

                <div class="col-md-6">
                  <label for="number" class="form-label">Contact Number</label>
                  <input type="tel" class="form-control" id="number" name="number" required>
                </div>

                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                </div>

                <div class="col-md-6">
                  <label for="birthdate" class="form-label">Birthdate</label>
                  <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>

                <div class="col-md-6">
                  <label for="valid_id" class="form-label">Valid ID</label>
                  <input type="text" class="form-control" id="valid_id" name="valid_id" placeholder="Enter or scan ID" required>
                </div>
              </div>

              <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">Generate Barcode</button>
              </div>
            </form>

            
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
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
