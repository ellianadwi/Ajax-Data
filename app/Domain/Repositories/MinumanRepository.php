<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Minuman;

class MinumanRepository extends AbstractRepository implements Crudable, Paginable
{
    public function __construct(Minuman $minuman)
    {
        $this->model = $minuman;
    }


    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

    public function create(array $data)
    {

        return parent::create([
                'nama' => e($data['nama']),
                'jenis_minuman' => e($data['jenis_minuman']),
                'rasa' => e($data['rasa']),
                'harga' => e($data['harga']),
            ]
        );

//        return redirect('/minuman');
    }


    public function update($id, array $data)
    {
        return parent::update($id, [
                'nama' => e($data['nama']),
                'jenis_minuman' => e($data['jenis_minuman']),
                'rasa' => e($data['rasa']),
                'harga' => e($data['harga']),
            ]
        );

//        return redirect('/minuman');
    }

    public function delete($id)
    {
       return parent::delete($id);

//        return redirect('/minuman');
    }


    public function search($query)
    {
        return parent::likeSearch('nama', $query);
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