<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Paket;

class PaketRepository extends AbstractRepository implements Crudable, Paginable
{
    public function __construct(Paket $paket)
    {
        $this->model = $paket;
    }


    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns,'makanan_id', 'minuman_id');
    }

    public function create(array $data)
    {

        return parent::create([
                'makanan_id' => e($data['makanan_id']),
                'minuman_id' => e($data['minuman_id']),
                'total_harga' => e($data['total_harga']),
            ]
        );

//        return redirect('/paket');
    }


    public function update($id, array $data)
    {
        return parent::update($id, [
                'makanan_id' => e($data['makanan_id']),
                'minuman_id' => e($data['minuman_id']),
                'total_harga' => e($data['total_harga']),
            ]
        );

    }

    public function delete($id)
    {
        return parent::delete($id);

    }


    public function search($query)
    {
        return parent::likeSearch('makanan_id', $query);
    }


    public function getByPage($limit = 10, array $columns = ['*'])
    {
        return parent::getByPage($limit, $columns);
    }

    public function getData()
    {
        $data = $this->model->with('makanan_id', 'minuman_id')->get();

        return $data;
    }

    public function getHarga($makanan_id, $minuman_id)
    {
        $harga_makanan = \DB::table('makanan')
            ->where('id', $makanan_id)
            ->sum('harga');

        $harga_minuman = \DB::table('minuman')
            ->where('id', $minuman_id)
            ->sum('harga');

        $total = $harga_makanan + $harga_minuman;

        return $total;
    }

    public function getHarga2($makanan_id, $minuman_id)
    {
        $harga_makanan = \DB::table('makanan')
            ->where('id', $makanan_id)
            ->sum('harga');

        $harga_minuman = \DB::table('minuman')
            ->where('id', $minuman_id)
            ->sum('harga');

        $total = $harga_makanan + $harga_minuman;

        return $total;
    }
}