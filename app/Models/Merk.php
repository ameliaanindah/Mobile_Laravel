<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';

    protected $fillable = [
        'nama_merk',
        'gambar',
    ];

    // public function kategori()
    // {
    //     return $this->belongsTo(Kategori::class);
    // }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
