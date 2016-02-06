<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\PaketRepository;
use Illuminate\Http\Request;
use app\Http\Requests;

class PaketController extends Controller
{
    protected $paket;

    public function __construct(PaketRepository $paketRepository)
    {
        $this->paket = $paketRepository;
    }

    public function detail($id)
    {
        return view('partials.paket.detail', [
            'data' => $this->paket->find($id),
        ]);
    }

    public function edit($id)
    {
        return view('partials.paket.edit', [
            'data' => $this->paket->find($id),
        ]);
    }

    public function index($limit = 10)
    {
        return view('partials.paket.index', [
            'pakets' => $this->paket->getByPage($limit),
        ]);
    }

    public function getData($limit = 10)
    {
        return $this->paket->getdata();
    }

    public function store(Request $request)
    {
        return $this->paket->create($request->all());
    }

    public function show($id)
    {

        return $this->paket->find($id);
    }

    public function update($id, Request $request)
    {
        return $this->paket->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->paket->delete($id);
    }

    public function getHarga($makanan_id, $minuman_id)
    {
        return $this->paket->getHarga($makanan_id, $minuman_id);
    }


}