<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    protected $table = 'projek';

    protected $fillable = ['nama_projek', 'tanggal_mulai', 'tanggal_selesai'];
}
