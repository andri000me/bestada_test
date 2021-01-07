<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Ace Admin</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/bootstrap-datepicker3.min.css" />
    <!-- text fonts -->
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>templates/admin_temp/assets/css/ace-rtl.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> -->
    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default          ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="index.html" class="navbar-brand">
                    <small>
                        <i class="fa fa-leaf"></i>
                        Ace Admin
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">

                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="<?= base_url(); ?>templates/admin_temp/assets/images/avatars/user.jpg" alt="Jason's Photo" />
                            <span class="user-info">
                                <small>Welcome,</small>
                                Jason
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                            <li>
                                <a href="<?= base_url(); ?>login/logout">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')
                } catch (e) {}
            </script>

            <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="ace-icon fa fa-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="ace-icon fa fa-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="ace-icon fa fa-users"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="ace-icon fa fa-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div> 
            </div>-->
            <!-- /.sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="">
                    <a href="index.html">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="<?= base_url(); ?>saldo">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Saldo </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url(); ?>pengeluaran">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Pengeluaran </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url(); ?>kategori">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text"> Kategori </span>
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

        <div class="main-content">
            <?php echo $contents ?>
        </div><!-- /.main-content -->

        <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
                    <span class="bigger-120">
                        <!-- <span class="blue bolder"></span> -->
                        &copy; 2020 Bestada. All Rights Reserved
                    </span>


                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery-ui.custom.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery.easypiechart.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery.sparkline.index.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery.flot.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery.flot.pie.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/jquery.flot.resize.min.js"></script>
    <!-- ace scripts -->
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/ace-elements.min.js"></script>
    <script src="<?= base_url(); ?>templates/admin_temp/assets/js/ace.min.js"></script>

</body>

</html>