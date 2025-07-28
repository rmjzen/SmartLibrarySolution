<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'name',
        'school',
        'number',
        'email',
        'address',
        'birthdate',
        'valid_id',
        'barcode',
    ];
}
