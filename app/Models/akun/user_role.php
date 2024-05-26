<?php

namespace App\Models\akun;

use App\Models\master\master_role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    use HasFactory;
    protected $table = "user_role";
    protected $guarded = [];

    public function has_one_masterrole()
    {
        return $this->hasOne(master_role::class, "id", "role_id");
    }
}
