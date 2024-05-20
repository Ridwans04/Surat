<?php

namespace App\Models\akun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai_institusi extends Model
{
    use HasFactory;
    protected $table = "pegawai_institusi";
    protected $connection = "mysql";
    protected $guarded = [];
}
