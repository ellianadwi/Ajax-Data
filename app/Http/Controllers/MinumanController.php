<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\MinumanRepository;
use Illuminate\Http\Request;
use app\Http\Requests;

class MinumanController extends Controller
{
    protected $minum;

    public function __construct(MinumanRepository $minumanRepository)
    {
        $this->minum = $minumanRepository;
    }

    public function detail($id)
    {
        return view('partials.minuman.detail', [
            'data' => $this->minum->find($id),
        ]);
    }

    public function edit($id)
    {
        return view('partials.minuman.edit', [
            'data' => $this->minum->find($id),
        ]);
    }

    public function index($limit = 10)
    {
        return view('partials.minuman.index', [
            'minumans' => $this->minum->getByPage($limit),
        ]);
    }

    public function getData($limit = 10)
    {
        return $this->minum->getdata();
    }

    public function store(Request $request)
    {
        return $this->minum->create($request->all());
    }

    public function show($id)
    {
//        return view('partials.minuman.detail', [
//            'data' => $this->minum->find($id),
//        ]);

        return $this->minum->find($id);
    }

    public function update($id, Request $request)
    {
        return $this->minum->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->minum->delete($id);
    }


}