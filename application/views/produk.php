<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Navbar</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php
echo form_open(site_url('produk/simpan'));
if (isset($produk)) {
	echo form_input(['name'=>'id', 'hidden'=>'true' , 'value' => $produk['id']]);
	echo "</br>". form_input(['name'=>'namaproduk', 'value' => $produk['namaproduk'], 'placeholder'=>'nama barang' ,'class'=>'form-control']);
	echo form_error('namaproduk');
	echo "</br>". form_input(['name'=>'barcode', 'value' => $produk['barcode'], 'placeholder'=>'barcode' ,'class'=>'form-control']);
	echo form_error('barcode');
	echo "</br>". form_submit(['name'=>'update', 'value'=>'simpan','class'=>'btn btn-primary']);
} else {
	echo form_input(['name'=>'namaproduk', 'placeholder'=>'nama barang' ,'class'=>'form-control']);
	echo form_error('namaproduk');
	echo '</br>'.form_input(['name'=>'barcode', 'placeholder'=>'barcode','class'=>'form-control']);
	echo form_error('barcode');
	echo '</br>'.form_submit(['name'=>'simpan', 'value' => 'simpan','class'=>'btn btn-primary']);
	echo form_close();
}

$this->table->set_heading('ID', 'Produk', 'Barcode', 'Action');
echo $this->table->generate($produks);


