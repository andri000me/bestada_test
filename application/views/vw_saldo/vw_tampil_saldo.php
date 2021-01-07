<div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-users users-icon"></i>
                <a href="#"><?= $title; ?></a>
            </li>
        </ul><!-- /.breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                Daftar <?= $title; ?>

            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="form-group">
                <div class="col-sm-4">
                    <input type="text" id="cari" placeholder="Cari" onkeydown="cariFunc()" onkeyup="cariFunc()" class="col-xs-10 col-sm-5" />
                </div>
                <div class="col-sm-7">
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-info btn-sm" onclick="func_add()">
                        <i class="ace-icon fa fa-plus bigger-110"></i>New
                    </button>
                </div>
            </div>
            <div class="col-xs-12">
                <br>

                <div class="row">
                    <div class="col-sm-12" id="id_users">
                        <table id="tb_saldo" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Saldo Awal</th>
                                    <th>Sisa Saldo</th>
                                    <th>ِAksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div><!-- /.span -->
                </div>
            </div>
        </div>
        <!-- Modal add kategori -->
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Input Saldo Masuk</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal </label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input class="form-control date-picker" id="tanggal" type="text" data-date-format="dd-mm-yyyy" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar bigger-110"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="pilih_kategori"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Saldo (dalam USD)</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="saldo" placeholder="Masukkan Total" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Tukar Rupiah per Dolar </label>
                                        <div class="col-sm-9">
                                            <input type="number" onkeyup="rpFunc()" onkeydown="rpFunc()" id="nt_rp" placeholder="Masukkan Nilai Tukar Rupiah Hari Ini" class="col-xs-10 col-sm-7" required>&nbsp;
                                            <label id="lb_rp" class="control-label no-padding-right" for=""></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Tukar Real per Dolar </label>
                                        <div class="col-sm-9">
                                            <input type="number" onkeyup="rlFunc()" onkeydown="rlFunc()" id="nt_rl" placeholder="Masukkan Nilai Tukar Real Hari Ini" class="col-xs-10 col-sm-7" required>&nbsp;
                                            <label id="lb_rl" class="control-label no-padding-right" for=""></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="func_add_saldo()" class="btn btn-primary btn-md">Save data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="<?= base_url(); ?>templates/admin_temp/assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var keyword = '';
        list_kategori();
        list_saldo(keyword);
    });
    $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function() {
            $(this).prev().focus();
        });

    function cariFunc() {
        var keypad = $('#cari').val();
        list_saldo(keypad);
    }

    function list_kategori() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('pengeluaran/list_kategori'); ?>",
            dataType: "JSON",
            beforeSend: function() {},
            cache: false,
            data: '',
            success: function(data) {
                $.each(data, function(index) {
                    var opsi_cmb_kategori = '<option value="' + data[index].keterangan + '">' + data[index]
                        .keterangan + '</option>';
                    $('#pilih_kategori').append(opsi_cmb_kategori);
                });
                // tableKontrak();
            },
            error: function(request) {
                console.log(request.responseText);
            }
        });
    }

    function list_saldo(keyword) {
        $('#tb_saldo').dataTable().fnDestroy();
        $('#tb_saldo').dataTable({
            "paging": true,
            "scrollY": true,
            "scrollX": true,
            "searching": false,
            "select": false,
            "bLengthChange": false,
            "scrollCollapse": true,
            "bPaginate": true,
            "bInfo": true,
            "bSort": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {},
            "ajax": {
                "url": "<?php echo site_url('saldo/list_saldo'); ?>",
                "type": "POST",
                "data": {
                    'keyword': keyword,
                },
                "error": function(request) {
                    // alert(request.responseText);
                    swal("Terjadi kesalahan! Coba reload halaman :')", {
                        icon: "error"
                    });
                    console.log(request.responseText);
                }
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }, ],
        });
    }

    function func_add() {
        $('#modalAdd').modal('show');
    }

    // function func_edit(id_kategori, keterangan, note, aktif) {
    //     $('#modalEdit').modal('show');
    //     $('#id_kategori').val(id_kategori);
    //     $('#edit_keterangan').val(keterangan);
    //     $('#edit_note').val(note);
    //     $('#edit_aktif').val(aktif);
    //     // console.log(id_kategori, keterangan, note, aktif);
    // }
    function rpFunc() {
        var saldo = $('#saldo').val();
        var ntRp = $('#nt_rp').val();
        $('#lb_rp').text('IDR ' + saldo * ntRp);
    }

    function rlFunc() {
        var saldo = $('#saldo').val();
        var ntRl = $('#nt_rl').val();
        $('#lb_rl').text('SAR ' + saldo * ntRl);
    }

    function func_add_saldo() {
        var tanggal = $('#tanggal').val();
        var kategori = $('#pilih_kategori option:selected').val();
        var saldo = $('#saldo').val();
        var nt_rp = $('#nt_rp').val();
        var nt_rl = $('#nt_rl').val();
        if (tanggal == '' || tanggal == '' || kategori == '' || saldo == '' || nt_rp == '' || nt_rl == '') {
            swal('Field tidak boleh kosong!', {
                icon: "error"
            });
        } else {
            // console.log(ket, note, aktif);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('saldo/add_saldo'); ?>",
                dataType: "JSON",
                beforeSend: function() {},
                cache: false,
                data: {
                    'tanggal': tanggal,
                    'kategori': kategori,
                    'nt_rp': nt_rp,
                    'nt_rl': nt_rl,
                    'saldo': saldo,
                },
                success: function(data) {
                    console.log(data);
                    if (data == false) {
                        swal('Gagal menambahkan saldo! :(', {
                            icon: 'error'
                        });
                    } else {
                        swal('Saldo berhasil ditambahkan! :)', {
                            icon: 'success'
                        });
                        $('#modalAdd').modal('hide');
                        $('#tanggal').val();
                        $('#pilih_kategori option:selected').val();
                        $('#keterangan').val();
                        $('#saldo').val();
                        $('#nt_rp').val();
                        $('#nt_rl').val();
                        // list_kategori('');
                    }
                },
                error: function(request) {
                    swal("Terjadi kesalahan! Coba reload halaman :')", {
                        icon: "error"
                    });
                    console.log(request.responseText);
                }
            });
        }
    }

    function func_edit_ket() {
        var id_kategori = $('#id_kategori').val();
        var ket = $('#edit_keterangan').val();
        var note = $('#edit_note').val();
        var aktif = $('#edit_aktif option:selected').val();
        // console.log(id_kategori, ket, note, aktif);
        if (ket == '' || note == '') {
            swal('Field tidak boleh kosong!', {
                icon: "error"
            });
        } else {
            // console.log(ket, note, aktif);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('kategori/edit_kategori'); ?>",
                dataType: "JSON",
                beforeSend: function() {},
                cache: false,
                data: {
                    'id_kategori': id_kategori,
                    'ket': ket,
                    'note': note,
                    'aktif': aktif,
                },
                success: function(data) {
                    console.log(data);
                    if (data == false) {
                        swal('Gagal menambahkan kategori! :(', {
                            icon: 'error'
                        });
                    } else {
                        swal('Kategori berhasil diupdate! :)', {
                            icon: 'success'
                        });
                        $('#modalEdit').modal('hide');
                        $('#keterangan').val('');
                        $('#note').val('');
                        list_kategori('');
                    }
                },
                error: function(request) {
                    swal("Terjadi kesalahan! Coba reload halaman :')", {
                        icon: "error"
                    });
                    console.log(request.responseText);
                }
            });
        }
    }

    function func_del(id_kategori) {
        // console.log(id_kategori);
        swal({
                text: "Anda yakin ingin menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    do_del(id_kategori);
                    swal("Data kategori telah dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data kategori tidak berubah!");
                }
            });
    }

    function do_del(id_kategori) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('kategori/del_kategori'); ?>",
            dataType: "JSON",
            beforeSend: function() {},
            cache: false,
            data: {
                'id_kategori': id_kategori
            },
            success: function(data) {
                swal("Data kategori telah dihapus!", {
                    icon: "success",
                });
                list_kategori('');
            },
            error: function(request) {
                swal("Terjadi kesalahan! Coba reload halaman :')", {
                    icon: "error"
                });
                console.log(request.responseText);
            }
        });
    }
</script>