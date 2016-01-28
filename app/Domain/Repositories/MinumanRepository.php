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
                'jenis_minuman' => e($data['jenis_minuman']),
                'rasa' => e($data['rasa']),
                'harga' => e($data['harga']),
            ]
        );

        return redirect('/minuman');
    }

    /**
     * @param       $id
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        parent::update($id, [
                'nama' => e($data['nama']),
                'jenis_minuman' => e($data['jenis_minuman']),
                'rasa' => e($data['rasa']),
                'harga' => e($data['harga']),
            ]
        );

        return redirect('/minuman');
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        parent::delete($id);

        return redirect('/minuman');
    }

    /**
     * @param $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($query)
    {
        return parent::likeSearch('nama', $query);
    }

    /**
     * @param int $limit
     * @param array $columns
     * @return \Illuminate\Pagination\Paginator
     */
    public function getByPage($limit = 10, array $columns = ['*'])
    {
        return parent::getByPage($limit, $columns);
    }
}