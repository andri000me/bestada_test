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
                <div class="col-sm-2">
                    <input type="text" id="cari" placeholder="Cari" onkeydown="cariFunc()" onkeyup="cariFunc()" class="col-xs-10 col-sm-12" />
                </div>
                <div class="col-sm-9">
                    <div class="col-sm-3">
                        <select class="form-control" id="aktif"></select>
                    </div>
                    <button type="button" class="btn btn-info btn-sm" onclick="filterFunc()">
                        <i class="ace-icon fa fa-filter bigger-110"></i>Filter
                    </button>
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
                        <table id="tb_pengeluaran" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Total</th>
                                    <th>Lampiran</th>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Input Data Pengeluaran</h5>
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
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="keterangan" placeholder="Masukkan Keterangan" class="col-xs-10 col-sm-9" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total </label>
                                        <div class="col-sm-9">
                                            <input type="number" id="total" placeholder="Masukkan Total" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lampiran </label>
                                        <div class="col-sm-9">
                                            <input type="file" id="lampiran" placeholder="Masukkan Lampiran" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="func_add_pengeluaran()" class="btn btn-primary btn-md">Save data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal edit kategori -->
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Data Pengeluaran</h5>
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
                                                <input class="form-control date-picker" id="edit_tanggal" type="text" data-date-format="dd-mm-yyyy" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar bigger-110"></i>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="edit_pilih_kategori"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                        <div class="col-sm-9">
                                            <input type="hidden" id="id_pengeluaran" placeholder="Masukkan Keterangan" class="col-xs-10 col-sm-9" required>
                                            <input type="text" id="edit_keterangan" placeholder="Masukkan Keterangan" class="col-xs-10 col-sm-9" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Total </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="edit_total" placeholder="Masukkan Total" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lampiran </label>
                                        <div class="col-sm-9">
                                            <input type="file" id="edit_lampiran" placeholder="Masukkan Lampiran" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="func_edit_pengeluaran()" class="btn btn-primary btn-md">Save update</button>
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
        var kategori = 'Operasional';
        list_kategori();
        list_pengeluaran(keyword, kategori);
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
        var kategori = $('#aktif').val();
        list_pengeluaran(keypad, kategori);
    }

    function filterFunc() {
        var keypad = $('#cari').val();
        var kategori = $('#aktif').val();
        list_pengeluaran(keypad, kategori);
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
                    $('#aktif').append(opsi_cmb_kategori);
                });
                // tableKontrak();
            },
            error: function(request) {
                console.log(request.responseText);
            }
        });
    }

    function list_pengeluaran(keyword, kategori) {
        $('#tb_pengeluaran').dataTable().fnDestroy();
        $('#tb_pengeluaran').dataTable({
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
                "url": "<?php echo site_url('pengeluaran/list_pengeluaran'); ?>",
                "type": "POST",
                "data": {
                    'keyword': keyword,
                    'kategori': kategori
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
        $('#pilih_kategori').find('option')
            .remove()
            .end()
            .append('')
            .val('whatever');
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
        var kategori = $('#pilih_kategori').val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('pengeluaran/cek_sisa_saldo'); ?>",
            dataType: "JSON",
            beforeSend: function() {},
            cache: false,
            data: {
                'kategori': kategori
            },
            success: function(data) {
                console.log('Ok');
                console.log(data);

                // tableKontrak();
            },
            error: function(request) {
                console.log(request.responseText);
            }
        });
    }

    function func_edit(id_pengeluaran, tanggal, keterangan, total, kategori) {
        $('#modalEdit').modal('show');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('pengeluaran/list_kategori'); ?>",
            dataType: "JSON",
            beforeSend: function() {},
            cache: false,
            data: '',
            success: function(data) {
                $.each(data, function(index) {
                    if (kategori == data[index].keterangan) {
                        var opsi_cmb_kategori = '<option value="' + data[index].keterangan + '" selected>' + data[index]
                            .keterangan + '</option>';
                    } else {
                        var opsi_cmb_kategori = '<option value="' + data[index].keterangan + '" >' + data[index]
                            .keterangan + '</option>';
                    }
                    $('#edit_pilih_kategori').append(opsi_cmb_kategori);
                });
                // tableKontrak();
            },
            error: function(request) {
                console.log(request.responseText);
            }
        });
        $('#id_pengeluaran').val(id_pengeluaran);
        $('#edit_tanggal').val(tanggal);
        $('#edit_keterangan').val(keterangan);
        $('#edit_total').val(total);
        // $('#edit_pilih_kategori').val(kategori);
    }

    function func_add_pengeluaran() {
        const lampiran = $('#lampiran').prop('files')[0];
        let formData = new FormData();
        formData.append('lampiran', lampiran);
        formData.append('tanggal', $('#tanggal').val());
        formData.append('keterangan', $('#keterangan').val());
        formData.append('total', $('#total').val());
        formData.append('pilih_kategori', $('#pilih_kategori option:selected').val());
        if (tanggal == '' || keterangan == '' || total == '' || lampiran == null || pilih_kategori == '') {
            swal('Field tidak boleh kosong!', {
                icon: "error"
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('pengeluaran/add_pengeluaran'); ?>",
                dataType: "JSON",
                beforeSend: function() {},
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    console.log(data);
                    if (data == false) {
                        swal('Gagal menambahkan kategori! :(', {
                            icon: 'error'
                        });
                    } else {
                        swal('Kategori berhasil ditambahkan! :)', {
                            icon: 'success'
                        });
                        $('#modalAdd').modal('hide');
                        $('#keterangan').val('');
                        $('#note').val('');
                        list_pengeluaran('', 'Operasional');
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

    function func_edit_pengeluaran() {
        const lampiran = $('#edit_lampiran').prop('files')[0];
        let formData = new FormData();
        formData.append('id_pengeluaran', $('#id_pengeluaran').val());
        formData.append('edit_lampiran', lampiran);
        formData.append('edit_tanggal', $('#edit_tanggal').val());
        formData.append('edit_keterangan', $('#edit_keterangan').val());
        formData.append('edit_total', $('#edit_total').val());
        formData.append('edit_pilih_kategori', $('#edit_pilih_kategori option:selected').val());
        if (edit_tanggal == '' || edit_keterangan == '' || edit_total == '' || edit_pilih_kategori == '') {
            swal('Field tidak boleh kosong!', {
                icon: "error"
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('pengeluaran/edit_pengeluaran'); ?>",
                dataType: "JSON",
                beforeSend: function() {},
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    console.log(data);
                    if (data == false) {
                        swal('Gagal menambahkan pengeluaran! :(', {
                            icon: 'error'
                        });
                    } else {
                        swal('Pengeluaran berhasil diupdate! :)', {
                            icon: 'success'
                        });
                        $('#modalEdit').modal('hide');
                        $('#edit_keterangan').val('');
                        $('#edit_tanggal').val('');
                        $('#edit_total').val('');
                        list_pengeluaran('', 'Operasional');
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

    function func_del(id_pengeluaran, lampiran) {
        // console.log(id_pengeluaran);
        swal({
                text: "Anda yakin ingin menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    do_del(id_pengeluaran, lampiran);
                    swal("Data pengeluaran telah dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data pengeluaran tidak berubah!");
                }
            });
    }

    function do_del(id_pengeluaran, lampiran) {
        // console.log(id_pengeluaran, lampiran);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('pengeluaran/del_pengeluaran'); ?>",
            dataType: "JSON",
            beforeSend: function() {},
            cache: false,
            data: {
                'id_pengeluaran': id_pengeluaran,
                'lampiran': lampiran
            },
            success: function(data) {
                swal("Data pengeluaran telah dihapus!", {
                    icon: "success",
                });
                list_pengeluaran('', 'Operasional');
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