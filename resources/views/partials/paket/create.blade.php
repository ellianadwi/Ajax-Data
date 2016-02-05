@extends('layouts.master')
@section('title', 'Page Title')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Paket</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Paket
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/pakets" method="post">
                                <div class="form-group">
                                    <label>Makanan</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="makanan">
                                </div>
                                <div class="form-group">
                                    <label>Minuman</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="minuman">
                                </div>
                                <div class="form-group">
                                    <label>Total Harga</label>
                                    <label>:</label>
                                    <input type="text" class="form-control" name="total_harga">
                                </div>
                                <div class="form-group">

                                    <input class="btn btn-outline btn-info" type="submit" value="Simpan">
                                    {{--onclick="location.href='/makanan/{{ $data->id }}}';">Simpan--}}
                                    <button type="button" class="btn btn-outline btn-primary"
                                            onclick="location.href='/paket';">Kembali
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