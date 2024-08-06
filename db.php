<?php

class db{
    private $koneksi;
    function __construct()
    {
        $this->koneksi= $koneksi=new mysqli("localhost","root","","db_pelatihan_febby");
        
    }
    function get_user($username,$password){
        $data=$this->koneksi->query("select * from tbl_user_febby where username='$username' and password='$password'");
        return $data;
    }
    // mahasiswa
    function get_allMhs(){
        $data=$this->koneksi->query("select * from tbl_mahasiswa_febby");
        return $data;
    }
    function get_allDos(){
        $data=$this->koneksi->query("select * from tbl_dosen_febby");
        return $data;
    }
    
    function get_allJadwal(){
        $data=$this->koneksi->query("select * from tbl_jadwal_febby");
        return $data;
    }

    function get_allMatkul(){
        $data=$this->koneksi->query("select * from tbl_matkul_febby");
        return $data;
    }

    function get_allKrs(){
        $data=$this->koneksi->query("select * from tbl_krs_febby");
        return $data;
    }

    function get_allSemester(){
        $data=$this->koneksi->query("select * from tbl_semester_febby");
        return $data;
    }

    function add_mhs($nim,$nama,$alamat,$jurusan){
        $this->koneksi->query("insert into tbl_mahasiswa_febby(nim,nama,alamat,jurusan) values('$nim','$nama','$alamat','$jurusan')");
        return true;
    }
    function add_dos($kd_dosen,$nama,$alamat){
        $this->koneksi->query("insert into tbl_dosen_febby(kd_dosen,nama,alamat) values('$kd_dosen','$nama','$alamat')");
        return true;
    }
    function add_jadwal($id,$kd_dosen,$kd_matkul,$waktu,$ruang){
        $this->koneksi->query("insert into tbl_jadwal_febby(id,kd_dosen,kd_matkul,waktu,ruang) values('$id','$kd_dosen','$kd_matkul','$waktu','$ruang')");
        return true;
    }

    function add_krs($id,$nim,$id_jadwal,$kd_semester){
        $this->koneksi->query("insert into tbl_krs_febby(id,nim,id_jadwal,kd_semester) values('$id','$nim','$id_jadwal','$kd_semester')");
        return true;
    }

    function update_mhs($nim,$nama,$alamat,$jurusan){
            $this->koneksi->query("UPDATE tbl_mahasiswa_febby SET nama = '$nama', alamat = '$alamat', jurusan = '$jurusan' WHERE nim='$nim'");
            return true;
    }
    function update_dos($kd_dosen,$nama,$alamat){
            $this->koneksi->query("UPDATE tbl_dosen_febby SET nama = '$nama', alamat = '$alamat' WHERE kd_dosen='$kd_dosen'");
            return true;
    }
    function update_jadwal($id,$kd_dosen,$kd_matkul,$waktu,$ruang){
            $this->koneksi->query("UPDATE tbl_jadwal_febby SET kd_dosen = '$kd_dosen', kd_matkul = '$kd_matkul', waktu = '$waktu', ruang = '$ruang' WHERE id='$id'");
            return true;
    }

    function update_krs($id,$nim,$id_jadwal,$kd_semester){
            $this->koneksi->query("UPDATE tbl_krs_febby SET id = '$id', nim = '$nim', id_jadwal = '$id_jadwal', kd_semester = '$kd_semester' WHERE id='$id'");
            return true;
    }

    function get_MhdByNim($nim){
        $data=$this->koneksi->query("select * from tbl_mahasiswa_febby where nim='$nim'");
        return $data;
    }
    function get_DosByKode($kd_dosen){
        $data=$this->koneksi->query("select * from tbl_dosen_febby where kd_dosen='$kd_dosen'");
        return $data;
    }
    function get_JadById($id){
        $data=$this->koneksi->query("select * from tbl_jadwal_febby where id='$id'");
        return $data;
    }

    function get_KrsById($id){
        $data=$this->koneksi->query("select * from tbl_krs_febby where id='$id'");
        return $data;
    }

    function del_mhs($nim){
        $this->koneksi->query("delete from tbl_mahasiswa_febby where nim='$nim'");
        return true;
    }
    function del_dos($kd_dosen){
        $this->koneksi->query("delete from tbl_dosen_febby where kd_dosen='$kd_dosen'");
        return true;
    }
    function del_jadwal($id){
        $this->koneksi->query("delete from tbl_jadwal_febby where id='$id'");
        return true;
    }
    function del_krs($id){
        $this->koneksi->query("delete from tbl_krs_febby where id='$id'");
        return true;
    }



} 

?>