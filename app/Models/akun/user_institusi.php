<?php

namespace App\Models\akun;

use App\Models\master\master_institusi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_institusi extends Model
{
    use HasFactory;
    protected $table = "user_institusi";
    protected $guarded = [];

    public function has_one_masterins()
    {
        return $this->hasOne(master_institusi::class, "id", "institusi_id");
    }
}
