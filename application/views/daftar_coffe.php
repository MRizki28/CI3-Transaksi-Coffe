<?php
defined('BASEPATH') or exit('No direct script access allowed');
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

    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css') ?>">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css') ?>">
    <link href="<?php echo base_url('assets/css/lib/vector-map/jqvmap.min.css') ?>" rel="stylesheet">

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
                <a class="navbar-brand"><img src="<?php echo base_url('assets/images/stmik1.png'); ?>" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo site_url('Admin/index') ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('coffe_controller/index') ?>"> <i class="menu-icon fa fa-tasks"></i>Daftar Coffe</a>
                    </li>
                    <li >
                        <a href="<?php echo site_url('pembelian_controller/index') ?>"> <i class="menu-icon fa fa-file-o"></i>Pesan</a>
                    </li>
                
                    <li>
                        <a href="<?php echo site_url('login_controller/logout') ?>"> <i class="menu-icon fa fa fa-sign-out"></i> Logout</a>
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
        <!-- TABEL-->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Daftar Coffe</strong>
                            </div>
                            <div class="card-header">
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('coffe_controller/add') ?>"><i class="fa fa-pencil"></i> Add New</a>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Nama Coffe</th>
                                            <th>Harga</th>
                                        
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($tb_coffe as $br) {
                                        ?>
                                            <tr>

                                                <td><?php echo $br->nama_coffe ?></td>
                                                <td><?php echo $br->harga ?></td>
                                               
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="<?php echo site_url('coffe_controller/edit/' . $br->id); ?>" class="btn btn-small"><i class="fa fa-edit"></i>Edit</a>
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticModal<?php echo $br->id; ?>" onclick="confirm_modal('<?php echo site_url('coffe_controller/hapus/' . $br->id); ?>','Title');" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_delete_m_n" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Yakin ingin menghapus ini?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a type="button" class="btn btn-primary" id="delete_link_m_n">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirm_modal(delete_url, title) {
            jQuery('#modal_delete_m_n').modal('show', {
                backdrop: 'static',
                keyboard: false
            });
            jQuery("#modal_delete_m_n .grt").text(title);
            document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
            document.getElementById('delete_link_m_n').focus();
        }
    </script>

    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"> </script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" >
    </script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js'); ?>"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>