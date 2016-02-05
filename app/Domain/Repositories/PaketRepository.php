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
        return parent::find($id, $columns);
    }

    public function create(array $data)
    {

        return parent::create([
                'makanan' => e($data['makanan']),
                'minuman' => e($data['minuman']),
                'total_harga' => e($data['total_harga']),
            ]
        );

//        return redirect('/paket');
    }


    public function update($id, array $data)
    {
        return parent::update($id, [
                'makanan' => e($data['makanan']),
                'minuman' => e($data['minuman']),
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
        return parent::likeSearch('makanan', $query);
    }


    public function getByPage($limit = 10, array $columns = ['*'])
    {
        return parent::getByPage($limit, $columns);
    }

    public function getData()
    {
        $data=$this->model->get();

        return $data;
    }
}