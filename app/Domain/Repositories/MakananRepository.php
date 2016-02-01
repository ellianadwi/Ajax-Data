<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Makanan;

class MakananRepository extends AbstractRepository implements Crudable, Paginable
{
    public function __construct(Makanan $makanan)
    {
        $this->model = $makanan;
    }

    /**
     * @param int $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {

        parent::create([
                'nama' => e($data['nama']),
                'jenis_makanan' => e($data['jenis_makanan']),
                'rasa' => e($data['rasa']),
                'harga' => e($data['harga']),
            ]
        );

        return redirect('/makanan');
    }

    public function update($id, array $data)
    {
        parent::update($id, [
                'nama' => e($data['nama']),
                'jenis_makanan' => e($data['jenis_makanan']),
                'rasa' => e($data['rasa']),
                'harga' => e($data['harga']),
            ]
        );

        return redirect('/makanan');
    }

    public function delete($id)
    {
       return parent::delete($id);

 //       return redirect('/makanan');
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