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
                    Tambah Makanan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/makanans" method="post">
                                <div class="form-group">
                                    <label>nama</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Jenis_makanan</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="jenis_makanan">
                                </div>
                                <div class="form-group">
                                    <label>Rasa</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="rasa">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="harga">
                                </div>
                                <div class="form-group">

                                    <input class="btn btn-outline btn-info" type="submit" value="Simpan">
                                    {{--onclick="location.href='/makanan/{{ $data->id }}}';">Simpan--}}
                                    <button type="button" class="btn btn-outline btn-primary"
                                            onclick="location.href='/makanan';">Kembali
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <!-- /.row -->
@endsection