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
            <div class="panel-heading">
                Detail paket # {{ $data->id}}
            </div>
            <div class="panel-body">
                <form role="form">
                    @if (count($data) >0)
                        <div class="col-lg-6">
                            <table class="table">
                                <tr>
                                    <td><label>Makanan</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->Makanan }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>Minuman</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->minuman }}</label></td>
                                </tr>
                                <tr>
                                    <td><label>Total harga</label></td>
                                    <td><label>:</label></td>
                                    <td><label>{{ $data->total_harga}}</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="location.href='/paket';">Kembali
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