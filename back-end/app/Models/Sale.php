<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// This model has a related view: CandySaleStat
class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['candy_id', 'price'];

    public function candy()
    {
        return $this->belongsTo(Candy::class);
    }
}