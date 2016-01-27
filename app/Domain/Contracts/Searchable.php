<?php
/**
 * Created by PhpStorm.
 * User: Lely
 * Date: 26/01/2016
 * Time: 13:59
 */

namespace app\Domain\Contracts;

interface Searchable
{
    public function search($query);
}