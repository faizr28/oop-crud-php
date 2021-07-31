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
    $Db = new MyDb();
    $id_warga = $_GET['id'];
    $data_warga = $Db->showWarga($id_warga);
    // print_r($data_warga);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-8 my-5 mx-auto">
                <h1>Data Warga</h1>
                <table class="table table-sm table-striped table-bordered">
                    <tr>
                        <td>No KTP</td>
                        <td><?= $data_warga['no_ktp'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= $data_warga['nama_lengkap'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $data_warga['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td><?= $data_warga['no_hp'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button onclick="window.history.back();" class="btn btn-sm btn-secondary">kembali</button>
                        </td>
                    </tr>
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