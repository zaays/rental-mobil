<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp.' . number_format($this->total_harga, 0, ',', '.');
    }

    public function getCreatedAtAttribute($value)
    {
        Carbon::setLocale('id'); // Atur locale ke Indonesia
        return Carbon::parse($value)->translatedFormat('d F Y');
    }
    public function getTanggalMulaiAttribute($value)
    {
        Carbon::setLocale('id'); // Atur locale ke Indonesia
        return Carbon::parse($value)->translatedFormat('d F Y');
    }
    public function getTanggalAkhirAttribute($value)
    {
        Carbon::setLocale('id'); // Atur locale ke Indonesia
        return Carbon::parse($value)->translatedFormat('d F Y');
    }
}
