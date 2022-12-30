<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
echo form_open(site_url('pembelian/simpan'));
if (isset($pembelian)) {
	echo form_input(['name'=>'idpembelian', 'hidden'=>'true' , 'value' => $pembelian['idpembelian']]);
    echo  "Nama Produk";
    $prd = null; 
    foreach($produks as $produk)
    {
        $prd[$produk['id']]= $produk['namaproduk'];
    }
    echo"</br>". form_dropdown('idproduk',$prd);
    form_error('idproduk');
    echo "</br></br>"."jumlah";
	echo "</br>".form_input(['name' => 'jumlah', 'value'=>'0','type'=>'number','class'=>'form-control']);
    form_error('jumlah');
	echo "</br></br>". form_submit(['name'=>'update', 'value'=>'simpan','class'=>'btn btn-primary mb-2']);
}
$template['table_open']="<table class='table table-sm table-bordered'>";
$this->table->set_template($template);
$rows=null;
foreach ($detilss as $det) {
	$row['idproduk'] = $det['idproduk'];
	$row['namaproduk'] = $det['namaproduk'];
	$row['jumlah'] = $det['jumlah'];
	$row['hapus'] = "<a href='".site_url('/pembelian/hapus/'.$row['idproduk'])."' class='btn btn-sm btn-danger'>Hapus</a>";
	$rows[]=$row;
}
$this->table->set_heading('ID', 'Produk', 'Jumlah', 'Hapus');
echo $this->table->generate($rows);


