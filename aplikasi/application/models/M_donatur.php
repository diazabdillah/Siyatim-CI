<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_Donatur extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    }

    function gantiFoto(){
        $post = $this->input->post();

        $id_donatur = $this->session->userdata('id');
        
        $nama_file_baru = $id_donatur."-".strtotime("now").".jpg";
        $config['upload_path']          = './assets/img/donatur/foto-profil';            
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 5000;           
        $config['file_name']            = $nama_file_baru;

        
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
      
            $sql = "UPDATE `donatur` SET `foto` = '$nama_file_baru' WHERE `id_donatur` = '$id_donatur';";                
            $this->db->query($sql);           

            return true;
        } else {
            return false;
        }
                        
              
    }


    function gantiPassword(){
        $post = $this->input->post();

        $password_lama = md5($post["password-lama"]);
        $password_baru = md5($post["password-baru"]);
        $id_donatur = $this->session->userdata('id');

        
        $sql = "SELECT * FROM `donatur` WHERE `id_donatur` = $id_donatur";        
        $query = $this->db->query($sql);   
        $hasil = $query->row_array();        

        if($password_lama == $hasil['password']){
            $sql = "UPDATE `donatur` SET `password` = '$password_baru' WHERE `id_donatur` = '$id_donatur';";                
            $this->db->query($sql);           

            return $this->db->affected_rows(); 
        } else {
            return false;
        }
    }
        
        

    function getTotalDonaturTerdaftar(){
        $sql = "SELECT * FROM `donatur` WHERE status_hapus = 0";
        
        $query = $this->db->query($sql);   
        $hasil = $query->result_array();
        
        $jumlah = count($hasil);
        
        return $jumlah;
    }

    function resetPasswordLast($id_donatur){
        $post = $this->input->post();        
        $password_baru = md5($post['password-baru']);

        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $new_token = substr(str_shuffle($set), 0, 12);

        $sql = "UPDATE `donatur` SET `password` = '$password_baru', `token_reset_password` = '$new_token' WHERE id_donatur = '$id_donatur'";                
        
        $this->db->query($sql);

        return $this->db->affected_rows();  


    }

    function resetPassword($email, $token){   
        $post = $this->input->post();        
        
        $email = htmlspecialchars($post["email"]);	
        $query = $this->db->query("SELECT id_donatur FROM donatur WHERE email = '$email'");
        $hasil = $query->row_array();
        $id_donatur = $hasil['id_donatur'];        


        $sql = "UPDATE `donatur` SET `token_reset_password` = '$token' WHERE id_donatur = '$id_donatur'";                
        
        $this->db->query($sql);
        

        return $id_donatur;     
    }
    
    function insertUser(){   
        $post = $this->input->post();
        // var_dump($post);die;
        
        $nama = htmlspecialchars($post["nama"]);
        $email = htmlspecialchars($post["email"]);	

        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle($set), 0, 12);
        

        $sql = "INSERT INTO `donatur` (`nama`, `email`, `password`, `token`) VALUES ('$nama', '$email', 'b38e088ef123d8ba1e5e16ce589536bc', '$token');";
        $this->db->query($sql);
        return $this->db->affected_rows();        
    }
    
    public function insertRegistrasi($donatur){
        
        $this->db->insert('donatur', $donatur);
        return $this->db->insert_id(); 
        
    }
    
    public function cekEmailDuplikat($post_email){

        $query = $this->db->get_where('donatur', array('email' => $post_email));
        
        $count_row = $query->num_rows();
            
        if ($count_row > 0) {          
            return TRUE; 
         } else {          
            return FALSE; 
         }
    }

    public function aktivasi($data, $id){
		$this->db->where('donatur.id_donatur', $id);
		return $this->db->update('donatur', $data);
	}

    public function getDonatur($id){
		$query = $this->db->get_where('donatur',array('id_donatur'=>$id));
		return $query->row_array();
    }

    function unverifikasi($id_donatur){
        $sql = "UPDATE `donatur` SET `status` = '0' WHERE id_donatur = '$id_donatur';";
        $this->db->query($sql);
        
        return $this->db->affected_rows();
    }

    function verifikasi($id_donatur){
        $sql = "UPDATE `donatur` SET `status` = '1' WHERE id_donatur = '$id_donatur';";
        $this->db->query($sql);
        
        return $this->db->affected_rows();
    }
   

	function getAll(){
		$query = $this->db->query('SELECT id_donatur, nama, email, status  FROM donatur WHERE status_hapus = 0');
        return $query->result_array();
    }
       
    function update($id_Donatur){   
        
        $post = $this->input->post();
       
        
        
        $nama = htmlspecialchars($post["nama"]);
        $email = htmlspecialchars($post["email"]);	
        $alamat = htmlspecialchars($post["alamat"]);
        	
       
        $sql = "UPDATE `donatur` SET `nama` = '$nama', `email` = '$email', `alamat_panti` = '$alamat';";                

        if ($this->db->query($sql)){

           
            
            if($_FILES['logo']['error']==4){
                $logo = $logo;
            } 
                        
            else {

                $nama_file_baru = $id_donatur."-".strtotime("now").".jpg";

                $config['upload_path']          = './assets/img/panti/logo';            
                $config['allowed_types']        = 'jpg';
                $config['max_size']             = 5000;           
                $config['file_name']            = $nama_file_baru;
    
                $this->load->library('upload', $config);

                $this->upload->do_upload('logo');
                $data = array('upload_data' => $this->upload->data());
                
                
                            
                $logo = $nama_file_baru;
            }

            if($_FILES['gambar-utama']['error']==4){
                $gambar_utama = $gambar_utama_lama;
            } 
                        
            else {

                $nama_file_baru = $id_donatur."-".strtotime("now").".jpg";

                $config['upload_path']          = './assets/img/panti/gambar-utama';            
                $config['allowed_types']        = 'jpg';
                $config['max_size']             = 5000;           
                $config['file_name']            = $nama_file_baru;
    
                $this->load->library('upload', $config);

                $this->upload->do_upload('gambar-utama');
                $data = array('upload_data' => $this->upload->data());
                                                            
                $gambar_utama = $nama_file_baru;
            }

            
            $sql = "UPDATE `donatur` SET `logo` = '$logo_panti',`gambar_utama` = '$gambar_utama' WHERE `donatur`.`id_donatur` = '$id_donatur';";                
            if ($this->db->query($sql)){
                return true;
            } else {
                return false;
            }

        } else {         
            return false;
        }        
        
    }

    function delete($id_donatur){        
        $sql = "UPDATE `donatur` SET `status_hapus` = '1' WHERE `donatur`.`id_donatur` = $id_donatur";
        $this->db->query($sql);                       

        return $this->db->affected_rows();         
    }

    // function nonaktifkan($id_donatur){
    //     $sql = "UPDATE `donatur` SET `status` = '0' WHERE id_donatur = '$id_donatur';";
    //     $this->db->query($sql);
        
    //     return $this->db->affected_rows();
    // }

    // function aktifkan($id_donatur){
    //     $sql = "UPDATE `doantur` SET `status` = '1' WHERE id_doantur = '$id_doantur';";
    //     $this->db->query($sql);
        
    //     return $this->db->affected_rows();
    // }

    // function resetPassword($id_panti){
    //     $sql = "UPDATE `doantur` SET `password` = '37114f84a396dc776c58289c000945cd' WHERE id_daontur = '$id_donatur';";
                        
    //     return $this->db->query($sql);
    // }

    function jumlahdonaturAktif(){

        $sql = "SELECT nama FROM donatur WHERE status = '1'";
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();
        $jumlah = count($hasil);
        
        return $jumlah;
    }

    
    function dataPagination($number,$offset){
        // var_dump($offset);die;
        $sql = "SELECT nama_panti, gambar_utama, deskripsi_panti_singkat, kota.NAMAKOTA as kota, jmlh_anak_yatim  FROM donatur INNER JOIN kota ON panti.kodekota=kota.KODEKOTA WHERE status_panti = '1' LIMIT $offset, $number";
        $panti_aktif = $this->db->query($sql);
        $hasil = $panti_aktif->result_array();
                
        return $hasil;
    }
    
   

    // function jumlahCardoantur(){

    //     $cari = $this->input->GET('donatur', TRUE);
    //     $id_kota = $this->input->GET('kota', TRUE)  ? $this->input->GET('kota', TRUE) : '';
        
    //     if ($id_kota == 999){
    //         $sql = "SELECT nama FROM donatur WHERE status = '1' AND nama LIKE '%$cari%'";
    //     } else {
    //         $sql = "SELECT nama FROM donatur WHERE status = '1' AND nama LIKE '%$cari%' AND donatur.kodekota = $id_kota";
    //     }
        
        
    //     $panti_aktif = $this->db->query($sql);
    //     $hasil = $panti_aktif->result_array();
    //     $jumlah = count($hasil);
    //     // var_dump($jumlah);die;
    //     return $jumlah;
    // }

}
?>