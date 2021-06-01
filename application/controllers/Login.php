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
        $this->load->model('M_admin');
    }
	public function index()
	{
        $header['page'] = 'login';
        $header['page_name'] = "Login";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
		$id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();

		$this->load->view('layout/header', $header);
        $this->load->view('login');
        $this->load->view('layout/footer');
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
        $cek_login = $this->M_admin->select_where('pelanggan', $where_cek)->num_rows();

        if($cek_login > 0)
        {
            $data_pelanggan = $this->M_admin->select_where('pelanggan', $where_cek)->row_array();

            $data_session = array(
					'ecommerce_fun_status' => "ecommerce_fun_login",
					'ecommerce_fun_nama' => $data_pelanggan['nama'],
					'ecommerce_fun_id' => $data_pelanggan['id'],
					'ecommerce_fun_email' => $data_pelanggan['email'],
					'ecommerce_fun_photo' => $data_pelanggan['photo'],
                    'ecommerce_fun_username' => $data_pelanggan['username'],
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('home'));
        }
        else {
            redirect(base_url('login?error=username/password tidak ditemukan'));
        }
    }
    function aksi_daftar()
    {
        $post= $this->input->post();

        $password = md5($post['password']);

        $data = array(
            'username' => $post['username'],
            'password' => $password,
            'nama' => $post['nama'],
            'tmp_lahir' => $post['tmp_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'alamat' => $post['alamat'],
            'email' => $post['email'],
            'telegram' => $post['telegram'],
            'whatsapp' => $post['whatsapp'],
        );

        $this->M_admin->insert_data('pelanggan', $data);

        redirect(base_url('login?success=register telah berhasil'));
    }
    function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url());
    }
}
