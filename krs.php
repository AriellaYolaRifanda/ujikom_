<?php
include "../db.php";
$db=new db;

switch ($_GET['action'])
{

    case 'save':

        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $id_jadwal = $_POST['id_jadwal'];
        $kd_semester = $_POST['kd_semester'];

        $query = $db->add_krs($id,$nim,$id_jadwal,$kd_semester);
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
        $nim = $_POST['nim'];
        $id_jadwal = $_POST['id_jadwal'];
        $kd_semester = $_POST['kd_semester'];
      
        $query = $db->update_krs($id,$nim,$id_jadwal,$kd_semester);
       
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
        $query = $db->del_krs($id);
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