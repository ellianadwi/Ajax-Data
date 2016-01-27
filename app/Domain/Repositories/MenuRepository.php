<?php
/**
 * Created by PhpStorm.
 * User: Lely
 * Date: 26/01/2016
 * Time: 16:44
 */

namespace App\Domain\Repositories;


use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Makanan;

class MenuRepository extends AbstractRepository implements Crudable, Paginable
{
    public function __construct(Makanan $makanan)
    {
        $this->model = $makanan;
    }

    public function getByPage($limit = 10, array $columns = ['*'])
    {
        return parent::getByPage($limit, $columns);
    }
}