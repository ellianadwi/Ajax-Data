@extends('layouts.master')
@section('title', 'Page Title')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Makanan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Makanan
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        @if (count($makanans) > 0)
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Makanan</th>
                                    <th>Rasa</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($makanans as $makanan)
                                    <tr class="">
                                        <td>{{$makanan->nama}}</td>
                                        <td>{{$makanan->jenis_makanan}}</td>
                                        <td>{{$makanan->rasa}}</td>
                                        <td>{{$makanan->harga}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline btn-primary"
                                                    onclick="location.href='/detail-makanan/{{$makanan->id}}';">Detail
                                            </button>
                                            <button type="button" class="btn btn-outline btn-info"
                                                    onclick="location.href='/edit-makanan/{{$makanan->id}}';">Edit
                                            </button>
                                            <button type="button" class="btn btn-outline btn-danger"
                                                    onclick="location.href='/hapus-makanan/{{$makanan->id}}';">Delete
                                            </button>
                                            <button type="button" class="btn btn-outline btn-info"
                                                    onclick="location.href='/create-makanan';">Add
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