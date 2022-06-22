<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminRahasiaBanget extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->model('m_panti');
        $this->load->model('m_kota');
        $this->load->model('m_donasi');
        $this->load->model('m_donatur');
        $this->load->model('m_admin');

    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login_admin');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
      
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();
        
        if ($admin) {        
            if (md5($password) == $admin['password']) {
                $data = [
                    'id_admin' => $admin['id_admin'],
                    'username' => $admin['username'],
                    'nama_admin' => $admin['nama'],
                    'akses' => 'admin'
                ];
                $this->session->set_userdata($data);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Astaghfirullah, username atau password salah.</div>');
                redirect('admin/login-rahasia-banget');
            }                    
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Astaghfirullah, username atau password salah.</div>');
            redirect('admin/login-rahasia-banget');
        }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_admin');
        $this->session->unset_userdata('askes');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
        redirect('admin/login-rahasia-banget');
    }

    public function dashboard()
    {
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            
            $username = $this->session->userdata('username');
            $data['admin'] = $this->db->get_where('admin', ['username' => $username])->row_array();
            $data['title'] = "Dashboard Admin | Siyatim";

            $data['jumlah_panti'] = $this->m_panti->getTotalPantiTerdaftar();
            $data['jumlah_donatur'] = $this->m_donatur->getTotalDonaturTerdaftar();
            $data['jumlah_donasi'] = $this->m_donasi->getTotalTransaksiDonasi();
            $data['jumlah_pemasukan'] = $this->m_donasi->getTotalPemasukan();

            $this->load->view('dashboard/admin/template/header', $data);
            $this->load->view('dashboard/admin/template/topbar', $data);
            $this->load->view('dashboard/admin/template/sidebar', $data);
            $this->load->view('dashboard/admin/fitur/dashboard', $data);
            $this->load->view('dashboard/admin/template/footer', $data);
        } else {
            // do something when doesn't exist
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah logout.</div>');
            redirect('admin/login-rahasia-banget');
        }
    }

    public function dashboardDonasi()
    {
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
                $data['title'] = "Data Donasi | Siyatim";
                $username = $this->session->userdata('username');
                $data['admin'] = $this->db->get_where('admin', ['username' => $username])->row_array();
                $data['donasi'] = $this->m_donasi->getAll();
                $this->load->view('dashboard/admin/template/header', $data);
                $this->load->view('dashboard/admin/template/topbar', $data);
                $this->load->view('dashboard/admin/template/sidebar', $data);
                $this->load->view('dashboard/admin/fitur/data-donasi', $data);
            
        } else {
            redirect('admin/login-rahasia-banget');
        }

    }



    public function dashboardDonatur()
    {
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $doantur = $this->m_donatur;
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Data Panti | Siyatim";
                $username = $this->session->userdata('username');
                $data['admin'] = $this->db->get_where('admin', ['username' => $username])->row_array();
                $data['donatur'] = $this->m_donatur->getAll();
                $this->load->view('dashboard/admin/template/header', $data);
                $this->load->view('dashboard/admin/template/topbar', $data);
                $this->load->view('dashboard/admin/template/sidebar', $data);
                $this->load->view('dashboard/admin/fitur/data-donatur', $data);
            } else {
                $this->userDonaturTambah();
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }
    

    public function dashboardPanti()
    {
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $panti = $this->m_panti;
            $this->form_validation->set_rules('nama-panti', 'Panti Asuhan', 'trim|required');
            $this->form_validation->set_rules('email-panti', 'Email', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = "Data Panti | Siyatim";
                $username = $this->session->userdata('username');
                $data['admin'] = $this->db->get_where('admin', ['username' => $username])->row_array();
                $data['panti'] = $this->m_panti->getAll();
                $this->load->view('dashboard/admin/template/header', $data);
                $this->load->view('dashboard/admin/template/topbar', $data);
                $this->load->view('dashboard/admin/template/sidebar', $data);
                $this->load->view('dashboard/admin/fitur/data-panti', $data);
            } else {
                $this->userPantiTambah();
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function userPantiTambah()
    {

        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $panti = $this->m_panti;
            
            
            if ($panti->insertUser() > 0) {

                $pesan_sukses = '
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil Menambahkan!</h5>
                    Data panti asuhan berhasil dibuat.
                </div>';
                
                $this->session->set_flashdata('message', $pesan_sukses);
                redirect('admin/dashboard/data-panti');
                
                
            } else {
                $pesan_gagal = '
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal Menambahkan!</h5>
                    Yaah, data gagal ditambahkan.
              </div>';
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal ditambahkan.</div>');                   
                redirect('admin/dashboard/data-panti');
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function pengaturan(){
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {

            $this->form_validation->set_rules('password-lama', 'Password Lama', 'required|max_length[30]');
            $this->form_validation->set_rules('password-baru', 'Password Baru', 'required|min_length[7]|max_length[30]');
            $this->form_validation->set_rules('password-baru-ulangi', 'Ulangi Password Baru', 'required|matches[password-baru]');


            if ($this->form_validation->run() == false) {
                if(isset($_POST['password-lama'])){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti password gagal.</div>');
                }      
                $username = $this->session->userdata('username');
                $data['admin'] = $this->db->get_where('admin', ['username' => $username])->row_array();
                
                $data['title'] = "Pengaturan | Siyatim";

                // $data['panti'] = $this->m_panti->getAll();
                $this->load->view('dashboard/admin/template/header', $data);
                $this->load->view('dashboard/admin/template/topbar', $data);
                $this->load->view('dashboard/admin/template/sidebar', $data);
                $this->load->view('dashboard/admin/fitur/pengaturan', $data);
                
                          
                    
                                         
            } else {
                $this->gantiPassword();               
            }

            

        } else {
            redirect('admin/login-rahasia-banget');            
        }
    }

    public function userPantiHapus($id_panti)
    {
        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            


            if ($this->m_panti->delete($id_panti) > 0) {
                $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
            } else {
                $this->session->set_flashdata('message_hapus', '<div class="alert alert-danger" role="alert">Data gagal dihapus.</div>');
            }

            redirect('admin/dashboard/data-panti');
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function gantiFoto(){        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            if (!isset($_FILES['foto'])){                
                redirect('admin/dashboard/pengaturan');
            }

            $this->form_validation->set_rules('foto', 'Foto Profil', 'trim|required');

            if ($this->form_validation->run() == false) {
                if($this->m_admin->gantiFoto()){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ganti foto profil berhasil.</div>');
                    redirect('admin/dashboard/pengaturan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti foto profil gagal. Ekstensi gambar harus .jpg</div>');
                    redirect('admin/dashboard/pengaturan');
                }
                
            } else {
                redirect('admin/dashboard/pengaturan');
            }
            
        } else {
            redirect('admin/login-rahasia-banget');
        }
       
    }

    public function gantiPassword(){        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
          
            if($this->m_admin->gantiPassword()){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ganti password berhasil.</div>');
                redirect('admin/dashboard/pengaturan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ganti password gagal. Password lama anda salah!</div>');
                redirect('admin/dashboard/pengaturan');
            }
            
        } else {
            redirect('admin/login-rahasia-banget');
        }
       
    }
    public function uploadBuktiTransfer(){        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            if (!isset($_POST['bulan-tahun'])){                
                redirect('admin/dashboard/data-panti');
            }
            $id_panti = htmlspecialchars($_POST['id-panti']);
            
            $this->form_validation->set_rules('bukti-transfer', 'Bukti transfer', 'trim|required');

            if ($this->form_validation->run() == false) {
                if($this->m_panti->uploadBuktiTransferAdmin()){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload bukti transfer berhasil.</div>');
                    redirect('admin/dashboard/data-panti/detail/'.$id_panti);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload bukti transfer gagal. Ekstensi gambar harus .jpg</div>');
                    redirect('admin/dashboard/data-panti/detail/'.$id_panti);
                }
                
            } else {
                redirect('admin/dashboard/data-panti/detail/'.$id_panti);
            }
            
        } else {
            redirect('admin/login-rahasia-banget');
        }
       
    }
    public function pantiDetail($id_panti)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            
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

                $username = $this->session->userdata('username');
                $data['admin'] = $this->db->get_where('admin', ['username' => $username])->row_array();

                $data['title'] = "Detail Panti | Siyatim";

                $data['panti'] = $this->m_panti->getDetail($id_panti);
                $data['kota'] = $this->m_kota->getAll();
                $data['donasi'] = $this->m_donasi->getDonasiForPanti($id_panti);
                $data['total_donasi_panti'] = $this->m_donasi->getTotalDonasiForPanti($id_panti);
                $data['total_pendapatan_panti'] = $this->m_donasi->getTotalPendapatanForPanti($id_panti);
                $data['total_untuk_platform'] = $this->m_donasi->getTotalUntukPlatformForPanti($id_panti);

                //hitung tanggal rentang daftar sampai hari ini
                $bulan = $this->m_panti->getTglDaftarTglSekarang($id_panti);
                

                $data['bulan'] = $bulan;
                
                
                $this->load->view('dashboard/admin/template/header', $data);
                $this->load->view('dashboard/admin/template/topbar', $data);
                $this->load->view('dashboard/admin/template/sidebar', $data);
                $this->load->view('dashboard/admin/fitur/detail-panti', $data);
            } else {
                $this->pantiSimpan($id_panti);
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }         
    }

    public function pantiSimpan($id_panti)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $panti = $this->m_panti;

            if ($panti->update($id_panti)) {                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perubahan berhasil disimpan.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Perubahan gagal disimpan.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function pantiResetPassword($id_panti)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $panti = $this->m_panti;
           
            if ($panti->resetPassword($id_panti)) {
                
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-success" role="alert">Password berhasil direset ke : siyatim-panti.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            } else {
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-danger" role="alert">Password gagal direset.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function userDonaturTambah()
    {

        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $donatur = $this->m_donatur;
            
            
            if ($donatur->insertUser() > 0) {

                $pesan_sukses = '
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil Menambahkan!</h5>
                    Data donatur asuhan berhasil dibuat.
                </div>';
                
                $this->session->set_flashdata('message', $pesan_sukses);
                redirect('admin/dashboard/data-donatur');
                
                
            } else {
                $pesan_gagal = '
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal Menambahkan!</h5>
                    Yaah, data gagal ditambahkan.
              </div>';
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal ditambahkan.</div>');                   
                redirect('admin/dashboard/data-donatur');
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function donaturUnverifikasi($id_donatur)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $donatur = $this->m_donatur;
           
            if ($donatur->unverifikasi($id_donatur) > 0) {
                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Donatur berhasil di-unverifikasi.</div>');
                redirect('admin/dashboard/data-donatur');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Panti gagal di-univerifikasi.</div>');
                redirect('admin/dashboard/data-donatur');
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function donaturVerifikasi($id_donatur)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $donatur = $this->m_donatur;
           
            if ($donatur->verifikasi($id_donatur) > 0) {
                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Donatur berhasil diverifikasi.</div>');
                redirect('admin/dashboard/data-donatur');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Panti gagal diverifikasi.</div>');
                redirect('admin/dashboard/data-donatur');
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function userDonaturHapus($id_donatur)
    {
        
        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            


            if ($this->m_donatur->delete($id_donatur) > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus.</div>');
            }

            redirect('admin/dashboard/data-donatur');
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function donasiValidasi($id_donasi)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $donasi = $this->m_donasi;
           
            if ($donasi->validasi($id_donasi) > 0) {
                
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-success" role="alert">Donasi berhasil divalidasi.</div>');
                redirect('admin/dashboard/data-donasi');
            } else {
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-danger" role="alert">Donasi gagal divalidasi.</div>');
                redirect('admin/dashboard/data-donasi');
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }
    

    public function donasiPendingkan($id_donasi)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $donasi = $this->m_donasi;
           
            if ($donasi->pendingkan($id_donasi) > 0) {
                
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-success" role="alert">Donasi berhasil dipendingkan.</div>');
                redirect('admin/dashboard/data-donasi');
            } else {
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-danger" role="alert">Donasi gagal dipendingkan.</div>');
                redirect('admin/dashboard/data-donasi');
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    
    public function pantiNonaktifkan($id_panti)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $panti = $this->m_panti;
           
            if ($panti->nonaktifkan($id_panti) > 0) {
                
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-success" role="alert">Panti berhasil dinonaktifkan.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            } else {
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-danger" role="alert">Panti gagal dinonaktifkan.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }
    }

    public function pantiAktifkan($id_panti)
    {

        if ($this->session->userdata('username') && $this->session->userdata('akses') == 'admin') {
            $panti = $this->m_panti;
           
            if ($panti->aktifkan($id_panti) > 0) {
                
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-success" role="alert">Panti berhasil aktifkan.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            } else {
                $this->session->set_flashdata('message_resetpass', '<div class="alert alert-danger" role="alert">Panti gagal dinonaktifkan.</div>');
                redirect('admin/dashboard/data-panti/detail/' . $id_panti);
            }
        } else {
            redirect('admin/login-rahasia-banget');
        }    
    }
}
