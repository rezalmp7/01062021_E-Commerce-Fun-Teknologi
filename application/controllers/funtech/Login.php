<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        
        $this->load->model("M_admin");
    }
	public function index()
	{
		$header['page'] = 'login';
		$header['page_name'] = 'Login';
		$this->load->view('funtech/login');
	}
    function aksi_login()
    {
        $post = $this->input->post();

        $password = md5($post['password']);

        $where_cek = array
        (
            'username' => $post['username'],
            'password' => $password
        );
        $cek_login = $this->M_admin->select_where('user', $where_cek)->num_rows();

        if($cek_login > 0)
        {
            $data_user = $this->M_admin->select_where('user', $where_cek)->row_array();

            $data_session = array(
					'ecommerce_admin_status' => "ecommerce_admin_login",
					'ecommerce_admin_nama' => $data_user['nama'],
					'ecommerce_admin_id' => $data_user['id'],
					'ecommerce_admin_email' => $data_user['email'],
					'ecommerce_admin_photo' => $data_user['photo'],
                    'ecommerce_admin_username' => $data_user['username'],
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('funtech/dashboard'));
        }
        else {
            redirect(base_url('funtech/login?error=username/password tidak ditemukan'));
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('funtech'));
    }
}
