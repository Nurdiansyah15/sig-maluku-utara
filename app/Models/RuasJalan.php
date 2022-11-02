<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuasJalan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function faskes()
    {
        return $this->hasMany(Faskes::class, 'id_ruas_jalans', 'id');
    }
}
