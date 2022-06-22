

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_Admin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    }
    

 function gantiFoto(){
        $post = $this->input->post();

        $id_admin = $this->session->userdata('id_admin');
        
        $nama_file_baru = $id_admin."-".strtotime("now").".jpg";
        $config['upload_path']          = './assets/img/admin/foto-profil';            
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 5000;           
        $config['file_name']            = $nama_file_baru;

        
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
      
            $sql = "UPDATE `admin` SET `foto` = '$nama_file_baru' WHERE `id_admin` = '$id_admin';";                
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
        $id_admin = $this->session->userdata('id_admin');

        
        $sql = "SELECT * FROM `admin` WHERE `id_admin` = $id_admin";        
        $query = $this->db->query($sql);   
        $hasil = $query->row_array();        

        if($password_lama == $hasil['password']){
            $sql = "UPDATE `admin` SET `password` = '$password_baru' WHERE `id_admin` = '$id_admin';";                
            $this->db->query($sql);           

            return $this->db->affected_rows(); 
        } else {
            return false;
        }
        
        
           
              
    }
}