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
                    Edit Paket # {{ $data->id }}
                </div>
                <div class="panel-body">
                    {{--<form role="form">--}}
                    @if (count($data) > 0)
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="" method="post">
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label>Makanan</label>
                                        <label>:</label>
                                        <input type="text" name="makanan" class="form-control" value="{{ $data->makanan }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Minuman</label>
                                        <label>:</label>
                                        <input type="text" name="minuman" class="form-control" value="{{ $data->minuman }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <label>:</label>
                                        <input type="text" name="total_harga" class="form-control" value="{{ $data->total_harga }}">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline btn-info">Simpan
                                        </button>
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="location.href='/paket';">Kembali
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

