<?php

require 'MyDb.php';

class Controller extends MyDb
{
    public function indexWarga()
    {
        $query = $this->db->prepare("SELECT * FROM data_warga");
        $query->execute();
        $data = $query->fetchAll();

        return $data;
    }

    public function showWarga($id_warga)
    {
        $query = $this->db->prepare("SELECT * FROM data_warga where id=?");
        $query->bindParam(1, $id_warga);
        $query->execute();

        return $query->fetch();
    }

    public function storeWarga($no_ktp, $nama_lengkap, $alamat, $no_hp)
    {
        $data = $this->db->prepare('INSERT INTO data_warga (no_ktp,nama_lengkap,alamat,no_hp) VALUES (?, ?, ?, ?)');

        $data->bindParam(1, $no_ktp);
        $data->bindParam(2, $nama_lengkap);
        $data->bindParam(3, $alamat);
        $data->bindParam(4, $no_hp);
        $data->execute();

        return $data->rowCount();
    }

    public function destroyWarga($id_warga)
    {
        $query = $this->db->prepare("DELETE FROM data_warga where id=?");
        $query->bindParam(1, $id_warga);
        $query->execute();

        return $query->rowCount();
    }
}
