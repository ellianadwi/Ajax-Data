@extends('layouts.master')
@section('title', 'Page Title')
@section('content')

    <body onload="Index()">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Minuman</h1>
            <button type="button" class="btn btn-outline btn-default"
                    onclick="Create()">Tambah data
            </button>
        </div>
    </div>

    <br>
    <div id="Index">
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
                                <tbodyid id="tambahdata">
                                {{--@foreach($minumans as $minuman)--}}
                                    {{--<tr class="">--}}
                                        {{--<td>{{$minuman->nama}}</td>--}}
                                        {{--<td>{{$minuman->jenis_minuman}}</td>--}}
                                        {{--<td>{{$minuman->rasa}}</td>--}}
                                        {{--<td>{{$minuman->harga}}</td>--}}
                                        {{--<td>--}}
                                            {{--<button type="button" class="btn btn-outline btn-primary"--}}
                                                    {{--onclick="location.href='/detail-minuman/{{$minuman->id}}';">Detail--}}
                                            {{--</button>--}}
                                            {{--<button type="button" class="btn btn-outline btn-info"--}}
                                                    {{--onclick="location.href='/edit-minuman/{{$minuman->id}}';">Edit--}}
                                            {{--</button>--}}
                                            {{--<button type="button" class="btn btn-outline btn-danger"--}}
                                                    {{--onclick="location.href='/hapus-minuman/{{$minuman->id}}';">Delete--}}
                                            {{--</button>--}}

                                        {{--</td>--}}

                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbodyid>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="Create">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah Minuman
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="/minumans" method="post">
                                    <div class="form-group">
                                        <label>nama</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis_minuman</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="jenis_minuman">
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
                                        {{--onclick="location.href='/minuman/{{ $data->id }}}';">Simpan--}}
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="location.href='/minuman';">Kembali
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

    <div id="Edit">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Minuman # {{ $data->id }}
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
                                            <label>Jenis Minuman</label>
                                            <label>:</label>
                                            <input type="text" name="jenis_minuman" class="form-control" value="{{ $data->jenis_minuman }}">
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
                                                    onclick="location.href='/minuman';">Kembali
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
        <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
        <script>
            $(document).ready(function() {
                $('#Create').hide();
                $('#Edit').hide();
                getAjax();
                $("#Form-Create").submit(function(event){

                    event.preventDefault();
                    var $form = $(this),
                            nama = $form.find("input[name='nama']").val(),
                            jenis_minuman = $form.find("input[name='jenis_minuman']").val(),
                            rasa = $form.find("input[name='rasa']").val(),
                            harga = $form.find("input[name='harga']").val();
//                $("#Form-Create").reset();
                    var posting = $.post('/minuman', {
                        nama :nama,
                        jenis_minuman :jenis_minuman,
                        rasa :rasa,
                        harga :harga
                    });

                    //Put the results in a div
                    posting.done(function(data){
//                    console.log(data);
                        window.alert(data.result.message);
                        getAjax();
                        Index();
                    });
                });
            });

            function Index() {
                $('#Create').hide();
                $('#Edit').hide();
                $('#Index').show();
            }

            function Create() {
                $('#Edit').hide();
                $('#Index').hide();
                $('#Create').show();
            }

            function getAjax() {
                $("#tampildata").children().remove();
                $.getJSON("/data-minuman", function (data) {
                    $.each(data.slice(0,9), function (i, data) {
                        $("#tampildata").append("" +
                                "<tr>" +
                                "<td>" + data.nama + "</td>" +
                                "<td>" + data.jenis_makanan+ "</td>" +
                                "<td>" + data.rasa + "</td>" +
                                "<td>" + data.harga + "</td>" +
                                "<td><button type='button' class='btn btn-outline btn-info' " +
                                "onclick='Edit("+ data.id +")'>Edit</button>" +
                                "<button type='button' class='btn btn-outline btn-danger' " +
                                "onclick='Hapus("+ data.id +")'>Delete</button>" +
                                "</td>" +
                                "</tr>");
                    })
                });
            }

            function Edit(id) {
                $('#Index').hide();
                $('#Create').hide();
                $('#Edit').hide();
                $.ajax({
                            method:"Get",
                            url: '/minuman/' + id,
                            data: {}
                        })
                        .done(function (data){
                            console.log(data.nama);
//                    var $form = $(this),
                            nama = $("input[name='nama']").val(data.nama);
                            jenis_minuman = $("input[name='jenis_minuman']").val(data.jenis_minuman);
                            rasa = $("input[name='rasa']").val(data.rasa);
                            harga = $("input[name='harga']").val(data.harga);

                            $('#Edit').show();
                        });

                $("#Form-Edit").submit(function(event){

                    event.preventDefault();
                    var $form = $(this),
                            nama = $form("input[name='nama']").val(),
                            jenis_minuman = $form("input[name='jenis_minuman']").val(),
                            rasa = $form("input[name='rasa']").val(),
                            harga = $form("input[name='harga']").val();

                    $.ajax({
                                method: "PUT",
                                url: '/minuman/' + id,
                                data: {
                                    nama: nama,
                                    jenis_minuman: jenis_minuman,
                                    rasa: rasa,
                                    harga: harga
                                }
                            })
                            .done(function (data) {
                                window.alert(data.result.message);
                                getAjax();
//                        Index();
                            });

                });
            }

            function Hapus(id) {
                var result = confirm("Apakah Anda Yakin Ingin Menghapus ? ");
                if (result) {
                    $.ajax({
                                method :"get",
                                url:'/hapus-minuman/' +id,
                                data:{}
                            })
                            .done(function (data) {
                                window.alert(data.result.message);
//                        location.reload();
                                getAjax();
                            });
                }
            }
        </script>
    </body>
@endsection