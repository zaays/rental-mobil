<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'cars';

    public function getFormattedPriceAttribute()
    {
        return 'Rp.' . number_format($this->harga_satuan, 0, ',', '.');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
