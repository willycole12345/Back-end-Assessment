<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';

    protected $fillable = [
        'name',
        'isbn',
        'authors',
        'number_of_page',
        'publisher',
        'country',
        'mediaType',
        'release_date',
    ];
}
