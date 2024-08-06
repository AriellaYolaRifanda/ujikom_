<?php
include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $kd_dosen = $_POST['kd_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $query = $db->add_dos($kd_dosen,$nama,$alamat);
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

        $kd_dosen = $_POST['kd_dosen'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
      
        $query = $db->update_dos($kd_dosen,$nama,$alamat);
       
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

        $kd_dosen = $_POST['kd_dosen'];
        $query = $db->del_dos($kd_dosen);
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