<?php

namespace App\Domain\Contracts;

interface Paginable
{
    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function getByPage($limit = 10);
}
