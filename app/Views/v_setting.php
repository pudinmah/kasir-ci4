<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Setting Toko</h3>
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

            <!--  -->
            <?php echo form_open('admin/setting/update') ?>

            <div class="form-group">
                <label for="">Nama Toko</label>
                <input name="nama_toko" value="<?= $setting['nama_toko'] ?>" class="form-control" placeholder="Nama Toko">
            </div>
            <div class="form-group">
                <label for="">Slogan</label>
                <input name="slogan" value="<?= $setting['slogan'] ?>" class="form-control" placeholder="Slogan">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="">No Telepon</label>
                <input name="no_telepon" value="<?= $setting['no_telepon'] ?>" class="form-control" placeholder="Telepon">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" rows="5" class="form-control"><?= $setting['deskripsi'] ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-flat btn-primary">Simpan</button>
            </div>

            <?php echo form_close() ?>

        </div>

    </div>
</div>