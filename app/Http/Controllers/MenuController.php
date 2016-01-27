<?php

namespace App\Http\Controllers;

use app\Domain\Repositories\MakananRepository;
use App\Domain\Repositories\MenuRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    protected $makan;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->makan = $menuRepository;
    }

    public function index()
    {
        return $this->makan->getByPage(10);
    }
}
