<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $fillable = ['tgl_tanggapan', 'id_pengaduan', 'tanggapan', 'id_petugas'];
}
