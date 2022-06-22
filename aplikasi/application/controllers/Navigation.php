<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kota');
        $this->load->library('pagination');
        $this->load->model('m_panti');

        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));

    }

    public function index()
    {
        $data['pilihkota'] = $this->m_kota->getAll();
        $data['title'] = "Siyatim | Sedekah Membuat Berkah";
        $data['jumlah_panti'] = $this->m_panti->jumlahPantiAktif();
        $data['info_panti'] = $this->m_panti->cariPantiIndex();

        $this->load->view('landing/template/header', $data);
        $this->load->view('landing/index',$data);
        $this->load->view('landing/template/footer');
    }
    

    public function explorePanti()
    {
        $this->load->library('pagination');
        $data['pilihkota'] = $this->m_kota->getAll();
        $data['jumlah_panti'] = $this->m_panti->jumlahPantiAktif();
        
        $data['title'] = "Explore Panti | Siyatim";

        if(isset($_GET['panti'])){            
            
            $jumlah_data = $this->m_panti->jumlahCariPanti();
            
            $config['base_url'] = base_url().'explore-panti/';
            $config['total_rows'] = $jumlah_data;
            $config['per_page'] = 7;
            $config['num_links'] = 3;
            $config['first_link'] = FALSE;
            $config['last_link'] = FALSE;
            
            $config['prev_link'] = 'Sebelumnya';        

            $config['cur_tag_open'] = '<a href="#" class="active">';        
            $config['cur_tag_close'] = '</a>';

                    
            $config['next_link'] = 'Selanjutnya';


            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
            
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;                
            $this->pagination->initialize($config);		
            $data['info_panti'] = $this->m_panti->cariPantiAktif($config['per_page'],$page);
            
            $this->load->view('landing/template/header',$data);
            $this->load->view('landing/explore_panti',$data);
            $this->load->view('landing/template/footer');
        } else {
                                    
            
            $jumlah_data = $this->m_panti->jumlahPantiAktif();
            $config['base_url'] = base_url().'explore-panti/';
            $config['total_rows'] = $jumlah_data;
            $config['per_page'] = 7;
            $config['num_links'] = 3;
            $config['first_link'] = FALSE;
            $config['last_link'] = FALSE;
            
            $config['prev_link'] = 'Sebelumnya';        

            $config['cur_tag_open'] = '<a href="#" class="active">';        
            $config['cur_tag_close'] = '</a>';

                    
            $config['next_link'] = 'Selanjutnya';
            
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;                
            $this->pagination->initialize($config);		
            $data['info_panti'] = $this->m_panti->dataPagination($config['per_page'],$page);
            
            $this->load->view('landing/template/header', $data);
            $this->load->view('landing/explore_panti',$data);
            $this->load->view('landing/template/footer');
        }
    }

    public function detailPanti(){
        $id_panti = $this->uri->segment(2);
        
        $data['panti'] = $this->m_panti->getDetail($id_panti);
        $data['title'] = $data['panti']['nama_panti']. " | Siyatim";

        $this->load->view('landing/template/header',$data);
        $this->load->view('landing/detail_panti',$data);
        $this->load->view('landing/template/footer');
    }

    // public function hasilCariPanti(){

    //     $this->load->library('pagination');

    //     $data['pilihkota'] = $this->m_kota->getAll();
    //     $data['jumlah_panti'] = $this->m_panti->jumlahPantiAktif();
    //     // $data['info_panti'] = $this->m_panti->tampilkanPantiAktif();
        
        
    //     $jumlah_data = $this->m_panti->jumlahCariPanti();
    //     $config['base_url'] = base_url().'explore-panti/cari';
	// 	$config['total_rows'] = $jumlah_data;
    //     $config['per_page'] = 7;
    //     $config['num_links'] = 3;
    //     $config['first_link'] = FALSE;
    //     $config['last_link'] = FALSE;
        
    //     $config['prev_link'] = 'Sebelumnya';        

    //     $config['cur_tag_open'] = '<a href="#" class="active">';        
    //     $config['cur_tag_close'] = '</a>';

                
    //     $config['next_link'] = 'Selanjutnya';
        
    //     $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;                
    //     $this->pagination->initialize($config);	
        
        
    //     $data['info_panti'] = $this->m_panti->dataPagination($config['per_page'],$page);
        
        
    //     $data['info_panti'] = $this->m_panti->cariPantiAktif();

	// 	$this->load->view('landing/template/header',$data);
    //     $this->load->view('landing/explore_panti',$data);
    //     $this->load->view('landing/template/footer');
    // }

    public function about(){
        $data['title'] = "About | Siyatim";

        $this->load->view('landing/template/header', $data);
        $this->load->view('landing/about', $data);
        $this->load->view('landing/template/footer');
    }
    
    public function blog(){        
        redirect('https://blog.siyatim.com');
        
    }

    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }


    public function contact(){
        $post = $this->input->post();
        $data['title'] = "Contact | Siyatim";
                
        //set validation rules
        $this->form_validation->set_rules('fname', 'Nama Awal', 'trim|required|callback_alpha_space_only');
        $this->form_validation->set_rules('lname', 'Nama Akhir', 'trim|required|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subjek', 'trim|required');
        $this->form_validation->set_rules('message', 'Isi Pesan', 'trim|required');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {            
            //validation fails
            $this->load->view('landing/template/header', $data);
            $this->load->view('landing/contact');
            $this->load->view('landing/template/footer');
        }
        else
        {
            // code to send mail
             //get the form data
             $fname = $this->input->post('fname');
             $lname = $this->input->post('lname');
             $from_email = $this->input->post('email');
             $subject = $this->input->post('subject');
             $message = $this->input->post('message');
 
             //set to_email id to which you want to receive mails
             $to_email = 'kontak@siyatim.com';
 
             //configure email settings
             $config['protocol'] = 'smtp';
             $config['smtp_host'] = 'ssl://smtp.gmail.com';
             $config['smtp_port'] = '465';
             $config['smtp_user'] = 'sistem.siyatim@gmail.com';
             $config['smtp_pass'] = 'mslogservice132';
             $config['mailtype'] = 'html';
             $config['charset'] = 'iso-8859-1';
             $config['wordwrap'] = TRUE;
             $config['newline'] = "\r\n"; //use double quotes
            //  $this->load->library('email', $config);
             $this->email->initialize($config);        
             $this->email->set_newline("\r\n");                
 
             //send mail
             $this->email->from($from_email);
             $this->email->to($to_email);
             $this->email->subject($subject);
             $this->email->message($message);
             if ($this->email->send())
             {
                 // mail sent
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Email anda telah berhasil terkirim!</div>');
                 redirect('contact');
             }
             else
             {
                 //error
                 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Ada error saat mengirim email! Silahkan coba lagi nanti</div>');
                 redirect('contact');
             }
            
        }
        
    }

    public function faq(){

        $data['title'] = "FAQ | Siyatim";
        $this->load->view('landing/template/header', $data);
        $this->load->view('landing/faq');
        $this->load->view('landing/template/footer');
    }
}
