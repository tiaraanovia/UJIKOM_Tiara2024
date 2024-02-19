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
		
		<?php 
		include '../koneksi.php';
		$PelangganID = $_GET['PelangganID'];
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
		while($d = mysqli_fetch_array($data)){
			?>
			<?php if ($d['PelangganID'] == $PelangganID) { ?>
				<table>
					<tr>
						<td>ID Pelanggan</td>
						<td>: <?php echo $d['PelangganID']; ?></td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td>: <?php echo $d['NamaPelanggan']; ?></td>
					</tr>
					<tr>
						<td>No. Telepon</td>
						<td>: <?php echo $d['NomorTelepon']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?php echo $d['Alamat']; ?></td>
					</tr>
					<tr>
						<td>Total Pembelian</td>
						<td>: Rp. <?php echo $d['TotalHarga']; ?></td>
					</tr>
				</table>
				<form method="post" action="tambah_detail_penjualan.php">
					<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
					<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
					<button type="submit" class="btn btn-primary btn-sm mt-2">
						Tambah Barang
					</button>
				</form>
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include '../koneksi.php';
						$nos = 1;
						$detailpenjualan = mysqli_query($koneksi,"SELECT * FROM detailpenjualan");
						while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
							?>
							<?php 
							if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
								<tr>
									<td><?php echo $nos++; ?></td>
									<td>
										<form action="simpan_barang_beli.php" method="post">
											<div class="form-group">
												<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
												<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
												<select name="ProdukID" class="form-control" onchange="this.form.submit()">
													<option>--- Pilih Produk ---</option>
													<?php 
													include '../koneksi.php';
													$no = 1;
													$produk = mysqli_query($koneksi,"SELECT * FROM produk");
													while($d_produk = mysqli_fetch_array($produk)){
														?>
														<option value="<?php echo $d_produk['ProdukID']; ?>" <?php if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { echo "selected"; } ?>><?php echo $d_produk['NamaProduk']; ?></option>
													<?php } ?>
												</select>
											</div>
										</form>
									</td>
									<td>
										<form method="post" action="hitung_subtotal.php">
											<?php 
											include '../koneksi.php';
											$produk = mysqli_query($koneksi,"SELECT * FROM produk");
											while($d_produk = mysqli_fetch_array($produk)){
												?>
												<?php 
												if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { ?>
													<input type="text" name="Harga" value="<?php echo $d_produk['Harga']; ?>" hidden>
													<input type="text" name="ProdukID" value="<?php echo $d_produk['ProdukID']; ?>" hidden>
													<input type="text" name="Stok" value="<?php echo $d_produk['Stok']; ?>" hidden>
													<?php 
												}
											}
											?>
											<div class="form-group">
												<input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" class="form-control">
											</div>
										</td>
										<td><?php echo $d_detailpenjualan['Subtotal']; ?></td>
										<td>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<button type="submit" class="btn btn-warning btn-sm">Proses</button>
										</form>
										<form method="post" action="hapus_detail_pembelian.php">
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
										</form>
									</td>
								</tr>
							<?php } else {
								?>
								<?php 
							}
						} 
						?>
					</tbody>
				</table>
				<form method="post" action="simpan_total_harga.php">
					<?php 
					include '../koneksi.php';
					$detailpenjualan = mysqli_query($koneksi, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE 	PenjualanID='$d[PenjualanID]'"); 
					$row = mysqli_fetch_assoc($detailpenjualan); 
					$sum = $row['TotalHarga'];
					?>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="TotalHarga" value="<?php echo $sum; ?>">
								<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
								<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<button class="btn btn-info btn-sm form-control" type="submit">Simpan</button>
							</div>
						</div>
					</div>
				</form>
			<?php } else { ?>
				<?php 
			} 
		} 
		?>		
	</div>
</div>

<?php
include "footer.php";
?>