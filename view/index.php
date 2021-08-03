<?php
// include file MyDb
include('../Controller.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Data Warga</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    $Db = new Controller();
    $data_warga = $Db->indexWarga();
    // print_r($data_warga);

    // simpan
    if (isset($_POST['tambah_warga'])) {
        // echo true;
        // print_r($_POST);
        $noktp = $_POST['no_ktp'];
        $nama = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['no_hp'];
        $querysimpan = $Db->storeWarga($noktp, $nama, $alamat, $nohp);

        if ($querysimpan) {
            // header("Refresh:5");
            header('location:index.php');
            echo
            '<div class="alert alert-success" role="alert">
                data warga tersimpan! --tunggu 5 detik
            </div>';
        } else {
            echo
            '<div class="alert alert-danger" role="alert">
                data warga gagal tersimpan!
            </div>';
        }
    }

    if (isset($_GET['hapus'])) {
        $idwarga = $_GET['hapus'];
        $queryhapus = $Db->destroyWarga($idwarga);

        if ($queryhapus) {
            header('location:index.php');
            echo
            '<div class="alert alert-success" role="alert">
                data warga terhapus! --tunggu 5 detik
            </div>';
        } else {
            echo
            '<div class="alert alert-danger" role="alert">
                data warga gagal di hapus!
            </div>';
        }
    }


    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('../template/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('../template/topbar.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">List Data Warga</h1>


                    <div class="card mb-4 border-left-primary">
                        <div class="card-body">
                            <a href="create-warga.php" class="btn btn-sm btn-success my-3">Tambah Data Warga</a>

                            <table class="table table-sm table-hover table-bordered text-center">
                                <thead>
                                    <td>No</td>
                                    <td>NO KTP</td>
                                    <td>Nama Lengkap</td>
                                    <td>Alamat</td>
                                    <td>No Hp</td>
                                    <td>Action</td>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_warga as $key => $warga) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $warga['no_ktp'] ?></td>
                                            <td><?= $warga['nama_lengkap'] ?></td>
                                            <td><?= $warga['alamat'] ?></td>
                                            <td><?= $warga['no_hp'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="detail-warga.php?id=<?= $warga['id'] ?>" class="btn btn-sm btn-info"><i><span class="fa fa-eye"></span></i></a>
                                                    <a href="index.php?hapus=<?= $warga['id'] ?>" class="btn btn-sm btn-danger"><i><span class="fa fa-trash"></span></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>