<?php
include "header.php";
include "navbar.php";
?>
<!-- <div class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div> -->
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
			<form action="proses_update_barang.php" method="post" class="user" enctype="multipart/form-data">
      <?php 
				include '../koneksi.php';
				$no = 1;
        $id = $_GET['id'];
				$data = mysqli_query($koneksi,"SELECT * from produk where ProdukID = '$id'");
				while($d = mysqli_fetch_array($data)){
					?>
				<div class="modal-body">				
					<div class="form-group">
						<label>Nama Produk</label>
            
						<input type="text" name="ProdukID" class="form-control" value="<?php echo $d['ProdukID']; ?>" hidden>
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
                    <div class="form-group">
						<label>Foto Produk</label>
						<input type="file" name="photo" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
        <?php } ?>
			</form>
		<!-- </div>
	</div>
</div> -->
<?php
include "footer.php";
?>