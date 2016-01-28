<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    protected $table = 'minuman';

    protected $fillable = ['nama', 'jenis_minuman', 'rasa', 'harga'];
}
