<!DOCTYPE html>
<?php
	include "connection/koneksi.php";
	session_start();
	if(isset ($_SESSION['username'])){
		header('location: beranda.php');
	} else {
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rent Car</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-info">
    <div class="limiter">
    <br><br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Selamat datang!</h1>
                                        </div>
                                        <form action="" method="post" class="user validate-form">
                                            <?php 
                                                if(isset($_SESSION['eror'])){
                                            ?>
                                                <div class='container'>	
                                                    <div class='alert alert-danger'>
                                                        <span>
                                                            <center>Mungkin Username atau Password yang anda masukkan salah</center>
                                                        </span>
                                                    </div> 
                                                </div>
                                            <?php 
                                                unset($_SESSION['eror']);
                                                }
                                            ?>
                                            <div class="form-group validate-input" data-validate = "Email is required">
                                                <input type="text" name="username" class="form-control form-control-user" placeholder="Masukkan Username">
                                            </div>
                                            <div class="form-group validate-input" data-validate = "Password is required">
                                                <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan Password">
                                            </div>
                                            <button type="submit" name="login" class="btn btn-success btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset ($_REQUEST['login'])){
            $arr_level = array();
            $c_level = mysqli_query($conn, "select * from level_user");

            while($r = mysqli_fetch_array($c_level)){
                array_push($arr_level, $r['nama_level']);
            }
            foreach ($arr_level as $kontens) {
                //echo $kontens." || ";
            }
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $akun = mysqli_query($conn, "select * from admin natural join level_user");
            echo mysqli_error($conn);
            while($r = mysqli_fetch_array($akun)){
                if($r['username'] == $username and $r['password'] == $password){
                    $_SESSION['username'] = $username;
                    $_SESSION['id_admin'] = $r['id_admin'];
                    $_SESSION['level'] = $r['id_level'];
                    if(isset($_SESSION['eror'])){
                        unset($_SESSION['eror']);
                    }
                    header('location: beranda.php');
                    break;
                } else {
                    $_SESSION['eror'] = 'salah';
                    header('location: index.php');
                }
            } 
        } 
    ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
<?php
	}
?>