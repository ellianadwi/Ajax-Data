@extends('layouts.master')
@section('title', 'Page Title')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Minuman</h1>
            <button type="button" class="btn btn-outline btn-default"
                    onclick="location.href='/create-minuman';">Tambah data
            </button>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Minuman
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        @if (count($minumans) > 0)
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Minuman</th>
                                    <th>Rasa</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($minumans as $minuman)
                                    <tr class="">
                                        <td>{{$minuman->nama}}</td>
                                        <td>{{$minuman->jenis_minuman}}</td>
                                        <td>{{$minuman->rasa}}</td>
                                        <td>{{$minuman->harga}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline btn-primary"
                                                    onclick="location.href='/detail-minuman/{{$minuman->id}}';">Detail
                                            </button>
                                            <button type="button" class="btn btn-outline btn-info"
                                                    onclick="location.href='/edit-minuman/{{$minuman->id}}';">Edit
                                            </button>
                                            <button type="button" class="btn btn-outline btn-danger"
                                                    onclick="location.href='/hapus-minuman/{{$minuman->id}}';">Delete
                                            </button>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection