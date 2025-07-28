<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'email' => 'required|email|unique:borrowers,email',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'valid_id' => 'required|string',
        ]);

        $validated['barcode'] = strtoupper(Str::random(10)); // generate 10-char barcode

        $borrower = Borrower::create($validated);

        return view('admin.barcoderesult', compact('borrower'));
    }
}
