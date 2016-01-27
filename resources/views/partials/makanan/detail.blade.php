@extends('layouts.master')
@section('title', 'Page Title')
@section('content')

    <div class="row">
        <div class="" col=-lg-12">
            <h1 class="page-header">makanan</h1>
        </div>
    </div>

    <div class="row">
        <div clas="col-lg-12">
            <div class="panel-heading">
                Detail makanan # {{ $data->id}}
            </div>
            <div class="panel-body">
                <form role="form">
                    @if (count($data) >0)
                        <div class="col-lg-6">
                            <table class="table">
                                <tr>
                                    <td><label>nama</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->nama }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>jenis makanan</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->jenis_makanan }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>Rasa</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->rasa }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>harga</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->harga}}</label></td>
                                </tr>
                                <tr>
                                    <td clospan="2"></td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="location.href='/makanan';">Kembali
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection