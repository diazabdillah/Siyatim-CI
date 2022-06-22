<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Donatur extends CI_Controller{
    public function __construct (){
        parent::__construct();
        $this->load->model("m_donatur");
        $this->load->model('m_donasi');
        $this->load->library('form_validation');
    }
    public function index()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
           // echo "zaid";die;
            $this->load->view('auth/login_donatur');
        } else {
            $this->_login();
        }
        
    }

    private function _login()
    {
      
        $email   = $this->input->post('email');
        $password = $this->input->post('password');

        $donatur = $this->db->get_where('donatur', ['email' => $email])->row_array();
        
        if ($donatur) {        
            if (md5($password) == $donatur['password']) {

                if($donatur['status'] == 0){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda belum konfirmasi email, silahkan cek email anda atau hubungi admin.</div>');
                    redirect('login');
                }
                
                $data = [
                    'id' => $donatur['id_donatur'],
                    'nama' => $donatur['nama'],
                    'email' => $donatur['email'],
                    'akses' => 'donatur'
                ];
                $this->session->set_userdata($data);
                redirect('donatur/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau password salah.</div>');
                redirect('login');
            }                    
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau password salah.</div>');
            redirect('login');
        }
        
    }

    
   
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('akses');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
        redirect('login');
    }
    public function dashboard()
    {
        // var_dump($this->session->userdata('akses'));
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {
            
            $data['title'] = "Donasi Saya  | Siyatim";

            $id_donatur = $this->session->userdata('id');            

            $data['donasi'] = $this->m_donasi->getDonasiByDonatur($id_donatur);
            $email = $this->session->userdata('email');

            $data['donatur'] = $this->db->get_where('donatur', ['email' => $email])->row_array();


            // var_dump($data['donasi']);die;/
            $this->load->view('dashboard/donatur/template/header', $data);
            $this->load->view('dashboard/donatur/template/topbar', $data);
            $this->load->view('dashboard/donatur/template/sidebar', $data);
            $this->load->view('dashboard/donatur/fitur/dashboard', $data);
            
        } else {
            // do something when doesn't exist
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
            redirect('login');
        }
    }

    public function detailDonasi($id_donasi){

        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {

            //mengecek apakah donasi diakses oleh donatur yang berhak?
            
            if($this->m_donasi->cekPemilikDonasi($this->session->userdata('id'), $id_donasi) == false){
                redirect('donatur/dashboard');
            }
            $id_donatur = $this->session->userdata('id');   
            $data['title'] = "Detail Donasi | Siyatim";
            $data['donasi'] = $this->m_donasi->getDetailDonasi($id_donasi);
            $email = $this->session->userdata('email');
            $data['donatur'] = $this->db->get_where('donatur', ['email' => $email])->row_array();

            
                     
            
            
            $this->load->view('dashboard/donatur/template/header', $data);
            $this->load->view('dashboard/donatur/template/topbar', $data);
            $this->load->view('dashboard/donatur/template/sidebar', $data);
            $this->load->view('dashboard/donatur/fitur/detail-donasi', $data);
            
        } else {
            // do something when doesn't exist
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
            redirect('login');
        }
    }

    public function gantiFoto(){        
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {
            if (!isset($_FILES['foto'])){                
                redirect('donatur/dashboard/pengaturan');
            }

            $this->form_validation->set_rules('foto', 'Foto Profil', 'trim|required');

            if ($this->form_validation->run() == false) {
                if($this->m_donatur->gantiFoto()){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ganti foto profil berhasil.</div>');
                    redirect('donatur/dashboard/pengaturan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti foto profil gagal. Ekstensi gambar harus .jpg</div>');
                    redirect('donatur/dashboard/pengaturan');
                }
                
            } else {
                redirect('donatur/dashboard/pengaturan');
            }
            
        } else {
            redirect('login');
        }
       
    }

    public function gantiPassword(){        
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {
          
            if($this->m_donatur->gantiPassword()){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ganti password berhasil.</div>');
                redirect('donatur/dashboard/pengaturan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti password gagal. Password lama anda salah!</div>');
                redirect('donatur/dashboard/pengaturan');
            }
            
        } else {
            redirect('login');
        }
       
    }

    public function pengaturan(){
        
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {

            $this->form_validation->set_rules('password-lama', 'Password Lama', 'required|max_length[30]');
            $this->form_validation->set_rules('password-baru', 'Password Baru', 'required|min_length[7]|max_length[30]');
            $this->form_validation->set_rules('password-baru-ulangi', 'Ulangi Password Baru', 'required|matches[password-baru]');


            if ($this->form_validation->run() == false) {
                if(isset($_POST['password-lama'])){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti password gagal.</div>');
                }      
                $email = $this->session->userdata('email');
                $data['donatur'] = $this->db->get_where('donatur', ['email' => $email])->row_array();
                
                $data['title'] = "Pengaturan Akun | Siyatim";
                
                $this->load->view('dashboard/donatur/template/header', $data);
                $this->load->view('dashboard/donatur/template/topbar', $data);
                $this->load->view('dashboard/donatur/template/sidebar', $data);
                $this->load->view('dashboard/donatur/fitur/pengaturan', $data);
                
                          
                    
                                         
            } else {
                $this->gantiPassword();               
            }

            

        } else {
            redirect('login');            
        }
    }

    public function donasi(){
        
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {
            $id_panti = $_POST['id-panti'];            
            $this->form_validation->set_rules('id-panti', 'ID Panti', 'trim|required');
            $this->form_validation->set_rules('nama-donatur', 'Nama Donatur', 'trim|required');
            $this->form_validation->set_rules('no-whatsapp', 'Nomor WhatsApp', 'trim|required');
            $this->form_validation->set_rules('jumlah-donasi', 'Jumlah Donasi', 'integer|greater_than[0]|trim|required');
            
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ada kesalahan saat donasi. Hubungi <b>kontak@siyatim.com.</b> Error 1</div>');
                redirect('panti-asuhan/'.$id_panti);    
                         
                 
            } else {                

                $id_donatur = $this->session->userdata('id');

                $lastid = $this->m_donasi->donaturDonasi($id_donatur);

                if($lastid){
                    
                    redirect('donatur/dashboard/donasi/'.$lastid);   
                    echo "hai"                 ;die;
                } else {
                    echo "else";die;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ada kesalahan saat donasi. Hubungi <b>kontak@siyatim.com.</b> Error 2</div>');
                    redirect('panti-asuhan/'.$id_panti);
                }
                     
            }                     
            
        } else {
            // do something when doesn't exist
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
            redirect('login');
        }
    }

    public function detailDonasiPrint($id_donasi){

        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'donatur') {

            //mengecek apakah donasi diakses oleh donatur yang berhak?
            
            if($this->m_donasi->cekPemilikDonasi($this->session->userdata('id'), $id_donasi) == false){
                redirect('donatur/dashboard');
            }
            $id_donatur = $this->session->userdata('id');   
            $data['title'] = "Detail Donasi | Siyatim";
            $data['donasi'] = $this->m_donasi->getDetailDonasi($id_donasi);

            
                     
                      
            $this->load->view('dashboard/donatur/fitur/print-detail-donasi', $data);
            
        } else {
            // do something when doesn't exist
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
            redirect('login');
        }
    }    

    public function reset(){
        $id_donatur =  $this->uri->segment(3);
        $token_reset_password = $this->uri->segment(4);
        
        
        if($id_donatur != NULL && $token_reset_password != NULL){
        
            $donatur = $this->m_donatur->getDonatur($id_donatur);
            
            //if code matches
            if($donatur['token_reset_password'] == $token_reset_password){
                        
                $data = [
                    'id_donatur' => $id_donatur
                ];
                $this->session->set_userdata($data);
                
                $this->load->view('auth/reset_password_donatur_form');    
                
            }
            else{                

                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Link tidak valid, silahkan hubungi <b>kontak@siyatim.com</b></div>');
                redirect('login');

            }    
        } else {
            redirect('login');
                       
        }
 
    }

    

    public function aktivasi(){
        $id =  $this->uri->segment(3);
		$token = $this->uri->segment(4);
 
		//fetch user details
		$donatur = $this->m_donatur->getDonatur($id);
 
		//if code matches
		if($donatur['token'] == $token){
			//update user active status
			$data['status'] = 1;
			$query = $this->m_donatur->aktivasi($data, $id);
 
			if($query){
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Selamat! Email berhasil terkonfirmasi, silahkan login.</div>');
			}
			else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Error terjadi, silahkan hubungi <b>kontak@siyatim.com</b></div>');
			}
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Error kode, silahkan hubungi <b>kontak@siyatim.com</b>.</div>');
		}
 
		redirect('login');
    }

    public function resetPasswordLast(){
        $id_donatur = $this->session->userdata('id_donatur');
        
        
		$this->form_validation->set_rules('password-baru', 'Password Baru', 'required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('password-konfirmasi', 'Password Konfirmasi', 'required|min_length[7]|max_length[30]|matches[password-baru]');

        if ($this->form_validation->run() == FALSE){            
         	$this->load->view('auth/reset_password_donatur_form');
        } else {
            if($this->m_donatur->resetPasswordLast($id_donatur)){
                $this->session->unset_userdata('id_donatur');
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Reset password berhasil, sekarang anda dapat login dengan password baru.</div>');
                redirect('login');
            } else {
                $this->session->unset_userdata('id_donatur');
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Reset password gagal, silahkan hubungi <b>kontak@siyatim.com</b>.</div>');
                redirect('login');
            }
        }
    }

    public function resetPassword(){        
        
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        
        if ($this->form_validation->run() == FALSE) { 
         	$this->load->view('auth/reset_password_donatur');
        }        

		else{
            
            //get user inputs            
			$email = $this->input->post('email');			
            
			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$token = substr(str_shuffle($set), 0, 12);
 
            //insert user to users table and get id            		
			$id = $this->m_donatur->resetPassword($email, $token);
            
			//set up email
			$config = array(
                'protocol' => 'smtp',
                'smtp_timeout' => '30',
		  		'smtp_host' => 'ssl://smtp.gmail.com',
		  		'smtp_port' => '465',
		  		'smtp_user' => 'sistem.siyatim@gmail.com', // change it to yours
		  		'smtp_pass' => 'mslogservice132', // change it to yours
		  		'mailtype' => 'html',
		  		'charset' => 'iso-8859-1',
		  		'wordwrap' => TRUE
			);
 
            $message = 	"
            <html>
            <head>
                <title>Konfirmasi Pendaftaran | Siyatim</title>
            </head>
            <body>
                <h1>Halo,</h1>
                <h2>Telah ada permintaan untuk reset password akun donatur anda.</h2>
                <p> Untuk mereset password klik link di bawah ini :</p>                                
                <h4><a href='".base_url()."donatur/reset/".$id."/".$token."'>Reset Password</a></h4>

                <p>Jika anda tidak melakukan permintaan tersebut, cukup abaikan email ini.</p>
            </body>
            </html>
            ";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user'], 'Siyatim');
            $this->email->to($email);
            $this->email->subject('Reset Password Donatur');
            $this->email->message($message);
 
		    //sending email
		    if($this->email->send()){                
		    	$this->session->set_flashdata('message_daftar','<div class="alert alert-success text-center">Email konfirmasi telah terkirim ke <b>'. $email.'</b></div>');
                redirect('login');
            }
		    else{
		    	$this->session->set_flashdata('message_daftar', '<div class="alert alert-danger text-center">Gagal mendaftar, silahkan cek kembali data yang anda masukkan.</div>');
                redirect('daftar');
		    }
 
        	
        }
    }
    
    public function register(){
        $this->form_validation->set_rules('nama', 'Nama', 'min_length[3]|max_length[30]|required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) { 
         	$this->load->view('auth/daftar_donatur');
        } else {
            if ($this->m_donatur->cekEmailDuplikat($this->input->post('email')) == TRUE){
                $this->session->set_flashdata('message_daftar','<div class="alert alert-danger text-center">Email <b>'. $this->input->post('email').'</b> sudah terdaftar.</div>');            
                redirect('daftar');            
            }
    
            else{
                
                //get user inputs
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
     
                //generate simple random code
                $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $token = substr(str_shuffle($set), 0, 12);
     
                //insert user to users table and get id
                $user['nama'] = $nama;
                $user['email'] = $email;
                $user['password'] = md5($password);
                $user['token'] = $token;
                $user['status'] = 0;
                $id = $this->m_donatur->insertRegistrasi($user);
                
                //set up email
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_timeout' => '30',
                      'smtp_host' => 'ssl://smtp.gmail.com',
                      'smtp_port' => '465',
                      'smtp_user' => 'sistem.siyatim@gmail.com', // change it to yours
                      'smtp_pass' => 'mslogservice132', // change it to yours
                      'mailtype' => 'html',
                      'charset' => 'iso-8859-1',
                      'wordwrap' => TRUE
                );
     
                $message = 	"
                            <html>
                            <head>
                                <title>Konfirmasi Pendaftaran | Siyatim</title>
                            </head>
                            <body>
                                <h2>Terima kasih telah mendaftar.</h2>
                                <p>Akun anda:</p>
                                <p>Email: ".$email."</p>
                                <p>Password: ".$password."</p>
                                <p>Silahkan klik link di bawah untuk aktivasi akun Siyatim.</p>
                                <h4><a href='".base_url()."donatur/aktivasi/".$id."/".$token."'>Aktifkan Akun Donaturmu</a></h4>
                            </body>
                            </html>
                            ";
     
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($config['smtp_user'], 'Siyatim');
                $this->email->to($email);
                $this->email->subject('Konfirmasi Pendaftaran Email');
                $this->email->message($message);
     
                //sending email
                if($this->email->send()){                
                    $this->session->set_flashdata('message_daftar','<div class="alert alert-success text-center">Email konfirmasi telah terkirim ke <b>'. $email.'</b></div>');
                    redirect('login');
                }
                else{
                    $this->session->set_flashdata('message_daftar', '<div class="alert alert-danger text-center">Gagal mendaftar, silahkan cek kembali data yang anda masukkan.</div>');
                    redirect('daftar');
                }
     
                
            }
        }         
        
 
	}
}




?>