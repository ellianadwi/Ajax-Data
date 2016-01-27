<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\MakananRepository;
use Illuminate\Http\Request;
use app\Http\Requests;

class MakananController extends Controller
{
    protected $makan;

    public function __construct(MakananRepository $makananRepository)
    {
        $this->makan = $makananRepository;
    }

    public function detail($id)
    {
        return view('partials.makanan.detail', [
            'data' => $this->makan->find($id),
        ]);
    }

    public function edit($id)
    {
        return view('partials.makanan.edit', [
            'data' => $this->makan->find($id),
        ]);
    }

    public function index($limit = 10)
    {
        return view('partials.makanan.index', [
            'makanans' => $this->makan->getByPage($limit),
        ]);
    }

    public function store(Request $request)
    {
        return $this->makan->create($request->all());
    }

    public function show($id)
    {
        return view('partials.makanan.detail', [
            'data' => $this->makan->find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        return $this->makan->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->makan->delete($id);
    }
}