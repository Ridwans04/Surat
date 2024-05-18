<?php

namespace App\Models\akun;

use App\Models\db\sdm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai_password extends Model
{
    use HasFactory;
    protected $table = 'pegawai_password';
    protected $connection = "mysql";
    protected $guarded = [];

    public function get_data_pegawai()
    {
        return $this->hasOne(sdm::class, 'nip', 'nip');
    }
}
