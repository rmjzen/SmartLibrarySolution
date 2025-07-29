<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Picqer\Barcode\Types\TypeCode128;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\Renderers\PngRenderer;
use Picqer\Barcode\Renderers\DynamicHtmlRenderer;

class BorrowerController extends Controller
{
    //
    public function store(Request $request)
    {
        $create = new Borrower();
        $create->name = $request->input('name');
        $create->school = $request->input('school');
        $create->number = $request->input('number');
        $create->email = $request->input('email');
        $create->address = $request->input('address');
        $create->birthdate = $request->input('birthdate');
        $create->valid_id = $request->input('valid_id');

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

        return view('admin.barcoderesult', compact('borrower', 'barcodeimage'));
    }

    public function barcodeResult()
    {
        $borrowers = Borrower::where('id', 1)->first();
        return $borrowers->name;

        return view('admin.barcoderesult', compact('borrowers'));
    }
}
