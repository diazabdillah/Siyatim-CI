<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_Panti extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    }

    function gantiPassword(){
        $post = $this->input->post();

        $password_lama = md5($post["password-lama"]);
        $password_baru = md5($post["password-baru"]);
        $id_panti = $this->session->userdata('id');

        
        $sql = "SELECT * FROM `panti` WHERE `id_panti` = $id_panti";                
        $query = $this->db->query($sql);   
        $hasil = $query->row_array(); 
        
        

        if($password_lama == $hasil['password_panti']){
            $sql = "UPDATE `panti` SET `password_panti` = '$password_baru' WHERE `id_panti` = '$id_panti';";                
            $this->db->query($sql);           

            return $this->db->affected_rows(); 
        } else {
            return false;
        }
    }
    
    function getTotalPantiTerdaftar(){
        $sql = "SELECT * FROM `panti`";
        
        $query = $this->db->query($sql);   
        $hasil = $query->result_array();
        
        $jumlah = count($hasil);
        
        return $jumlah;
    }

    function insertUser(){   
        $post = $this->input->post();
        // var_dump($post);die;
        
        $nama_panti = htmlspecialchars($post["nama-panti"]);
		$email_panti = htmlspecialchars($post["email-panti"]);	

        $sql = "INSERT INTO `panti` (`nama_panti`, `email_panti`, `password_panti`) VALUES ('$nama_panti', '$email_panti', '37114f84a396dc776c58289c000945cd');";
        $this->db->query($sql);
        return $this->db->affected_rows();        
    }

    function getDetail($id_panti){
        $sql = 'SELECT gambar_utama, status_panti, deskripsi_panti_singkat, deskripsi_panti_lengkap, email_panti, jmlh_anak_yatim, alamat_panti, id_panti, logo_panti, nama_panti, ketua_panti, telepon_panti, kota.KODEKOTA as id_kota_panti, kota.NAMAKOTA as kota_panti FROM panti INNER JOIN kota ON panti.kodekota = kota.KODEKOTA AND id_panti = ' .$id_panti; //misal dihapus mau gak tampilin... tinggal tambah WHERE status_hapus = 0
        
        $query = $this->db->query($sql);        
        return $query->row_array();
    }

	function getAll(){
		$query = $this->db->query('SELECT id_panti, logo_panti, nama_panti, email_panti, status_panti, kota.NAMAKOTA as kota_panti FROM panti INNER JOIN kota ON panti.kodekota = kota.KODEKOTA WHERE status_hapus = 0');
        return $query->result_array();
    }

    function uploadBuktiTransferAdmin(){
        $post = $this->input->post();

        $bulan_tahun = htmlspecialchars($post['bulan-tahun']);
        $id_panti = htmlspecialchars($post['id-panti']);
        $id_admin = htmlspecialchars($post['id-admin']);

        $bulan_tahun_sambung = str_replace(' ', '', $bulan_tahun);
        

        $nama_file_baru = $id_admin."-". $id_panti ."-".$bulan_tahun_sambung."-".strtotime("now").".jpg";
        $config['upload_path']          = './assets/img/admin/bukti-transfer';            
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 5000;           
        $config['file_name']            = $nama_file_baru;

        
        $this->load->library('upload', $config);

        if($this->upload->do_upload('bukti-transfer')){
            $sql = "SELECT id_laporan FROM `laporan_transfer` WHERE `bulan_tahun` = '$bulan_tahun' AND id_panti = '$id_panti'";
            $query = $this->db->query($sql);
            $id_laporan = $query->row_array()['id_laporan'];


            if (count($query->row_array())){
                $sql = "UPDATE `laporan_transfer` SET `bukti_transfer` = '$nama_file_baru' WHERE `id_laporan` = '$id_laporan';";                
                $this->db->query($sql);
            } else {            
                $sql = "INSERT INTO `laporan_transfer` (`id_panti`, `status_transfer`, `bukti_transfer`,`id_admin`, `bulan_tahun`) VALUES ('$id_panti', '1', '$nama_file_baru', '$id_admin', '$bulan_tahun');";
                $this->db->query($sql);                
            }  

            return true;
        } else {
            return false;
        }
                        
              
    }

    function uploadLaporanPanti(){
        $post = $this->input->post();

        $bulan_tahun = htmlspecialchars($post['bulan-tahun']);
        $id_panti = htmlspecialchars($post['id-panti']);        

        $bulan_tahun_sambung = str_replace(' ', '', $bulan_tahun);
        
        $nama_file_asli = $_FILES['laporan-panti']['name'];
        $nama_pecah = explode(".",$nama_file_asli);  
        $indeks_terakhir = count($nama_pecah)-1;  
        $ekstensi_file = $nama_pecah[$indeks_terakhir];


        $nama_file_baru = $id_panti ."-".$bulan_tahun_sambung."-".strtotime("now").".".$ekstensi_file;
        
        $config['upload_path']          = './assets/file/panti/laporan-keuangan';            
        $config['allowed_types']        = 'xls|xlsx';
        $config['max_size']             = 10000;           
        $config['file_name']            = $nama_file_baru;

        
        $this->load->library('upload', $config);
            $sql = "SELECT id_laporan FROM `laporan_transfer` WHERE `bulan_tahun` = '$bulan_tahun' AND id_panti = '$id_panti'";
            $query = $this->db->query($sql);
            $id_laporan = $query->row_array()['id_laporan'];

        if($this->upload->do_upload('laporan-panti')){               
            $sql = "UPDATE `laporan_transfer` SET `file_laporan_panti` = '$nama_file_baru' WHERE `id_laporan` = '$id_laporan';";                            
            $this->db->query($sql);
        
            return true;
        } else {
            echo "gagal";die;
            return false;
        }
        

        
        //cek apa record sudah ada? kalau belum insert kalau sudah update
              
    }

    

    function getTglDaftarTglSekarang($id_panti){
        $query = $this->db->get_where('panti',array('id_panti'=>$id_panti));

        $start = explode(" ",$query->row_array()['tgl_daftar'])[0]; 
        $end = date("Y-m-d",time());
        
        
        $tgl_daftar    = (new DateTime($start))->modify('first day of this month');
        $tgl_sekarang      = (new DateTime($end))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($tgl_daftar, $interval, $tgl_sekarang);
        
        $bulan = [];
        foreach ($period as $dt) {
            $bulan []= $dt->format("F Y");
        }
        $bulan = array_reverse($bulan);    
        $query = $this->db->get_where('laporan_transfer',array('id_panti'=>$id_panti));

        $data_ln_db = $query->result_array();
       
        $data_lt = [];
        
        $maks_cek = count($data_ln_db);        
        $n_kali_cek = 0;
        foreach ($bulan as $bln) {
            foreach($data_ln_db as $dlb){
                $n_kali_cek++;

                $pisah_bulan_tahun = explode(" ", $bln);

                if($pisah_bulan_tahun[0] == "January"){
                    $kode_bulan = 1;
                } else if($pisah_bulan_tahun[0] == "February"){
                    $kode_bulan = 2;
                } elseif($pisah_bulan_tahun[0] == "March"){
                    $kode_bulan = 3;
                } else if($pisah_bulan_tahun[0] == "April"){
                    $kode_bulan = 4;
                } else if($pisah_bulan_tahun[0] == "May"){
                    $kode_bulan = 5;
                } else if($pisah_bulan_tahun[0] == "June"){
                    $kode_bulan = 6;
                } else if($pisah_bulan_tahun[0] == "July"){
                    $kode_bulan = 7;
                } else if($pisah_bulan_tahun[0] == "August"){
                    $kode_bulan = 8;
                } else if($pisah_bulan_tahun[0] == "October"){
                    $kode_bulan = 9;
                } else if($pisah_bulan_tahun[0] == "September"){
                    $kode_bulan = 10;
                } else if($pisah_bulan_tahun[0] == "November"){
                    $kode_bulan = 11;
                } else if($pisah_bulan_tahun[0] == "December"){
                    $kode_bulan = 12;
                }
                
                $kode_tahun = $pisah_bulan_tahun[1];

                $sql = 'SELECT SUM(pendapatan_panti) AS hasil FROM `donasi` WHERE id_panti = 1 AND status = 1 AND MONTH(tgl_validasi_bukti) = '.$kode_bulan.' AND YEAR(tgl_donasi) = '.$kode_tahun;
                
                $query = $this->db->query($sql);               
                $total_bulanan = $query->row_array()['hasil'];                


                


                if($bln == $dlb['bulan_tahun']){                    
                    $n_kali_cek--;
                    $data_lt[] = [
                        'bulan_tahun' => $bln, 
                        'total_bulanan' => $total_bulanan,
                        'status_transfer' => $dlb['status_transfer'],
                        'bukti_transfer' => $dlb['bukti_transfer'],
                        'file_laporan_panti' => $dlb['file_laporan_panti'],
                        'tgl_perbarui' => date("d M Y", strtotime($dlb['tgl_perbarui'])),   
                        'modal' => $pisah_bulan_tahun[0].$pisah_bulan_tahun[1]                                 
                    ];
                } elseif($n_kali_cek == $maks_cek){
                    $data_lt[] = [
                        'bulan_tahun' => $bln,
                        'total_bulanan' => $total_bulanan,
                        'tgl_perbarui' => '1 '.$bln,     
                        'modal' => $pisah_bulan_tahun[0].$pisah_bulan_tahun[1]                               
                    ];
                }    
            }         
            
            $n_kali_cek = 0;
        }

        // var_dump($data_lt);
        // die;
                
        
        return $data_lt;
    }
       
    function update($id_panti){   
        
        $post = $this->input->post();
       
        
        
        $nama_panti = htmlspecialchars($post["nama-panti"]);
        $email_panti = htmlspecialchars($post["email-panti"]);	
        $ketua_panti = htmlspecialchars($post["ketua-panti"]);
        $jmlh_anak_yatim = htmlspecialchars($post["jmlh-anak-yatim"]);	
        $telepon_panti = htmlspecialchars($post["telepon-panti"]);
        $alamat_panti = htmlspecialchars($post["alamat-panti"]);
        $kota_panti = htmlspecialchars($post["kota-panti"]);	
        $deskripsi_panti_singkat = htmlspecialchars($post["deskripsi-panti-singkat"]);
        $deskripsi_panti_lengkap = $post["deskripsi-panti-lengkap"];
        $logo_panti_lama = htmlspecialchars($post["logo-panti-lama"]);        
        $gambar_utama_lama = htmlspecialchars($post["gambar-utama-lama"]);        
        
        $sql = "UPDATE `panti` SET `nama_panti` = '$nama_panti', `email_panti` = '$email_panti', `ketua_panti` = '$ketua_panti', `jmlh_anak_yatim` = '$jmlh_anak_yatim', `telepon_panti` = '$telepon_panti', `alamat_panti` = '$alamat_panti', `kodekota` = '$kota_panti', `deskripsi_panti_singkat` = '$deskripsi_panti_singkat', `deskripsi_panti_lengkap` = '$deskripsi_panti_lengkap' WHERE `panti`.`id_panti` = '$id_panti';";                

        if ($this->db->query($sql)){

           
            
            if($_FILES['logo-panti']['error']==4){
                $logo_panti = $logo_panti_lama;
            } 
                        
            else {

                $nama_file_baru = $id_panti."-".strtotime("now").".jpg";

                $config['upload_path']          = './assets/img/panti/logo';            
                $config['allowed_types']        = 'jpg';
                $config['max_size']             = 5000;           
                $config['file_name']            = $nama_file_baru;
    
                $this->load->library('upload', $config);

                $this->upload->do_upload('logo-panti');
                $data = array('upload_data' => $this->upload->data());
                
                
                            
                $logo_panti = $nama_file_baru;
            }

            if($_FILES['gambar-utama']['error']==4){
                $gambar_utama = $gambar_utama_lama;
            } 
                        
            else {

                $nama_file_baru = $id_panti."-".strtotime("now").".jpg";

                $config['upload_path']          = './assets/img/panti/gambar-utama';            
                $config['allowed_types']        = 'jpg';
                $config['max_size']             = 5000;           
                $config['file_name']            = $nama_file_baru;
    
                $this->load->library('upload', $config);

                $this->upload->do_upload('gambar-utama');
                $data = array('upload_data' => $this->upload->data());
                                                            
                $gambar_utama = $nama_file_baru;
            }

            
            $sql = "UPDATE `panti` SET `logo_panti` = '$logo_panti',`gambar_utama` = '$gambar_utama' WHERE `panti`.`id_panti` = '$id_panti';";                
            if ($this->db->query($sql)){
                return true;
            } else {
                return false;
            }

        } else {         
            return false;
        }        
        
    }

    function delete($id_panti){        
        $sql = "UPDATE `panti` SET `status_hapus` = '1' WHERE `panti`.`id_panti` = $id_panti";
        $this->db->query($sql);
                
       

        return $this->db->affected_rows();
    }

    function nonaktifkan($id_panti){
        $sql = "UPDATE `panti` SET `status_panti` = '0' WHERE id_panti = '$id_panti';";
        $this->db->query($sql);
        
        return $this->db->affected_rows();
    }

    function aktifkan($id_panti){
        $sql = "UPDATE `panti` SET `status_panti` = '1' WHERE id_panti = '$id_panti';";
        $this->db->query($sql);
        
        return $this->db->affected_rows();
    }

    function resetPassword($id_panti){
        $sql = "UPDATE `panti` SET `password_panti` = '37114f84a396dc776c58289c000945cd' WHERE id_panti = '$id_panti';";
                        
        return $this->db->query($sql);
    }

    function jumlahPantiAktif(){

        $sql = "SELECT nama_panti FROM panti WHERE status_panti = '1'";
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();
        $jumlah = count($hasil);
        
        return $jumlah;
    }


    function tampilkanPantiAktif(){
        $sql = "SELECT nama_panti, gambar_utama, deskripsi_panti_singkat, kota.NAMAKOTA as kota, jmlh_anak_yatim  FROM panti INNER JOIN kota ON panti.kodekota=kota.KODEKOTA WHERE status_panti = '1'";
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();

        return $hasil;
    }

    function dataPagination($number,$offset){
        // var_dump($offset);die;
        $sql = "SELECT id_panti, nama_panti, logo_panti, deskripsi_panti_singkat, kota.NAMAKOTA as kota, jmlh_anak_yatim  FROM panti INNER JOIN kota ON panti.kodekota=kota.KODEKOTA WHERE status_panti = '1' AND status_hapus = '0' LIMIT $offset, $number";
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();
                
        return $hasil;
    }

    function cariPantiIndex(){

        $sql = "SELECT id_panti, nama_panti, logo_panti, deskripsi_panti_singkat, kota.NAMAKOTA as kota, jmlh_anak_yatim  FROM panti INNER JOIN kota ON panti.kodekota=kota.KODEKOTA WHERE status_panti = '1' AND status_hapus = '0' LIMIT 0, 7";
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();
                
        return $hasil;
    }
    
    function cariPantiAktif($number, $offset){
        $cari = $this->input->GET('panti', TRUE) ? $this->input->GET('panti', TRUE) : '' ;
        $id_kota = $this->input->GET('kota', TRUE)  ? $this->input->GET('kota', TRUE) : '';
        
        if ($id_kota == 999){
            $sql = "SELECT id_panti, nama_panti, logo_panti, gambar_utama, deskripsi_panti_singkat, kota.NAMAKOTA as kota, jmlh_anak_yatim  FROM panti INNER JOIN kota ON panti.kodekota=kota.KODEKOTA WHERE status_panti = '1'  AND status_hapus = '0' AND nama_panti LIKE '%$cari%' LIMIT $offset, $number";
        } else {
            $sql = "SELECT id_panti, nama_panti, logo_panti, gambar_utama, deskripsi_panti_singkat, kota.NAMAKOTA as kota, jmlh_anak_yatim  FROM panti INNER JOIN kota ON panti.kodekota=kota.KODEKOTA WHERE status_panti = '1'  AND status_hapus = '0' AND nama_panti LIKE '%$cari%' AND panti.kodekota = $id_kota LIMIT $offset, $number";
        }

        
        
        $data = $this->db->query($sql);
        
		return $data->result_array();
    }

    function jumlahCariPanti(){

        $cari = $this->input->GET('panti', TRUE);
        $id_kota = $this->input->GET('kota', TRUE)  ? $this->input->GET('kota', TRUE) : '';
        
        if ($id_kota == 999){
            $sql = "SELECT nama_panti FROM panti WHERE status_panti = '1' AND nama_panti LIKE '%$cari%'";
        } else {
            $sql = "SELECT nama_panti FROM panti WHERE status_panti = '1' AND nama_panti LIKE '%$cari%' AND panti.kodekota = $id_kota";
        }
        
        
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();
        $jumlah = count($hasil);
        // var_dump($jumlah);die;
        return $jumlah;
    }

        
 
}
?>