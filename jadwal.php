<?php
include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $id = $_POST['id'];
        $kd_dosen = $_POST['kd_dosen'];
        $kd_matkul = $_POST['kd_matkul'];
        $waktu = $_POST['waktu'];
        $ruang = $_POST['ruang'];

        $query = $db->add_jadwal($id,$kd_dosen,$kd_matkul,$waktu,$ruang);
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :";
        }
    break;

    case 'edit':

        $id = $_POST['id'];
        $kd_dosen = $_POST['kd_dosen'];
        $kd_matkul = $_POST['kd_matkul'];
        $waktu = $_POST['waktu'];
        $ruang = $_POST['ruang'];
      
        $query = $db->update_jadwal($id,$kd_dosen,$kd_matkul,$waktu,$ruang);
       
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :";
        }
    break;

    case 'delete':

        $id = $_POST['id'];
        $query = $db->del_jadwal($id);
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" ;
        }
    break;
}
?>