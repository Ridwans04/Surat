<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sdm extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $connection = 'sdm';
    protected $guarded = [];
}
