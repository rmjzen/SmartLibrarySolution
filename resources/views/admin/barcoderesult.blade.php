<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Borrower Barcode</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .btn, .card-header, .back-print-controls {
        display: none !important;
      }

      body {
        background: white !important;
      }

      .card {
        box-shadow: none !important;
        border: none;
      }

      .barcode-wrapper {
        transform: scale(1.2);
      }
    }
  </style>
</head>
<body class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white text-center">
            <h5>Borrower Registered Successfully</h5>
          </div>
          <div class="card-body">
            @foreach($borrowers as $borrower)
              <p class="text-center mb-4">
                <strong>Borrower ID:</strong> {{ $borrower->id }}
              </p>
            <p><strong>Name:</strong> {{ $borrower->name }}</p>
            <p><strong>School:</strong> {{ $borrower->school }}</p>
            <p><strong>Email:</strong> {{ $borrower->email }}</p>
            <p><strong>Barcode Code:</strong> {{ $borrower->barcode }}</p>

            
            @endforeach

            <div class="text-center my-4">
              <h6>Generated Barcode</h6>
              <div class="barcode-wrapper" style="display: inline-block;">
                <img src="{{ asset('storage/barcodes/413de51b-2a67-459e-b66d-ad8fb2839f5d.png') }}" alt="Barcode" class="img-fluid">
              </div>
            </div>

            <div class="text-center back-print-controls">
              <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm me-2">Back</a>
              <button onclick="window.print()" class="btn btn-outline-primary btn-sm">Print Barcode</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
