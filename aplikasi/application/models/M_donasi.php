<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_Donasi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    }    
    
    function getDonasiForPanti($id_panti){
        $sql = 'SELECT * FROM `donasi` INNER JOIN `donatur` ON donasi.id_donatur = donatur.id_donatur WHERE id_panti = '.$id_panti.' AND donasi.status = 1 ORDER BY `donasi`.`tgl_donasi` DESC';
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getTotalDonasiForPanti($id_panti){
        $sql = 'SELECT SUM(jumlah_transfer) AS hasil FROM `donasi` WHERE id_panti = '.$id_panti. ' AND status = 1';
        $query = $this->db->query($sql);
        
        return $query->row_array();

    }

    function getTotalPendapatanForPanti($id_panti){
        $sql = 'SELECT SUM(pendapatan_panti) AS hasil FROM `donasi` WHERE id_panti = '.$id_panti. ' AND status = 1';
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }

    function getTotalUntukPlatformForPanti($id_panti){
        $sql = 'SELECT SUM(untuk_platform) AS hasil FROM `donasi` WHERE id_panti = '.$id_panti. ' AND status = 1';
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }

    function getAll(){
        $query = $this->db->query('SELECT kode_donasi, donasi.nama_donatur_saat_donasi, donasi.id_donasi, panti.id_panti, donatur.nama, panti.nama_panti, donasi.jumlah_transfer, donasi.tgl_donasi, donasi.status FROM `donasi` INNER JOIN `donatur` ON donasi.id_donatur = donatur.id_donatur INNER JOIN panti ON panti.id_panti = donasi.id_panti ORDER BY donasi.tgl_donasi DESC');
        return $query->result_array();
    }


    function pendingkan($id_donasi){
        $sql = "UPDATE `donasi` SET `status` = '0' WHERE id_donasi = '$id_donasi';";
        $this->db->query($sql);
        
        return $this->db->affected_rows();
    }

    function validasi($id_donasi){
        $time_now = strtotime("now");
        $timestamp_now = date('Y-m-d H:i:s',$time_now);
        // $sql = "UPDATE `panti` SET `nama_panti` = '$nama_panti', `email_panti` = '$email_panti', `ketua_panti` = '$ketua_panti', `jmlh_anak_yatim` = '$jmlh_anak_yatim', `telepon_panti` = '$telepon_panti', `alamat_panti` = '$alamat_panti', `kodekota` = '$kota_panti', `deskripsi_panti_singkat` = '$deskripsi_panti_singkat', `deskripsi_panti_lengkap` = '$deskripsi_panti_lengkap' WHERE `panti`.`id_panti` = '$id_panti';";                
        $sql = "UPDATE `donasi` SET `status` = '1', `tgl_validasi_bukti` = '$timestamp_now' WHERE id_donasi = '$id_donasi';";
        $this->db->query($sql);
        
        return $this->db->affected_rows();
    }

    function donaturDonasi($id_donatur){
        $post = $this->input->post();
        
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle($set), 0, 5);

        $kode_donasi = $post['nama-donatur'];
        $kode_donasi = substr($kode_donasi, 0, 1)        ;
        $kode_donasi = $kode_donasi . $token;        

        $id_panti = $post['id-panti'];
        $nama_donatur_saat_donasi = $post['nama-donatur'];
        $jumlah_transfer = $post['jumlah-donasi'];
        $pendapatan_panti = $jumlah_transfer * 97/100;
        $untuk_platform = $jumlah_transfer * 3/100;
        
        $sql = "INSERT INTO `donasi` (`kode_donasi`, `id_donatur`, `id_panti`, `nama_donatur_saat_donasi`,  `jumlah_transfer`,  `pendapatan_panti`,  `untuk_platform`) VALUES ('$kode_donasi', '$id_donatur', '$id_panti', '$nama_donatur_saat_donasi', '$jumlah_transfer', '$pendapatan_panti', '$untuk_platform');";                
        $this->db->query($sql);
        $lastid = $this->db->insert_id();
              
        return $lastid;
    }

    function getTotalTransaksiDonasi(){
        $sql = "SELECT * FROM `donasi`";
        
        $query = $this->db->query($sql);   
        $hasil = $query->result_array();
        
        $jumlah = count($hasil);
        
        return $jumlah;
    }

    function getDonasiByDonatur($id_donatur){
        $sql = "SELECT kode_donasi, kota.NAMAKOTA, donasi.id_donasi, panti.id_panti, donasi.nama_donatur_saat_donasi as nama, panti.nama_panti, panti.telepon_panti, donasi.jumlah_transfer, donasi.tgl_donasi, donasi.status FROM `donasi` INNER JOIN `donatur` ON donasi.id_donatur = donatur.id_donatur INNER JOIN panti ON panti.id_panti = donasi.id_panti  INNER JOIN `kota` ON panti.kodekota = kota.KODEKOTA WHERE donatur.id_donatur ='". $id_donatur."' ORDER BY `donasi`.`tgl_donasi` DESC";        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDetailDonasi($id_donasi){
        $sql = "SELECT kode_donasi, donasi.untuk_platform,  donasi.pendapatan_panti, kota.NAMAKOTA, donasi.id_donasi, panti.id_panti, donasi.nama_donatur_saat_donasi as nama, panti.nama_panti, panti.telepon_panti, donasi.jumlah_transfer, donasi.tgl_donasi, donasi.status FROM `donasi` INNER JOIN `donatur` ON donasi.id_donatur = donatur.id_donatur INNER JOIN panti ON panti.id_panti = donasi.id_panti  INNER JOIN `kota` ON panti.kodekota = kota.KODEKOTA WHERE donasi.id_donasi ='$id_donasi'";
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }

    function getTotalPemasukan(){
        $sql = "SELECT SUM(untuk_platform) AS hasil FROM `donasi` WHERE status = 1";
        
        $query = $this->db->query($sql);   
        $hasil = $query->row_array();
        $jumlah = $hasil['hasil'];
        
        return $jumlah;
    }

    function cekPemilikDonasi($id_donatur_session, $id_donasi){
        $sql = "SELECT * FROM `donasi` WHERE id_donasi = $id_donasi";        
        $query = $this->db->query($sql);   
        $hasil = $query->row_array();
        
        if ($hasil['id_donatur'] == $id_donatur_session) {
            return true;
        } else {
            return false;
        }                
    }
    

    // function getDetailDonasi($id_donasi){

    // }


}
?>