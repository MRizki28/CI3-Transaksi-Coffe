<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peminjaman Barang</title>
    <meta name="description" content="STMIK ADHI GUNA">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/stmik1.png')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css')?>">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css')?>">
    <link href="<?php echo base_url('assets/css/lib/vector-map/jqvmap.min.css')?>" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"><img src="<?php echo base_url('assets/images/stmik1.png');?>"  alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo site_url('Admin/index')?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('coffe_controller/index')?>"> <i class="menu-icon fa fa-tasks"></i>Daftar Barang</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url('pesan_controller/index') ?>"> <i class="menu-icon fa fa-tasks"></i>Pesan</a>
                    </li>
                
					<li>
						<a href="<?php echo site_url('login_controller/logout')?>"> <i class="menu-icon fa fa fa-sign-out"></i>	Logout</a>
					</li>
                    
					</li>
                </ul>
            </div>
        </nav>
    </aside>






    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left"> 
                    <h3>Dashboard</h3>
                    </div>
				</div>
			</div>	
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Barang</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('coffe_controller/save'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo validation_errors(); ?>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="nama_coffe" class=" form-control-label">Nama coffe</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nama_coffe" name="nama_coffe" placeholder="Nama coffe" class="form-control" ></div>
                                <?php echo form_error('nama_coffe'); ?>
                            </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="harga" class=" form-control-label">Harga</label></div>
                               <div class="col-12 col-md-9"><input type="number" id="harga" name="harga" placeholder="Harga" class="form-control" ></div>
                               <?php echo form_error('harga'); ?>
                            </div>
                          <div class="row form-group">
                          </div>
                          
                      </div>
                      
                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('coffe_controller/index')?>" role="button">Kembali</a>                                                                       
                      </div>
					  </form>
                    </div>
                   
                     
        </div>
    </div>

     

   
    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js')?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>

</html>


