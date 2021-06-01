<!DOCTYPE html>

<?php
include "connection/koneksi.php";
session_start();
ob_start();

$id = $_SESSION['id_admin'];

if(isset ($_SESSION['username'])){
    $query = "select * from admin natural join level_user where id_admin = $id";

    mysqli_query($conn, $query);
    $sql = mysqli_query($conn, $query);
    
    while($r = mysqli_fetch_array($sql)){
        $nama = $r['nama'];
        
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bisa Ngaji</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/arabic.css" rel="stylesheet" >
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php
            if($r['id_level'] == 1){
        ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="img/dashboard.png" width="30px" height="30px">
                </div>
                <div class="sidebar-brand-text mx-3">Rent Car</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="beranda.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="data_mobil.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Mobil</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="peminjaman.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Peminjaman</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="pengembalian.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pengembalian</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <br>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        <?php
            } else if($r['id_level'] == 2){
        ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="img/dashboard.png" width="30px" height="30px">
                </div>
                <div class="sidebar-brand-text mx-3">Rent Car</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="beranda.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="data_mobil_admin.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Mobil</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="data_transaksi.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Transaksi</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <br>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        <?php
            }
        ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                  
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Informasi User -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $r['nama'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown User -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" id="custom-dropdown" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                
            <!-- Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                </div>
                <section class="mar-top--x-3 mar-bottom--x-5">
                    <div class="container">
                        <center>
                            <h1 class="h3 mb-0 text-gray-800">PENYEWAAN</h1>
                        </center>
                    </div>
                    <br>
                    <form method="post"  action="sewa.php" >
                    <div class="container">
                    <table>
                    <input type="hidden" name="id_admin" value="<?php echo $r['id_admin'];?>">
                        <tr>
                            <td> <label for="mobil" >Mobil</label></td>
                            <td>
                            <select name="id_mobil">
                        <?php 
                    $sql="select * from mobil WHERE keterangan='tersedia'";
                    $hasil=mysqli_query($conn,$sql);
                    $no=0;
                    while ($data2 = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                    
                    <option  type="integer" value="<?php echo $data2['id_mobil'];?>" name="id_mobil"><?php echo $data2['id_mobil'];?></option>
                    <?php 
	                }
                    ?>

                </select>
                            
                            </td>
                        </tr>
                        <tr>
                            <td><label for="id_customer" >Customer</label></td>
                            <td>
                            <select name="id_customer">
                    <?php 
                    $sql="select * from customer";
                    $hasil=mysqli_query($conn,$sql);
                    $no=0;
                    while ($data2 = mysqli_fetch_array($hasil)) {
                    $no++;
                    ?>
                    
                    <option type="integer" value="<?php echo $data2['id_customer'];?>" name="id_customer"><?php echo $data2['id_customer'];?></option>
                    <?php 
	                }
                    ?>

                </select>
                            </td>
                        </tr>   
                        <tr>
                            <td><label for="tanggal_sewa">Tanggal sewa</label></td>
                            <td><input type="date" name="tanggal_sewa" required></td>
                        </tr>
                        <tr>
                            <td><label for="waktu_sewa">waktu sewa</label></td>
                            <td><input type="integer" name="waktu_sewa" required></td>
                        </tr>                                   
                    </table>
                <button type="submit" value="kirim">kirim</button>            
               
                    </div>
                    
            </div>      
                    
                </section>

                </form>
            </div>
            <!-- End of Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 9</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" jika ingin meninggalkan halaman.</div>
                <div class="modal-footer">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="button" data-dismiss="modal">Batal</button>
                    <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
<?php
  }
} else {
  header('location: logout.php');
}
ob_flush();
?>