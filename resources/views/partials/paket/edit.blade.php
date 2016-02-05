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
                    Edit Makanan # {{ $data->id }}
                </div>
                <div class="panel-body">
                    {{--<form role="form">--}}
                    @if (count($data) > 0)
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="" method="post">
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <label>:</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Makanan</label>
                                        <label>:</label>
                                        <input type="text" name="jenis_makanan" class="form-control" value="{{ $data->jenis_makanan }}">
                                    </div>
                                    <div class="form-group">
                                        <label>rasa</label>
                                        <label>:</label>
                                        <input type="text" name="rasa" class="form-control" value="{{ $data->rasa }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <label>:</label>
                                        <input type="text" name="harga" class="form-control" value="{{ $data->harga }}">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline btn-info">Simpan
                                        </button>
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="location.href='/makanan';">Kembali
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                    {{--</form>--}}

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <!-- /.row -->
@endsection

