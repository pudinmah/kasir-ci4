<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>

            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="fas fa-boxes"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="fas fa-th-list"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>44</h3>

            <p>Satuan</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3>65</h3>

            <p>User</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->


<!-- Info Boxes-->
<div class="col-md-4">
    <div class="info-box mb-3 bg-indigo">
        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Incom Harian</span>
            <span class="info-box-number">Rp.5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <div class="info-box mb-3 bg-primary">
        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Incom Bulanan</span>
            <span class="info-box-number">Rp.5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <div class="info-box mb-3 bg-fuchsia">
        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Incom Tahunan</span>
            <span class="info-box-number">Rp.5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>


<div class="col-md-12">
    <canvas id="myChart"  width="400" height="100"></canvas>
</div>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1,
                borderColor: '#36A2EB',
                backgroundColor: '#9BD0F5',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>