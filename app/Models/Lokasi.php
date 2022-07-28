<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }


}
