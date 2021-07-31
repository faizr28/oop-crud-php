<?php
// include file MyDb
include('MyDb.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CRUD OOP</title>
</head>

<body>
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

    <div class="container">
        <div class="row">
            <div class="col-8 my-5 mx-auto">
                <h1>Data Warga</h1>
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
                                        <a href="detail-warga.php?id=<?= $warga['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="index.php?hapus=<?= $warga['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>