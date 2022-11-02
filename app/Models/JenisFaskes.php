<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisFaskes extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function faskes()
    {
        return $this->hasMany(Faskes::class, 'id_jenis_faskes', 'id');
    }
}
