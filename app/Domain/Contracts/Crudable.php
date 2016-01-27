<?php
/**
 * Created by PhpStorm.
 * User: Lely
 * Date: 26/01/2016
 * Time: 14:00
 */

namespace App\Domain\Contracts;


/**
 * Interface Crudable
 *
 * @package app\Domain\Contracts
 */
interface Crudable
{
    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);

    public function delete($id);
}