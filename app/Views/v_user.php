<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">User</h3>

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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td>
                                <label><?= $no++ ?></label>
                            </td>
                            <td class="text-center">
                                <label><?= $value['nama_user'] ?></label>
                            </td>
                            <td class="text-center">
                                <label><?= $value['email'] ?></label>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($value['level'] == 1) { ?>
                                    <span class="badge bg-success">Admin</span>
                                <?php } else { ?>
                                    <span class="badge bg-warning">User</span>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_user'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_user'] ?>"><i class="fas fa-trash-alt"></i></button>
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

            <?php echo form_open('user/add') ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="user" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" class="form-control" placeholder="email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-controll">
                        <option value="1">Admin</option>
                        <option value="2" selected>Kasir</option>
                    </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo form_open('user/update/' . $value['id_user']) ?>
                <div class="modal-body">
                    <!-- Input Hidden untuk ID User -->
                    <input type="hidden" name="id_user" value="<?= $value['id_user'] ?>">

                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="User">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" class="form-control" value="<?= $value['email'] ?>" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" class="form-control" value="<?= $value['password'] ?>" placeholder="password" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control">
                            <option value="1" <?= $value['level'] == 1 ? 'Selected' : '' ?> >Admin</option>
                            <option value="2" <?= $value['level'] == 2 ? 'Selected' : '' ?> >Kasir</option>
                        </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Apakah Anda Yakin Hapus ? <b><?= $value['nama_user'] ?></b>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" type="submit" class="btn btn-danger btn-flat">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php } ?>