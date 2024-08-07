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


// Untuk Inner Join, nanti taronya disesuain tempat aja. 

<?php
// Koneksi ke database
$conn = mysqli_connect("hostname", "username", "password", "database");

// Query untuk menarik data dari tabel `dosen` dan `matakuliah`
$query = "SELECT dosen.kd_dosen, matkul.kd_matkul 
          FROM dosen 
          INNER JOIN matkul";

// Jalankan query
$result = mysqli_query($conn, $query);

// Loop melalui hasil query dan simpan ke tabel `jadwal`
while($row = mysqli_fetch_assoc($result)) {
    $kd_dosen = $row['kd_dosen'];
    $kd_matkul = $row['kd_matkul'];
    
    // Insert data ke tabel `jadwal`
    $insert_query = "INSERT INTO jadwal (kd_dosen, kd_matkul) VALUES ('$kd_dosen', '$kd_matkul')";
    mysqli_query($conn, $insert_query);
}
?>
