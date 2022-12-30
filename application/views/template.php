<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Praktik</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<style type="text/css">
		aside .p {
			background: #009080;
			width: 90%;
			margin-top: 10px;
			margin-left: 10px;
			line-height: 30px;
			height: 30px;
			display: inline-block;
			

		}

		aside .p a {
			color: black;
		}

		aside .p:hover {
			background: #00F080;
		}

		footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: gold;
			color: white;
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="mt-3">
		<div style="display:flex;">
			<aside style="width: 200px;">
				<header  style="background:#009080; height: 70px;">
					<h4 class="text-center">Praktik</h4>
				</header>
				<div class="p text-center rounded"><a href="<?php echo site_url('produk'); ?>" class="text-decoration-none">Produk</a>
				</div>
				<div class="p text-center rounded"><a href="<?php echo site_url('pembelian'); ?>" class="text-decoration-none">Pembelian</a>
				</div>

			</aside>
			<div class="container-fluid p-1">
				<?php
				echo $konten;
				?>
			</div>
		</div>
		<footer class="bg-light text-center text-lg-start">
			<!-- Copyright -->
			<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
				© 2022 Copyright:
				<a class="text-dark" href="https://github.com/MRizki28/">Muhammad Rizki</a>
			</div>
			<!-- Copyright -->
		</footer>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
