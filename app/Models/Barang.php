<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pesanan_detail()
    {
        return $this->hasMany('App\Models\PesananDetail', 'barang_id', 'id');
    }
}
