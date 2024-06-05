<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'nama_product',
        'gambar',
        'harga',
        'deskripsi',
        'id_kategori',
        'id_merk',
    ];



    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }



    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
