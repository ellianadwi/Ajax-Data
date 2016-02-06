@extends('layouts.master')
@section('title', 'Page Title')
@section('content')
    <body onload="Index()">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Paket</h1>
        </div>
    </div>
    <div id="Index">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button type="button" class="btn btn-outline btn-default"
                                onclick="Create()">
                            Tambah Paket
                        </button>
                    </div>
                    <center>
                        <div id="loader2">
                            <img src="{!! asset('images/download1.gif') !!}">
                        </div>
                    </center>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Makanan</th>
                                    <th>Minuman</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody id="data-example">
                                </tbody>
                            </table>
                        </div>
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
                        Tambah Paket
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form id="Form-Create">
                                    <div class="form-group">
                                        <label>Makanan</label>
                                        <label>:</label>
                                        <select id="makanan_id" class="form-control" name="makanan_id">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Minuman</label>
                                        <label>:</label>
                                        <select id="minuman_id" class="form-control" name="minuman_id">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <label>:</label>
                                        <input type="text" class="form-control" name="total_harga"
                                               onclick="getHarga()" readonly>
                                    </div>
                                    <div class="form-group">

                                        <input class="btn btn-outline btn-info" type="submit" id="Submit"
                                               value="Simpan">
                                        {{--onclick="location.href='/makanan/{{ $data->id }}}';">Simpan--}}
                                        <button type="button" class="btn btn-outline btn-primary"
                                                onclick="Index()">Kembali
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Edit">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Paket #
                    </div>
                    <div class="panel-body">
                        <form role="form" id="Form-Edit">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="Form-Edit">
                                        <input type="hidden" name="id">
                                        <div class="form-group">
                                            <label>Makanan</label>
                                            <label>:</label>
                                            <select id="makanan_id" name="makanan_id" class="form-control">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Minuman</label>
                                            <label>:</label>
                                            <select id="minuman_id" name="minuman_id" class="form-control">

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <label>:</label>
                                            <input type="text" name="total_harga" class="form-control" id="total_harga"
                                                   onclick="getHarga2()" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-outline btn-info" type="submit" value="Simpan">
                                            {{--onclick="location.href='/makanan/{{$data->id}}';">Simpan--}}
                                            {{--</button>--}}
                                            <button type="button" class="btn btn-outline btn-primary"
                                                    onclick="Index();">Kembali
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal--}}

    {{--Detail Modal--}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><font face="Bernard MT"></font></h4>
                </div>
                <div class="modal-body">
                    {{--<p>Some text in the modal.</p>--}}
                    <div id="loader-wrapper">
                        <div id="loader"></div>
                    </div>
                    <table class="table table-striped">
                        <tbody id="modal-body">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            var currentRequest = null;
            $('#Create').hide();
            $('#Edit').hide();

            $("#Form-Create").submit(function (event) {
                event.preventDefault();
                var $form = $(this),
                        makanan_id = $form.find("select[name='makanan_id']").val(),
                        minuman_id = $form.find("select[name='minuman_id']").val(),
                        total_harga = $form.find("input[name='total_harga']").val();
//                $("#Form-Create").reset();
                var posting = $.post('/paket', {
                    makanan_id: makanan_id,
                    minuman_id: minuman_id,
                    total_harga: total_harga
                });
                //Put the results in a div
                posting.done(function (data) {
//                    console.log(data);
                    window.alert(data.result.message);
//                    getAjax();
                    Index();
                });
                return false;
            });

            $("#Form-Edit").submit(function (event) {

                event.preventDefault();
                var $form = $(this),
                        id = $form.find("input[name='id']").val(),
                        makanan_id = $form.find("select[name='makanan_id']").val(),
                        minuman_id = $form.find("select[name='minuman_id']").val(),
                        total_harga = $form.find("input[name='total_harga']").val();

                currentRequest = $.ajax({
                    method: "PUT",
                    url: '/paket/' + id,
                    data: {
                        makanan_id: makanan_id,
                        minuman_id: minuman_id,
                        total_harga: total_harga
                    },
                    beforeSend: function () {
                        if (currentRequest != null) {
                            currentRequest.abort();
                        }
                    },
                    success: function (data) {
                        window.alert(data.result.message);
                        Index();
                    },
                    error: function (data) {
                        window.alert(data.result.message);
                        Index();
                    }
                });
            });
        });

        function Index() {
            $('#Create').hide();
            $('#Edit').hide();
            $('#Index').show();
            $("#data-example").children().remove();
            document.getElementById("Form-Create").reset();
            document.getElementById("Form-Edit").reset();
            getAjax();
        }

        function Create() {
            $('#Edit').hide();
            $('#Index').hide();
            $('#Create').show();
            document.getElementById("Form-Create").reset();
            document.getElementById("Form-Edit").reset();
            getMakanan();
            getMinuman();
        }
        function getMakanan() {
            $('#makanan_id').children().remove();
            $.getJSON("/data-makanan", function (data) {
                var jumlah = data.length;
                $("#makanan_id").append("<option selected>pilih makanan</option>");
                $.each(data.slice(0, jumlah), function (i, data) {
                    $("#makanan_id").append("<option value='" + data.id + "'>" + data.nama + "</option>");
                })
            });
        }
        function getMinuman() {
            $('#minuman_id').children().remove();
            $.getJSON("/data-minuman", function (data) {
                var jumlah = data.length;
                $("#minuman_id").append("<option selected>pilih minuman</option>");
                $.each(data.slice(0, jumlah), function (i, data) {
                    $("#minuman_id").append("<option value='" + data.id + "'>" + data.nama + "</option>");
                })
            });
        }
        function getAjax() {
            $("#data-example").children().remove();

            $("#loader2").delay(2000).animate({
                opacity: 0,
                width: 0,
                height: 0
            }, 500);
            setTimeout(function () {
                $.getJSON("/data-paket", function (data) {
                    var jumlah = data.length;
                    $.each(data.slice(0, jumlah), function (i, data) {
                        $("#data-example").append("" +
                                "<tr>" +
                                "<td>" + data.makanan_id.nama + "</td>" +
                                "<td>" + data.minuman_id.nama + "</td>" +
                                "<td>" + data.total_harga + "</td>" +

                                "<td><button type='button' class='btn btn-outline btn-primary' data-toggle='modal' data-target='#myModal'  " +
                                "onclick='Detail(" + data.id + ")'>Detail</button> " +
                                "<button type='button' class='btn btn-outline btn-info' " +
                                "onclick='Edit(" + data.id + ")'>Edit</button> " +
                                "<button type='button' class='btn btn-outline btn-danger'  " +
                                "onclick='Hapus(" + data.id + ")'>Delete</button>" +
                                "</td>" +
                                "</tr>");
                    })
                });
            }, 2200);
        }

        function Edit(id) {
            $('#Index').hide();
            $('#Create').hide();
            $('#Edit').hide();
            document.getElementById("Form-Create").reset();
            document.getElementById("Form-Edit").reset();

            $.ajax({
                        method: "Get",
                        url: '/paket/' + id,
                        data: {}
                    })
                    .done(function (data_edit) {
//                        console.log(data_edit.makanan_id.id);
                        $("input[name='id']").val(data_edit.id);
                        $("input[name='total_harga']").val(data_edit.total_harga);
                        $.getJSON("/data-makanan", function (data) {
                            var jumlah = data.length;
                            $.each(data.slice(0, jumlah), function (i, data) {
                                if (data_edit.makanan_id.id == data.id) {
                                    $("select[name='makanan_id']").append("<option value='" + data.id + "' selected>" + data.nama + "</option>");
                                }
                                else {
                                    $("select[name='makanan_id']").append("<option value='" + data.id + "'>" + data.nama + "</option>");
                                }
                            })
                        });
                        $.getJSON("/data-minuman", function (data) {
                            var jumlah = data.length;
                            $.each(data.slice(0, jumlah), function (i, data) {
                                if (data_edit.minuman_id.id == data.id) {
                                    $("select[name='minuman_id']").append("<option value='" + data.id + "' selected>" + data.nama + "</option>");
                                }
                                else {
                                    $("select[name='minuman_id']").append("<option value='" + data.id + "'>" + data.nama + "</option>");
                                }
                            })
                        });
                        $('#Edit').show();
                    });
        }
        function Detail(id) {
            $("#modal-body").children().remove();
            $.ajax({
                method: "GET",
                url: '/paket/' + id,
                data: {},
                beforeSend: function () {
                    $('#loader-wrapper').show();
                },
                success: function (data) {
//                    $('#loader').hide();
                    $("#loader-wrapper").hide();
                    $("#modal-body").append("<tr><td> Makanan</td><td> : </td><td>" + data.makanan_id.nama + "</td></tr>" +
                            "<tr><td> Minuman </td><td> : </td><td>" + data.minuman_id.nama + "</td></tr>" +
                            "<tr><td> Total Harga</td><td> : </td><td>" + data.total_harga + "</td></tr>"
                    );
                }
            });
        }

        function Hapus(id) {
            var result = confirm("Apakah Anda Yakin Ingin Menghapus ? ");
            if (result) {
                $.ajax({
                            method: "DELETE",
                            url: '/hapus-paket/' + id,
                            data: {}
                        })
                        .done(function (data) {
                            window.alert(data.result.message);
                            Index();
                        });
            }
        }

        function getHarga() {
//            $("#Form-Create").submit(function (event) {
//                event.preventDefault();
            var $form = $("#Form-Create"),
                    makanan_id = $form.find("select[name='makanan_id']").val(),
                    minuman_id = $form.find("select[name='minuman_id']").val();
//                        total_harga = $form.find("input[name='total_harga']").val();
            console.log(makanan_id + ' | ' + minuman_id);
            $.ajax({
                        method: "Get",
                        url: '/get-harga/' + makanan_id + '/' + minuman_id,
                        data: {}
                    })
                    .done(function (data) {
                        console.log(data);
                        $("input[name='total_harga']").val(data);
                    });
//
//            });
        }

        function getHarga2() {
//            $("#Form-Create").submit(function (event) {
//                event.preventDefault();
            var $form = $("#Form-Edit"),
                    makanan_id = $form.find("select[name='makanan_id']").val(),
                    minuman_id = $form.find("select[name='minuman_id']").val();
//                        total_harga = $form.find("input[name='total_harga']").val();
            console.log(makanan_id + ' | ' + minuman_id);
            $.ajax({
                        method: "Get",
                        url: '/get-harga/' + makanan_id + '/' + minuman_id,
                        data: {}
                    })
                    .done(function (data) {
                        console.log(data);
                        $("input[name='total_harga']").val(data);
                    });
//
//            });
        }
    </script>
    </body>
@endsection