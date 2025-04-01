<div class="col-md-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Satuan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->

        <div class="card-body">

        <?php
        if(session()->getFlashdata('pesan')){
            echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('pesan');
                  echo'</h5></div>';

            
        }
        ?>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Satuan</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($satuan as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_satuan'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
                <?php echo form_open('satuan/add') ?>
                
                <div class="modal-body">
                    <div class="form-group"><label for="">Nama Satuan</label>
                        <input name="nama_satuan" class="form-control" placeholder="Satuan" required>
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