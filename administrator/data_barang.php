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
		<a href = "tambah_barang.php" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
			Tambah Data
</a>
	</div>
	<div class="card-body">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="simpan"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Simpan
				</div>
			<?php } ?>
			<?php if($_GET['pesan']=="update"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Update
				</div>
			<?php } ?>
			<?php if($_GET['pesan']=="hapus"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Hapus
				</div>
			<?php } ?>
			<?php 
		}
		?>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include '../koneksi.php';
				$no = 1;
				$data = mysqli_query($koneksi,"select * from produk");
				while($d = mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['NamaProduk']; ?></td>
						<td>Rp. <?php echo $d['Harga']; ?></td>
						<td><?php echo $d['Stok']; ?></td>
						<td> <img src ="<?="../assets/img/" . $d['Poster'];?>" width = "145" height = "160"></td>
						<td>
							<a type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" href="edit_barang.php?id=<?php echo $d['ProdukID'];?>">
								Edit
				</a>
						<a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" href="proses_hapus_barang.php?id=<?=$d['ProdukID'];?>">
hapus
				</a>
						</td>
					</tr>

					<!-- Modal Edit Data-->
					<div class="modal fade" id="edit-data<?php echo $d['ProdukID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form action="proses_update_barang.php" method="post">
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Produk</label>
											<input type="hidden" name="ProdukID" value="<?php echo $d['ProdukID']; ?>">
											<input type="text" name="NamaProduk" class="form-control" value="<?php echo $d['NamaProduk']; ?>">
										</div>
										<div class="form-group">
											<label>Harga Produk</label>
											<input type="number" name="Harga" class="form-control" value="<?php echo $d['Harga']; ?>">
										</div>
										<div class="form-group">
											<label>Stok Produk</label>
											<input type="number" name="Stok" class="form-control" value="<?php echo $d['Stok']; ?>">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal Hapus Data-->
					<div class="modal fade" id="hapus-data<?php echo $d['ProdukID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form method="post" action="proses_hapus_barang.php">
									<div class="modal-body">
										<input type="hidden" name="ProdukID" value="<?php echo $d['ProdukID']; ?>">
										Apakah anda yakin akan menghapus data <b><?php echo $d['NamaProduk']; ?></b>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Hapus</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="proses_simpan_barang.php" method="post">
				<div class="modal-body">				
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="NamaProduk" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga Produk</label>
						<input type="number" name="Harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Stok Produk</label>
						<input type="number" name="Stok" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>