<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function lokasi()
    {
        return $this->hasOne(Lokasi::class);
    }
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
