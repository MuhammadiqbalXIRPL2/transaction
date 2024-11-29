<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_transaksi',
        'response_code',
        'url',
        'response_message',
    ];
    protected $table = 'transaksis';
}
