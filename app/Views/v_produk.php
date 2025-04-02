<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Produk</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <table id="example1" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="text-center">
                                <label><?= $value['kode_produk'] ?></label>
                            </td>
                            <td class="text-center">
                                <label><?= $value['nama_produk'] ?></label>
                            </td>
                            <td class="text-center">
                                <label><?= $value['nama_kategori'] ?></label>
                            </td>
                            <td class="text-center">
                                <label><?= $value['nama_satuan'] ?></label>
                            </td>
                            <td class="text-right">
                                Rp. <label><?= number_format($value['harga_beli']) ?></label>
                            </td>
                            <td class="text-right">
                                Rp. <label><?= number_format($value['harga_jual']) ?></label>
                            </td>
                            <td class="text-center">
                                <label><?= $value['stok'] ?></label>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_produk'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_produk'] ?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('produk/add') ?>

            <div class="modal-body">
                <div class="form-group"><label for="">Nama Produk</label>
                    <input name="nama_produk" class="form-control" placeholder="Produk" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo form_open('produk/update/' . $value['id_produk']) ?>
                <div class="modal-body">
                    <!-- Input Hidden untuk ID Produk -->
                    <input type="hidden" name="id_produk" value="<?= $value['id_produk'] ?>">

                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama_produk" value="<?= $value['nama_produk'] ?>" class="form-control" placeholder="Produk" required>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-flat">Save</button>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Delete Modal -->
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Apakah Anda Yakin Hapus ? <b><?= $value['nama_produk'] ?></b>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('produk/delete/' . $value['id_produk']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

<script>
    // DataTable
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>