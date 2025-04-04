<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= BASE_URL('ADMINLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL('ADMINLTE') ?>/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= BASE_URL('ADMINLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= BASE_URL('ADMINLTE') ?>/index3.html" class="navbar-brand">
                    <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart text-primary"></i><b> Transaksi Penjualan</b></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item dropdown">
                        <?php if (session()->get('level') == '1') { ?>
                            <a class="nav-link text-primary" href="<?= base_url('admin/dashboad') ?>">
                                <i class="fas fa-tachometer-alt "></i> Dashboard
                            </a>
                        <?php } else { ?>
                            <a class="nav-link text-primary" href="<?= base_url('logout') ?>">
                                <i class="fas fa-sign-in-alt "></i> Logout
                            </a>
                        <?php } ?>

                    </li>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">No Faktur</label>
                                            <label class="form-control form-control-lg text-danger"><?= $no_faktur ?></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">Tanggal</label>
                                            <label class="form-control form-control-lg"><?= date('d M Y') ?></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">Jam</label>
                                            <label class="form-control form-control-lg"><?= date('13:00:00') ?></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">Kasir</label>
                                            <label class="form-control form-control-lg"><?= session()->get('nama_user') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0"></h5>
                            </div>
                            <div class="card-body bg-black color-palette text-right">
                                <label class="display-4 text-green">Rp. 1,500,500,-</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <?php echo form_open() ?>
                                    <div class="row">
                                        <div class="col-2 input-group">
                                            <input name="kode_produk" id="kode_produk" class="form-control" placeholder="Barcode/Kode Produk" autocomplete="off">
                                            <span class="input-group-append">
                                                <button class="btn btn-primary btn-flat">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <span class="input-group-append">
                                                    <button class="btn btn-danger btn-flat">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="col-3">
                                            <input name="nama_produk" class="form-control" placeholder="Nama Pro" readonly>
                                        </div>
                                        <div class="col-1">
                                            <input name="nama_kategori" class="form-control" placeholder="Kategori" readonly>
                                        </div>
                                        <div class="col-1">
                                            <input name="nama_satuan" class="form-control" placeholder="Satuan" readonly>
                                        </div>
                                        <div class="col-1">
                                            <input name="nama_jual" class="form-control" placeholder="Harga" readonly>
                                        </div>
                                        <div class="col-1">
                                            <input id="qty" name="qty" type="number" min="1" value="1" class="form-control text-center" placeholder="QTY">
                                        </div>

                                        <div class="col-3">
                                            <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-cart-plus"> Add</i></button>
                                            <button type="reset" class="btn btn-flat btn-warning"><i class="fas fa-sync"></i> Clear</button>
                                            <button class="btn btn-flat btn-success"><i class="fas fa-cash-register"> Pembayaran</i></button>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Kode/Barcode</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga Jual</th>
                                                <th width="100px">Qty</th>
                                                <th>Total Harga</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>11111111111</td>
                                                <td>Sari Roti</td>
                                                <td>Makanan</td>
                                                <td class="text-right">@ Rp. 15,000,-</td>
                                                <td class="text-center">2 PCS</td>
                                                <td class="text-right">Rp. 30,000,-</td>
                                                <td class="text-center">
                                                    <a class="btn btn-flat btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0"></h5>
                        </div>
                        <div class="card-body bg-black color-palette text-center">
                            <h1 class="text-warning">Satu Juta Lima Ratus Ribu Lima Ratus Rupiah</h1>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content -->
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <script>
        $(document).ready(function() {
            $('#kode_produk').focus();
            $('#kode_produk').keydown(function(e) {
                let kode_produk = $('#kode_produk').val();
                if (e.keyCode == 13) {
                    e.preventDefault();
                    if (kode_produk == '') {
                        // alert('kosong');
                        Swal.fire('Kode Produk Belum Diinput !!!');
                    } else {
                        // alert('oke');
                        CekProduk();
                    }
                }
            });

            function CekProduk() {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('penjualan/cekproduk') ?>",
                    data: {
                        kode_produk: $('#kode_produk').val()
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.nama_produk == '') {
                            Swal.fire('Kode Produk Tidak Terdaftar Di Database !!!');
                        } else {
                            // alert('oke bro');
                            $('[name="nama_produk"').val(response.nama_produk);
                            $('[name="nama_kategori"').val(response.nama_kategori);
                            $('[name="nama_satuan"').val(response.nama_satuan);
                            $('[name="nama_jual"').val(response.nama_jual);
                            $('#qty').focus();
                        }
                    }
                });
            }
        });
    </script>


</body>

</html>