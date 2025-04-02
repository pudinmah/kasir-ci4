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

            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <h4>Periksa Lagi Entry Form !!</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

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
                <div class="form-group">
                    <label for="">Kode Produk</label>
                    <input name="kode_produk" value="<?= old('kode_produk') ?>" class="form-control" placeholder="kode_produk" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" value="<?= old('nama_produk') ?>" class="form-control" placeholder="nama produk" required>
                </div>

                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control">
                        <option value="">--Pilih Satuan--</option>
                        <?php foreach ($satuan as $key => $value) { ?>
                            <option value="<?= $value['id_satuan'] ?>"><?= $value['nama_satuan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_beli" id="harga_beli" value="<?= old('harga_beli') ?>" class="form-control" placeholder="harga beli" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_jual" id="harga_jual" value="<?= old('harga_jual') ?>" class="form-control" placeholder="harga jual" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input name="stok" type="number" value="<?= old('stok') ?>" class="form-control" placeholder="stok" required>
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

                <!-- Input Hidden untuk ID produk -->
                <input type="hidden" name="id_produk" value="<?= $value['id_produk'] ?>">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Produk</label>
                        <input name="kode_produk" value="<?= $value['kode_produk'] ?>" class="form-control" placeholder="kode_produk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input name="nama_produk" value="<?= $value['nama_produk'] ?>" class="form-control" placeholder="nama produk" required>
                    </div>

                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>" <?= $value['id_kategori'] == $k['id_kategori'] ? 'Selected' : '' ?>>
                                    <?= $k['nama_kategori'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Satuan</label>
                        <select name="id_satuan" class="form-control">
                            <option value="">--Pilih Satuan--</option>
                            <?php foreach ($satuan as $key => $s) { ?>
                                <option value="<?= $s['id_satuan'] ?>" <?= $value['id_satuan'] == $s['id_satuan'] ? 'Selected' : '' ?>>
                                    <?= $s['nama_satuan'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Beli</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input name="harga_beli" id="harga_beli<?= $value['id_produk'] ?>" value="<?= $value['harga_beli'] ?>" class="form-control" placeholder="harga beli" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Jual</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input name="harga_jual" id="harga_jual<?= $value['id_produk'] ?>" value="<?= $value['harga_jual'] ?>" class="form-control" placeholder="harga jual" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input name="stok" type="number" value="<?= $value['stok'] ?>" class="form-control" placeholder="stok" required>
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
    // AutoNumeric
    new AutoNumeric('#harga_beli', {
        decimalPlaces: 0,
    });
    new AutoNumeric('#harga_jual', {
        decimalPlaces: 0,
    });

    // Edit AutoNumeric
    <?php foreach ($produk as $key => $value) { ?>
        new AutoNumeric('#harga_beli<?= $value['id_produk'] ?>', {
            decimalPlaces: 0,
        });
        new AutoNumeric('#harga_jual<?= $value['id_produk'] ?>', {
            decimalPlaces: 0,
        });
    <?php } ?>

</script>