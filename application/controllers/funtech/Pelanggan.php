<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('ecommerce_admin_status') != 'ecommerce_admin_login')
        {
            redirect(base_url('funtech'));
        }
        
        $this->load->model('M_admin');
    }
	public function index()
	{
		$header['page'] = 'pelanggan';
        $header['page_name'] = "Data Pelanggan";

        $data['pelanggan'] = $this->M_admin->select_all('pelanggan')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/pelanggan', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function info()
    {
        
		$header['page'] = 'pelanggan';
        $header['page_name'] = "Info Pelanggan";

        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );

        $where_done = array('done.id_pelanggan' => $get['id'], );
        $data['done'] = $this->M_admin->select_select_where_join_2table_type('done.id, done.id_produk, done.id_pelanggan, produk.nama, produk.kode, done.done_at', 'done', 'produk', 'done.id_produk=produk.id', $where_done, 'left')->result();

        $data['pelanggan'] =$this->M_admin->select_where('pelanggan', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/pelanggan_info', $data);
        $this->load->view('funtech/layout/footer');        
    }
    public function edit()
    {
		$header['page'] = 'pelanggan';
        $header['page_name'] = "Edit Pelanggan";

        $get = $this->input->get();
        
        $where = array('id' => $get['id'] );

        $data['pelanggan'] = $this->M_admin->select_where('pelanggan', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/pelanggan_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    public function tambah()
    {
        $header['page'] = 'pelanggan';
        $header['page_name'] = "Tambah Pelanggan";

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/pelanggan_tambah');
        $this->load->view('funtech/layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $where_cekusername = array(
            'username' => $post['username']
        );
        $cekusername = $this->M_admin->select_where('pelanggan', $where_cekusername)->num_rows();
        
        if($cekusername > 0)
        {
            redirect(base_url('funtech/pelanggan/tambah?msg=username sudah digunakan'));
        }
        else {
            $password = md5($post['password']);
            $create_at = date('Y-m-d H:i:s');

            $data = array(
                'nama' => $post['nama'], 
                'username' => $post['username'], 
                'password' => $password, 
                'tmp_lahir' => $post['tempat'], 
                'tgl_lahir' => $post['tanggal'], 
                'alamat' => $post['alamat'], 
                'email' => $post['email'], 
                'telegram' => $post['telegram'], 
                'whatsapp' => $post['whatsapp'], 
                'create_at' => $create_at, 
            );

            $this->M_admin->insert_data('pelanggan', $data);

            redirect(base_url('funtech/pelanggan'));
        }
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        if($post['username_lama'] == $post['username'])
        {
            if($post['password'] != null)
            {
                $password = md5($post['password']);
            }
            else {
                $password = $post['password_lama'];
            }
            $create_at = date('Y-m-d H:i:s');

            $where = array(
                'id' => $post['id']
            );
            $set = array(
                'nama' => $post['nama'], 
                'username' => $post['username'], 
                'password' => $password, 
                'tmp_lahir' => $post['tempat'], 
                'tgl_lahir' => $post['tanggal'], 
                'alamat' => $post['alamat'], 
                'email' => $post['email'], 
                'telegram' => $post['telegram'], 
                'whatsapp' => $post['whatsapp'],
            );
            $this->M_admin->update_data('pelanggan', $set, $where);

            redirect(base_url('funtech/pelanggan'));
        }
        else {
            $where_cekusername = array(
                'username' => $post['username']
            );
            $cekusername = $this->M_admin->select_where('pelanggan', $where_cekusername)->num_rows();
            
            if($cekusername > 0)
            {
                redirect(base_url('funtech/pelanggan/tambah?msg=username sudah digunakan'));
            }
            else {
                if($post['password'] != null)
                {
                    $password = md5($post['password']);
                }
                else {
                    $password = $post['password_lama'];
                }

                $where = array(
                'id' => $post['id']
                );
                $set = array(
                    'nama' => $post['nama'], 
                    'username' => $post['username'], 
                    'password' => $password, 
                    'tmp_lahir' => $post['tempat'], 
                    'tgl_lahir' => $post['tanggal'], 
                    'alamat' => $post['alamat'], 
                    'email' => $post['email'], 
                    'telegram' => $post['telegram'], 
                    'whatsapp' => $post['whatsapp'],
                );

                $this->M_admin->update_data('pelanggan', $set, $where);

                redirect(base_url('funtech/pelanggan'));
            }
        }
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );
        
        $this->M_admin->delete_data('pelanggan', $where);

        redirect(base_url('funtech/pelanggan'));
    }
}
