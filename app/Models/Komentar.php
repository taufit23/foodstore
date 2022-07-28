<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $guarded = [];
    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
