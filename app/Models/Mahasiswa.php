<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswas'; // Nama tabel di database

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'no_hp',
        'password',
    ];

    protected $primaryKey = 'nim'; // Tentukan bahwa 'nim' adalah primary key
    public $incrementing = false;   // Karena 'nim' adalah string, nonaktifkan auto-increment
    protected $keyType = 'string';  // Tentukan tipe primary key sebagai string

    public function getAuthIdentifierName()
    {
        return 'nim'; // Gunakan 'nim' sebagai identifier untuk autentikasi
    }
}
