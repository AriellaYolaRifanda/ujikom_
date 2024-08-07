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

// Untuk menampilkan data dari tabel jadwal

<!DOCTYPE html>
<html>
<head>
    <title>Jadwal</title>
</head>
<body>

<table border="1">
    <tr>
        <td>No.</td>
        <td>Kode Dosen</td>
        <td>Kode Matakuliah</td>
        <td>Waktu</td>
        <td>Ruang</td>
        <td>Action</td>
    </tr>
    
    <?php
    // Query untuk menarik data dari tabel `jadwal`
    $query = mysqli_query($conn, "SELECT * FROM jadwal");
    $no = 1;
    while($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['kd_dosen']; ?></td>
            <td><?= $row['kd_matkul']; ?></td>
            <td><?= $row['waktu']; ?></td>
            <td><?= $row['ruang']; ?></td>
            <td>
                <form action="update_jadwal.php" method="post">
                    <input type="hidden" name="id_jadwal" value="<?= $row['id_jadwal']; ?>">
                    <input type="text" name="waktu" placeholder="Waktu" value="<?= $row['waktu']; ?>">
                    <input type="text" name="ruang" placeholder="Ruang" value="<?= $row['ruang']; ?>">
                    <button type="submit">Add</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>

</table>

</body>
</html>

// update_jadwal.php

<?php
// Koneksi ke database
$conn = mysqli_connect("hostname", "username", "password", "database");

// Ambil data dari form
$id_jadwal = $_POST['id_jadwal'];
$waktu = $_POST['waktu'];
$ruang = $_POST['ruang'];

// Query untuk memperbarui data di tabel `jadwal`
$update_query = "UPDATE jadwal SET waktu = '$waktu', ruang = '$ruang' WHERE id_jadwal = '$id_jadwal'";
mysqli_query($conn, $update_query);

// Redirect kembali ke halaman sebelumnya
header("Location: jadwal.php");
?>

//ini yang gabungan tarik data, nampilin sama simpen

<?php
// Koneksi ke database
$conn = mysqli_connect("hostname", "username", "password", "database");

// Tarik dan simpan data dari tabel dosen dan matakuliah ke tabel jadwal
$query = "SELECT dosen.kd_dosen, matkul.kd_matkul 
          FROM dosen 
          INNER JOIN matkul ON dosen.some_field = matkul.some_field"; // Sesuaikan kondisi INNER JOIN sesuai kebutuhan

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
    $kd_dosen = $row['kd_dosen'];
    $kd_matkul = $row['kd_matkul'];
    
    // Periksa apakah data sudah ada di tabel jadwal untuk menghindari duplikasi
    $check_query = "SELECT * FROM jadwal WHERE kd_dosen = '$kd_dosen' AND kd_matkul = '$kd_matkul'";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) == 0) {
        // Insert data ke tabel jadwal
        $insert_query = "INSERT INTO jadwal (kd_dosen, kd_matkul) VALUES ('$kd_dosen', '$kd_matkul')";
        mysqli_query($conn, $insert_query);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jadwal</title>
</head>
<body>

<table border="1">
    <tr>
        <td>No.</td>
        <td>Kode Dosen</td>
        <td>Kode Matakuliah</td>
        <td>Waktu</td>
        <td>Ruang</td>
        <td>Action</td>
    </tr>
    
    <?php
    // Query untuk menarik data dari tabel jadwal
    $query = mysqli_query($conn, "SELECT * FROM jadwal");
    $no = 1;
    while($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['kd_dosen']; ?></td>
            <td><?= $row['kd_matkul']; ?></td>
            <td><?= $row['waktu']; ?></td>
            <td><?= $row['ruang']; ?></td>
            <td>
                <form action="update_jadwal.php" method="post">
                    <input type="hidden" name="id_jadwal" value="<?= $row['id_jadwal']; ?>">
                    <input type="text" name="waktu" placeholder="Waktu" value="<?= $row['waktu']; ?>">
                    <input type="text" name="ruang" placeholder="Ruang" value="<?= $row['ruang']; ?>">
                    <button type="submit">Add</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>

</table>

</body>
</html>
