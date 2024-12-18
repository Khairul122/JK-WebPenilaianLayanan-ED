<?php
session_start();
error_reporting(1);

if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    echo "
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Telkomsel</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <style>
        /* Navbar Styling */
        .navbar-inverse {
            background-color: #2C3E50; /* Modern Dark Blue */
            border: none;
        }
        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
        }
        .navbar-nav > li > a {
            padding: 15px 20px;
            font-size: 14px;
            color: #fff;
        }
        .navbar-inverse .navbar-toggle .icon-bar {
            background-color: #fff;
        }
        .navbar-right .dropdown-menu {
            min-width: 180px;
        }
        .navbar-nav > li.active > a {
            background-color: #1A252F; /* Highlight active menu */
        }
        /* Sidebar Styling */
        .side-nav {
            background-color: #222;
        }
        .side-nav li a {
            color: #ddd;
        }
        .side-nav li a:hover {
            background-color: #555;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Navbar Header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="master.php">Menu Admin</a>
                </div>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="<?php if($_GET['module']=='home'){echo'active';} ?>">
                            <a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                        <li class="<?php if($_GET['module']=='user'){echo'active';} ?>">
                            <a href="?module=user"><i class="glyphicon glyphicon-user"></i> Manajemen User</a>
                        </li>
                        <li class="<?php if($_GET['module']=='group'){echo'active';} ?>">
                            <a href="?module=group"><i class="glyphicon glyphicon-list"></i> Manajemen Group</a>
                        </li>
                        <li class="<?php if($_GET['module']=='description'){echo'active';} ?>">
                            <a href="?module=description"><i class="glyphicon glyphicon-book"></i> Manajemen Deskripsi</a>
                        </li>
                        <li class="<?php if($_GET['module']=='hasil'){echo'active';} ?>">
                            <a href="?module=hasil&sub=all"><i class="glyphicon glyphicon-new-window"></i> Hasil Kuesioner</a>
                        </li>
                    </ul>

                    <!-- User Dropdown -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i> <?php echo $_SESSION['fullname']; ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#gantipass" data-toggle="modal">
                                        <i class="fa fa-fw fa-gear"></i> Ganti Password
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="logout.php">
                                        <i class="fa fa-fw fa-power-off"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php include "konten.php"; ?>
            </div>
        </div>
    </div>

    <!-- Ganti Password Modal -->
    <div class="modal fade" id="gantipass">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="form-horizontal">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">
                            <h4>Ganti Password</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="lama" class="col-sm-4 control-label">Password Lama</label>
                            <div class="col-sm-8">
                                <input type="password" name="pass_lama" id="pass_lama" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="baru" class="col-sm-4 control-label">Password Baru</label>
                            <div class="col-sm-8">
                                <input type="password" name="pass_baru" id="pass_baru" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi" class="col-sm-4 control-label">Konfirmasi Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="kon_pass" id="kon_pass" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Ganti</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>
