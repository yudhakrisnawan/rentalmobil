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
    <title>Rent Car</title>
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
            <li class="nav-item active">
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
            <li class="nav-item">
                <a class="nav-link" href="peminjaman.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Penyewaan</span>
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
                <div class="sidebar-brand-icon">
                    <img src="img/icon.png" width="30px" height="30px">     
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
            <li class="nav-item active">
                <a class="nav-link" href="data_mobil_admin.php">
                    <img alt="Image placeholder" src="img/mobil.png">
                    <span>Data Mobil</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="data_transaksi.php">
                    <img alt="Image placeholder" src="img/pinjam.png">
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
                    <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
                    <a href="tambah_mobil.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Tambah Mobil Baru</a>
                </div>
                <section class="mar-top--x-3 mar-bottom--x-5">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            
                            <?php
                            $query_data_mobil = "SELECT * FROM mobil";
                            $sql_data_mobil = mysqli_query($conn, $query_data_mobil);
                            $no = 1;
                            ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead align="center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Id Mobil</th>
                                            <th>Nopol Mobil</th>
                                            <th>Tipe Mobil</th>
                                            <th>Tahun Produksi</th>
                                            <th>Harga Sewa</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                    <?php
                                    if(isset($_POST['update'])){
                                        $harga_sewa = $_POST['harga_sewa'];
                                        $id_mobil = $_POST['update'];
                                        $query_update = "UPDATE mobil SET harga_sewa = '$harga_sewa' WHERE id_mobil = '$id_mobil'";
                                        $sql_update = mysqli_query($conn, $query_update);
                                        if($sql_update){
                                            $_SESSION['updatesukses'] = 'sukses';
                                            echo "<script>alert('Berhasil memperbarui data Mobil!')</script>";
                                            header('location: data_mobil_admin.php');
                                        } else {
                                            echo "<script>alert('Gagal memperbarui data Mobil!')</script>";
                                        }
                                    }
                                    ?>
                                    <?php
                                        while($r_dt_mobil = mysqli_fetch_array($sql_data_mobil)){
                                    ?>
                                        <tr class="odd gradeX">
                                        <td><center><?php echo $no++; ?>.</center></td>
                                        <td><?php echo $r_dt_mobil['id_mobil']; ?></td>
                                        <td><?php echo $r_dt_mobil['nopol_mobil']; ?></td>
                                        <td><?php echo $r_dt_mobil['tipe_mobil']; ?></td>
                                        <td><?php echo $r_dt_mobil['tahun_produksi']; ?></td>
                                        <td><?php echo $r_dt_mobil['harga_sewa']; ?></td>
                                        <td><?php echo $r_dt_mobil['keterangan']; ?></td>
                                        <td>
                                        <button class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"data-toggle="modal" data-target="#editModal<?php echo $r_dt_mobil['id_mobil']; ?>">Edit</button>
                                            <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#hapusModal<?php echo $r_dt_mobil['id_mobil']; ?>">Hapus</button>
                                        </td>
                                        </tr>
                                        <div class="modal fade" id="editModal<?php echo $r_dt_mobil['id_mobil']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit data <?php echo $r_dt_mobil['id_mobil']; ?>?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label for="Id Mobil" class="col-sm-2 col-form-label">Id Mobil</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" value="<?php echo $r_dt_mobil['id_mobil'];?>" disabled>     
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="Nopol Mobil" class="col-sm-2 col-form-label">Nopol Mobil</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" value="<?php echo $r_dt_mobil['nopol_mobil'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="Tipe Mobil" class="col-sm-2 col-form-label">Tipe Mobil</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" value="<?php echo $r_dt_mobil['tipe_mobil'];?>" disabled>     
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="Tahun Produksi" class="col-sm-2 col-form-label">Tahun Produksi</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" value="<?php echo $r_dt_mobil['tahun_produksi'];?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="Harga Sewa" class="col-sm-2 col-form-label">Harga Sewa</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="harga_sewa" class="form-control" placeholder="Masukkan Harga Sewa Terbaru" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" value="<?php echo $r_dt_mobil['keterangan'];?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="button" data-dismiss="modal">Batal</button>
                                                            <button name="update" value="<?php echo $r_dt_mobil['id_mobil'];?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    ?>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="hapusModal<?php echo $r_dt_mobil['id_mobil']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ingin menghapus mobil dengan id <?php echo $r_dt_mobil['id_mobil']; ?>?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Pilih "Hapus" jika ingin menghapus user.</div>
                                                    <div class="modal-footer">
                                                        <form action="" method="post">
                                                            <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="button" data-dismiss="modal">Batal</button>
                                                            <button name="hapus_mobil" value="<?php echo $r_dt_mobil['id_mobil']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Hapus</button>
                                                        </form> 
                                                    </div>
                                                    <?php
                                                        if(isset($_POST['hapus_mobil'])){
                                                            $id_mobil = $_POST['hapus_mobil'];
                                                            $query_hapus_mobil = "DELETE FROM mobil WHERE id_mobil = $id_mobil";
                                                            $sql_hapus_mobil = mysqli_query($conn, $query_hapus_mobil);
                                                            if($sql_hapus_mobil){
                                                                header('location: data_mobil_admin.php');
                                                            }
                                                        }
                                                    ?>   
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </section>
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