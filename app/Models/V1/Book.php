<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'isbn',
        'authors',
        'number_of_page',
        'publisher',
        'country',
        'release_date',
    ];
}