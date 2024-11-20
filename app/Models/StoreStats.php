<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStats extends Model
{
    /** @use HasFactory<\Database\Factories\StoreStatsFactory> */
    use HasFactory;

    protected $fillable = ['total_candies_sold', 'total_revenue'];
}
