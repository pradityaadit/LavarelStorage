<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $primaryKey = 'nim'; // Atur nim sebagai primary key

    public $incrementing = false; // Atur ke false jika nim bukan angka dan tidak auto-increment

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'no_hp',
        'password',
        'is_admin',
        'is_visible', // Tambahkan kolom ini
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
