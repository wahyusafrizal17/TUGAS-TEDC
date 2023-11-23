<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = ['nama', 'nik', 'email', 'no_hp', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'jabatan', 'alamat'];
}
