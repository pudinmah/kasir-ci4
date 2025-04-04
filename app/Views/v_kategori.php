<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Kategori</h3>

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

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Kategori</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_kategori'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_kategori'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_kategori'] ?>"><i class="fas fa-trash-alt"></i></button>
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
            <?php echo form_open('kategori/add') ?>

            <div class="modal-body">
                <div class="form-group"><label for="">Nama Kategori</label>
                    <input name="nama_kategori" class="form-control" placeholder="Kategori" required>
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
<?php foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_kategori'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo form_open('kategori/update/' . $value['id_kategori']) ?>
                <div class="modal-body">
                    <!-- Input Hidden untuk ID Kategori -->
                    <input type="hidden" name="id_kategori" value="<?= $value['id_kategori'] ?>">

                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="nama_kategori" value="<?= $value['nama_kategori'] ?>" class="form-control" placeholder="Kategori" required>
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
<?php foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_kategori'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Apakah Anda Yakin Hapus ? <b><?= $value['nama_kategori'] ?></b>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kategori/delete/' . $value['id_kategori']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php } ?>