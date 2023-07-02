<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../config/config.php");
include('session.php');

$kategori = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_kategori_produk');
$row_kategori = mysqli_fetch_assoc($kategori);

$produk = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_produk');
$row_produk = mysqli_fetch_assoc($produk);

$users = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_users');
$row_users = mysqli_fetch_assoc($users);

$customer = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_customer');
$row_customer = mysqli_fetch_assoc($customer);

$transaksi = mysqli_query($mysqli, 'SELECT COUNT(*) AS jml FROM tb_penjualan');
$row_transaksi = mysqli_fetch_assoc($transaksi);

// Query untuk mengambil data penjualan berdasarkan tanggal
$query = "SELECT DATE(tanggal_penjualan) AS tanggal, COUNT(*) AS total FROM tb_penjualan GROUP BY DATE(tanggal_penjualan) ORDER BY tanggal_penjualan ASC";
$result = mysqli_query($mysqli, $query);

// Menginisialisasi array data untuk grafik
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tanggal = $row['tanggal'];
    $total = $row['total'];
    $data[] = ["tanggal" => $tanggal, "total" => $total];
}

// Mengkonversi array data ke dalam format JSON
$jsonData = json_encode($data);
?>

<?php
// Query untuk mengambil data pengunjung berdasarkan tanggal
$query = "SELECT DATE(waktu_access) AS tanggal, COUNT(*) AS total FROM tb_pengunjung GROUP BY DATE(waktu_access) ORDER BY tanggal ASC";
$result = mysqli_query($mysqli, $query);

// Menginisialisasi array data untuk grafik
$data_pengunjung = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tanggal = $row['tanggal'];
    $total = $row['total'];
    $data_pengunjung[] = ["tanggal" => $tanggal, "total" => $total];
}

// Mengkonversi array data_pengunjung ke dalam format JSON
$jsonDataPengunjung = json_encode($data_pengunjung);
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $row_users['jml'] ?></h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=users" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $row_customer['jml'] ?></h3>
                        <p>Customer</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=customer" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $row_produk['jml'] ?><sup style="font-size: 20px"></sup></h3>
                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=produk" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $row_kategori['jml'] ?></h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=kategori_produk" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?= $row_transaksi['jml'] ?></h3>
                        <p>Data Penjualan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=transaksi" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Jumlah Penjualan per Tanggal</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Pengunjung</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="visitor-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
</div> 

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Initialize the chart -->
<script>
    var jsonData = <?php echo $jsonData; ?>;
    var labels = [];
    var data = [];

    jsonData.forEach(function(item) {
        labels.push(item.tanggal);
        data.push(item.total);
    });

    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Penjualan',
                data: data,
                backgroundColor: 'rgba(0,123,255,0.8)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
    
  

    var jsonDataPengunjung = <?php echo $jsonDataPengunjung; ?>;
var labelsPengunjung = [];
var dataPengunjung = [];

jsonDataPengunjung.forEach(function(item) {
    labelsPengunjung.push(item.tanggal);
    dataPengunjung.push(item.total);
});

var visitorCtx = document.getElementById('visitor-chart').getContext('2d');
var visitorChart = new Chart(visitorCtx, {
    type: 'line',
    data: {
        labels: labelsPengunjung,
        datasets: [{
            label: 'Pengunjung',
            data: dataPengunjung,
            backgroundColor: 'rgba(0,123,255,0.8)',
            borderColor: 'rgba(0,123,255,1)',
            borderWidth: 2,
            pointBackgroundColor: 'rgba(0,123,255,1)',
            pointRadius: 4,
            pointHoverRadius: 6,
            pointHitRadius: 6,
            pointBorderWidth: 2,
            fill: false
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                precision: 0
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

    
    
</script>
