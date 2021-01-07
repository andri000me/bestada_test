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
                        <table id="tb_kategori" class="table table-bordered table-hover" width="100%">
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="keterangan" placeholder="Masukkan Keterangan" class="col-xs-10 col-sm-9" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Note </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="note" placeholder="Masukkan Note" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Aktif </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="aktif">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="func_add_ket()" class="btn btn-primary btn-md">Save data</button>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
                                        <div class="col-sm-9">
                                            <input type="hidden" id="id_kategori" placeholder="Masukkan Keterangan" class="col-xs-10 col-sm-9" required>
                                            <input type="text" id="edit_keterangan" placeholder="Masukkan Keterangan" class="col-xs-10 col-sm-9" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Note </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="edit_note" placeholder="Masukkan Note" class="col-xs-10 col-sm-9" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Aktif </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="edit_aktif">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="func_edit_ket()" class="btn btn-primary btn-md">Save update</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        var keyword = '';
        list_kategori(keyword);
    });

    function cariFunc() {
        var keypad = $('#cari').val();
        list_kategori(keypad);
    }

    function list_kategori(keyword) {
        console.log('tes');
        $('#tb_kategori').dataTable().fnDestroy();
        $('#tb_kategori').dataTable({
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
                "url": "<?php echo site_url('kategori/list_kategori'); ?>",
                "type": "POST",
                "data": {
                    'keyword': keyword
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

    function func_edit(id_kategori, keterangan, note, aktif) {
        $('#modalEdit').modal('show');
        $('#id_kategori').val(id_kategori);
        $('#edit_keterangan').val(keterangan);
        $('#edit_note').val(note);
        $('#edit_aktif').val(aktif);
        // console.log(id_kategori, keterangan, note, aktif);
    }

    function func_add_ket() {
        var ket = $('#keterangan').val();
        var note = $('#note').val();
        var aktif = $('#aktif option:selected').val();
        if (ket == '' || note == '') {
            swal('Field tidak boleh kosong!', {
                icon: "error"
            });
        } else {
            // console.log(ket, note, aktif);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('kategori/add_kategori'); ?>",
                dataType: "JSON",
                beforeSend: function() {},
                cache: false,
                data: {
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
                        swal('Kategori berhasil ditambahkan! :)', {
                            icon: 'success'
                        });
                        $('#modalAdd').modal('hide');
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