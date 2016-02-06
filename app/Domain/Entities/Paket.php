<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = ['makanan_id', 'minuman_id', 'total_harga'];

    protected $with = ['makanan_id','minuman_id'];

    public function makanan_id()
    {
        return $this->belongsTo('App\Domain\Entities\Makanan', 'makanan_id');
    }
    public function minuman_id()
    {
        return $this->belongsTo('App\Domain\Entities\Minuman', 'minuman_id');
    }
}
