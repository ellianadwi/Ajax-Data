<?php
/**
 * Created by PhpStorm.
 * User: Lely
 * Date: 26/01/2016
 * Time: 13:59
 */

namespace App\Domain\Contracts;

interface Repository
{
    public function all();

    public function getManyBy($key, $value);

    public function getFirstBy($key, $value);

    public function instance(array $attributes = []);
}