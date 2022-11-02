<?php

namespace App\Models;

use App\Models\JenisFaskes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faskes extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function jenis_faskes()
    {
        return $this->belongsTo(JenisFaskes::class, 'id_jenis_faskes', 'id');
    }
    public function ruas_jalan()
    {
        return $this->belongsTo(RuasJalan::class, 'id_ruas_jalans', 'id');
    }
}
