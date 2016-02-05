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
                                            <input type="text" name="makanan" class="form-control" id="makanan">
                                        </div>
                                        <div class="form-group">
                                            <label>Minuman</label>
                                            <label>:</label>
                                            <input type="text" name="minuman" class="form-control"
                                                   id="minuman">
                                        </div>
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <label>:</label>
                                            <input type="text" name="total_harga" class="form-control" id="total_harga">
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
                        makanan = $form.find("input[name='makanan']").val(),
                        minuman = $form.find("input[name='minuman']").val(),
                        total_harga = $form.find("input[name='total_harga']").val();
//                $("#Form-Create").reset();
                var posting = $.post('/paket', {
                    makanan: makanan,
                    minuman: minuman,
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
                        makanan = $form.find("input[name='makanan']").val(),
                        minuman = $form.find("input[name='minuman']").val(),
                        total_harga = $form.find("input[name='total_harga']").val();

                currentRequest = $.ajax({
                    method: "PUT",
                    url: '/paket/' + id,
                    data: {
                        makanan: makanan,
                        minuman: minuman,
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
                                "<td>" + data.makanan + "</td>" +
                                "<td>" + data.minuman + "</td>" +
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
                }); }, 2200);
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
                    .done(function (data) {
                        console.log(data.id);
//                    var $form = $(this),
                        $("input[name='id']").val(data.id);
                        $("input[name='makanan']").val(data.makanan);
                        $("input[name='minuman']").val(data.minuman);
                        $("input[name='total_harga']").val(data.total_harga);
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
                    $("#modal-body").append("<tr><td> Makanan</td><td> : </td><td>" + data.makanan + "</td></tr>" +
                            "<tr><td> Minuman </td><td> : </td><td>" + data.minuman + "</td></tr>" +
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
    </script>
    </body>
@endsection