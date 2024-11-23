<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// This model has a related view: CandySaleStat
class Candy extends Model
{
    /** @use HasFactory<\Database\Factories\CandyFactory> */
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'image', 'is_active'];

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', true);
        });
    }

    public static function withoutActiveScope()
    {
        return static::withoutGlobalScope('active');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getTotalSalesAttribute()
    {
        return $this->sales()->count();
    }

    public function getTotalRevenueAttribute()
    {
        return $this->sales()->sum('price');
    }
}