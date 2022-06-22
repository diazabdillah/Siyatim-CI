<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function loginDonatur(){
        $this->load->view('auth/login_donatur');
    }
    
    public function daftarDonatur(){        
        $this->load->view('auth/daftar_donatur');
        
    }

    public function resetPasswordDonatur(){        
        $this->load->view('auth/reset_password_donatur');
    }

    public function loginPanti(){
        $this->load->view('auth/login_panti');
    }

    // public function loginAdmin(){
    //     $this->load->view('auth/login_admin');
    // }

    public function daftarkanPanti(){
        redirect(base_url().'contact');
    }

}
