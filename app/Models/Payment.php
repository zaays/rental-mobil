<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function getFormattedPriceAttribute()
    {
        return 'Rp.' . number_format($this->jumlah_bayar, 0, ',', '.');
    }
}
