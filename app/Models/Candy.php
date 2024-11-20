<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candy extends Model
{
    /** @use HasFactory<\Database\Factories\CandyFactory> */
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'image'];
}
