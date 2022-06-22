<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_panti");
        $this->load->model("m_kota");
        $this->load->model("m_donasi");


        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login_panti');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
      
        $email   = $this->input->post('email');
        $password = $this->input->post('password');

        $panti = $this->db->get_where('panti', ['email_panti' => $email])->row_array();
        
        if ($panti) {        
            if (md5($password) == $panti['password_panti']) {
                
                $data = [
                    'id' => $panti['id_panti'],
                    'nama' => $panti['nama_panti'],
                    'email' => $panti['email_panti'],
                    'akses' => 'panti'
                ];
                $this->session->set_userdata($data);
                redirect('panti/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau password salah.</div>');
                redirect('panti/login');
            }                    
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau password salah.</div>');
            redirect('panti/login');
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('akses');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
        redirect('panti/login');
    }

    
    public function pantiSimpan($id_panti)
    {

        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'panti') {
            $panti = $this->m_panti;

            if ($panti->update($id_panti)) {                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perubahan berhasil disimpan.</div>');
                redirect('panti/dashboard/data-panti/detail/' . $id_panti);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perubahan gagal disimpan.</div>');
                redirect('panti/dashboard/data-panti/detail/' . $id_panti);
            }
        } else {
            redirect('panti/login');
        }
    }

    public function gantiPassword(){     

        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'panti') {

            $this->form_validation->set_rules('password-lama', 'Password Lama', 'required|max_length[30]');
            $this->form_validation->set_rules('password-baru', 'Password Baru', 'required|min_length[7]|max_length[30]');
            $this->form_validation->set_rules('password-baru-ulangi', 'Ulangi Password Baru', 'required|matches[password-baru]');


            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti password gagal. Berikut ini kemungkinannya penyebabnya:
                <ul>
                    <li>Password lama anda salah</li>
                    <li>Password baru tidak sama dengan konfirmasi password</li>
                    <li>Password kurang dari 7 karakter</li>                    
                </ul>                 
                
                </div>');
                    redirect('panti/dashboard');

            } else {
                if($this->m_panti->gantiPassword()){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ganti password berhasil.</div>');
                    redirect('panti/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti password gagal. Password lama anda salah!</div>');
                    redirect('panti/dashboard');
                }                
            }
          

        } else {
            redirect('panti/login');
        }
       
    }


    public function dashboard()
    {
        
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'panti') {
            $id_panti = $this->session->userdata('id');
            
            $this->form_validation->set_rules('nama-panti', 'Panti Asuhan', 'trim|required');
            $this->form_validation->set_rules('email-panti', 'Email', 'trim|required');
            $this->form_validation->set_rules('ketua-panti', 'Ketua Panti', 'trim|required');
            $this->form_validation->set_rules('jmlh-anak-yatim', 'Jumlah Anak Yatim', 'trim|required');
            $this->form_validation->set_rules('telepon-panti', 'Telepon Panti', 'trim|required');
            $this->form_validation->set_rules('alamat-panti', 'Alamat Panti Asuhan', 'trim|required');
            $this->form_validation->set_rules('kota-panti', 'Kota Panti Asuhan', 'trim|required');
            $this->form_validation->set_rules('deskripsi-panti-singkat', 'Deskripsi Singkat Panti', 'trim|required');
            $this->form_validation->set_rules('deskripsi-panti-lengkap', 'Panti Asuhan', 'trim|required');
            

            if ($this->form_validation->run() == false) {
                $data['title'] = "Dashboard Panti Asuhan | Siyatim";
                
                $data['panti'] = $this->m_panti->getDetail($id_panti);
                $data['kota'] = $this->m_kota->getAll();
                $data['donasi'] = $this->m_donasi->getDonasiForPanti($id_panti);
                $data['total_donasi_panti'] = $this->m_donasi->getTotalDonasiForPanti($id_panti);
                $data['total_pendapatan_panti'] = $this->m_donasi->getTotalPendapatanForPanti($id_panti);
                $data['total_untuk_platform'] = $this->m_donasi->getTotalUntukPlatformForPanti($id_panti);
    
                //hitung tanggal rentang daftar sampai hari ini
                $bulan = $this->m_panti->getTglDaftarTglSekarang($id_panti);
                
    
                $data['bulan'] = $bulan;
                
    
                $this->load->view('dashboard/panti/template/header', $data);
                $this->load->view('dashboard/panti/template/topbar', $data);
                $this->load->view('dashboard/panti/template/sidebar', $data);
                $this->load->view('dashboard/panti/fitur/dashboard', $data);  
            } else {
                $this->pantiSimpan($id_panti);
            }                     
        } else {            
            redirect('panti/login');
        }
    }

    public function uploadLaporan()
    {
        if ($this->session->userdata('email') && $this->session->userdata('akses') == 'panti') {
            if (!isset($_POST['bulan-tahun'])){                
                redirect('panti/dashboard');
            }            
            $id_panti = htmlspecialchars($_POST['id-panti']);
            
            $this->form_validation->set_rules('laporan-panti', 'Laporan panti', 'trim|required');            

            if ($this->form_validation->run() == false) {
                if($this->m_panti->uploadLaporanPanti()){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload laporan panti berhasil.</div>');
                    redirect('panti/dashboard');                    
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload laporan panti gagal. Ekstensi file harus .xls atau .xlsx</div>');
                    redirect('panti/dashboard');
                }
                
            } else {
                redirect('admin/dashboard/data-panti/detail/'.$id_panti);
            }
        } else {            
            redirect('panti/login');
        }
    }

}