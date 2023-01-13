<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

	<div class="row mt-5">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<div class="card-title">Login</div>
					<?php
					echo form_open(site_url('produk/login'));
					echo form_input(['name' => 'username', 'class' => 'form-control form-control-sm', 'placeholder' => 'USERNAME']);
					echo form_input(['name' => 'password', 'type' => 'password', 'class' => 'form-control form-control-sm']);
					echo form_submit(['name' => 'login', 'class' => 'btn btn-sm btn-primary']);
					echo form_close();
					?>
					<div class="card-text"></div>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>
