<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanan';

    protected $fillable = ['nama', 'jenis_makanan', 'rasa', 'harga'];
}
