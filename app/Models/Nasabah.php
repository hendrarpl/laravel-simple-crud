<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'table_nasabah';

    protected $fillable = [
        'nama',
        'saldo',
        'keterangan',
    ];
}
