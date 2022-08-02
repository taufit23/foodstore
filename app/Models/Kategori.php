<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $guarded = [];
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    public function toko()
    {
        return $this->BelongsTo(Toko::class);
    }
}
