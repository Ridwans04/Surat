<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credential extends Model
{
    use HasFactory;
    protected $table = 'credentials';
    protected $connection = 'backend';
    protected $guarded = [];
}
