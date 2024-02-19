<?php
include "header.php";
include "navbar.php";
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <!-- <h3 class="content-header-title mb-0 d-inline-block">Transactions</h3> -->
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a> -->
                  </li>
                  <!-- <li class="breadcrumb-item active">Transactions -->
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-4 col-12 d-none d-md-inline-block">
            <!-- <div class="btn-group float-md-right"><a class="btn-gradient-secondary btn-sm white" href="wallet.html">Buy now</a></div> -->
          </div>
        </div>
        <div class="content-body"><div id="transactions">
     <div class="transactions-table-th d-none d-md-block">
        <div class="col-12">
            <div class="row px-1">
                <div class="col-md-2 col-12 py-1">
                    <!-- <p class="mb-0">Date</p> -->
                </div>
                <div class="col-md-2 col-12 py-1">
                    <!-- <p class="mb-0">Type</p> -->
                </div>
                <div class="col-md-2 col-12 py-1">
                    <!-- <p class="mb-0">Amount</p> -->
                </div>
                <div class="col-md-1 col-12 py-1">
                    <!-- <p class="mb-0">Currency</p> -->
                </div>
                <div class="col-md-2 col-12 py-1">
                    <!-- <p class="mb-0">Tokens (CIC)</p> -->
                </div>
                <div class="col-md-3 col-12 py-1">
                    <!-- <p class="mb-0">Details</p> -->
                </div>
            </div>
        </div>
    </div>
<div class="card mt-2">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						Data Barang
						<?php
						include '../koneksi.php';
						$data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
						$jumlah_produk = mysqli_num_rows($data_produk);
						?>
						<h3><?php echo $jumlah_produk; ?></h3>
						<a href="data_barang.php" class="btn btn-outline-primary btn-sm">Detail</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						Data Pembelian
						<?php
						include '../koneksi.php';
						$data_penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
						$jumlah_penjualan = mysqli_num_rows($data_penjualan);
						?>
						<h3><?php echo $jumlah_penjualan; ?></h3>
						<a href="pembelian.php" class="btn btn-outline-primary btn-sm">Detail</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						Data Pengguna
						<?php
						include '../koneksi.php';
						$data_petugas = mysqli_query($koneksi,"SELECT * FROM petugas");
						$jumlah_petugas = mysqli_num_rows($data_petugas);
						?>
						<h3><?php echo $jumlah_petugas; ?></h3>
						<a href="data_pengguna.php" class="btn btn-outline-primary btn-sm">Detail</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mt-2">
	<div class="card-body">
		<p>Selamat datang dihalaman administrator <?= $_SESSION['username']; ?>, silahkan anda bisa mengakses beberapa fitur</p>
	</div>
</div>
<?php
include "footer.php";
?>