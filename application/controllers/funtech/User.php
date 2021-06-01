<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$header['page'] = 'user';
        $header['page_name'] = "Data User";

        $data['user'] = $this->M_admin->select_all('user')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/user', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function edit()
    {
		$header['page'] = 'user';
        $header['page_name'] = "Edit User";

        $get = $this->input->get();
        
        $where = array('id' => $get['id'] );

        $data['user'] = $this->M_admin->select_where('user', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/user_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    public function tambah()
    {
        $header['page'] = 'user';
        $header['page_name'] = "Tambah User";

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/user_tambah');
        $this->load->view('funtech/layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $password = md5($post['password']);
        $create_at = date('Y-m-d H:i:s');

        $data = array(
            'nama' => $post['nama'], 
            'username' => $post['username'], 
            'password' => $password, 
            'no_hp' => $post['no_hp'], 
            'email' => $post['email'], 
            'create_at' => $create_at, 
        );

        $this->M_admin->insert_data('user', $data);

        redirect(base_url('funtech/user'));
    }
    function edit_aksi()
    {
        $post = $this->input->post();

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
            'no_hp' => $post['no_hp'], 
            'email' => $post['email'], 
        );
        
        $this->M_admin->update_data('user', $set, $where);

        redirect(base_url('funtech/user'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );

        $this->M_admin->delete_data('user', $where);

        redirect(base_url('funtech/user'));
    }
}
