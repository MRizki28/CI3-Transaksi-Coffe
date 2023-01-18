<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="card-body card-block">
<form action="<?= site_url('pembelian_controller/simpan') ?>" method="post">
            <?php if (isset($pembelian)) { ?>
                <input type="hidden" name="id_pembelian" value="<?= $pembelian['id_pembelian'] ?>">
                <div class="w-100 d-flex flex-column gap-2">
                    <div class="form-group w-100">
                        <label for="id_coffe">Coffe Name</label>
                        <select name="id_coffe" class="form-select">
                            <option value="">- select Coffe -</option>
                            <?php foreach ($produks as $produk) { ?>
                                <option value="<?php echo $prd[$produk['id']] = $produk['id'] ?>"><?php echo $prd[$produk['id']] = $produk['nama_coffe'] ?></option>
                            <?php } ?>
                        </select>
                        <small class="text-danger"><?= form_error('id_coffe') ?></small>
                    </div>
                    <div class="form-group w-100">
                        <label for="nama_pembeli">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli"  class="form-control">
                        <small class="text-danger"><?= form_error('nama_pembeli') ?></small>
                    </div>
                    <div class="form-group w-100">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" placeholder="0" class="form-control">
                        <small class="text-danger"><?= form_error('jumlah') ?></small>
                    </div>
                   
                    <div class="d-flex align-items-end">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            <?php } ?>
        </form>

        <div class="mt-4">
			<div class="d-flex">
				<b class="w-25 ms-2">No</b>
				<b class="w-100">Coffe</b>
				<b class="w-100">Nama Pembeli</b>
				<b class="w-100">Price</b>
				<b class="w-100">Count</b>
				<b class="w-100">Total Price</b>
				<b class="w-100">Action</b>
			</div>
            <?php 
            $index = 1;
            $total = 0;
            foreach ($detilss as $det) { ?>
                <div class="d-flex align-items-center table-list">
                    <p class="w-25 pt-2"><?= $index ?>.</p>
                    <p class="w-100 pt-2"><?= $det['nama_coffe'] ?></p>
                    <p class="w-100 pt-2"><?= $det['nama_pembeli'] ?></p>
                    <p class="w-100 pt-2">Rp. <?= $det['harga'] ?></p>
                    <p class="w-100 pt-2"><?= $det['jumlah'] ?></p>
                    <p class="w-100 pt-2">Rp. <?= $det['harga'] * $det['jumlah'] ?></p>
                    <div class="w-100">
                        <a href="<?= site_url('pembelian_controller/hapus/' . $det['id_detail_pembelian']) ?>" class="text-danger hover-btn">
							<i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php 
                $total += $det['harga'] * $det['jumlah']; 
                $index++; 
                } 
            ?>
            <div class="d-flex align-items-center table-list mt-4">
                <p class="w-25 pt-2"></p>
                <p class="w-100 pt-2"></p>
                <p class="w-100 pt-2"></p>
                <p class="w-100 pt-2">Total Pay :</p>
                <p class="w-100 pt-2"><b>Rp. <?php echo $total; ?></b></p>
                <div class="w-100"></div>
            </div>
		</div>
