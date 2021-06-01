<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
		$header['page'] = 'kategori';
        $header['page_name'] = "Data Kategori";

        $data['kategori'] = $this->M_admin->select_all('kategori')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/kategori', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'kategori';
        $header['page_name'] = "Tambah Kategori";

        $cek_maxid = $this->M_admin->select_select('max(id) as max_id', 'kategori')->row_array();

        if($cek_maxid != null)
        {
            $data['id'] = $cek_maxid['max_id']+1;
        }
        else {
            $data['id'] = 1;
        }
        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/kategori_tambah', $data);
        $this->load->view('funtech/layout/footer');
    }
    public function edit()
    {
        $header['page'] = 'kategori';
        $header['page_name'] = "Edit Kategori";

        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );

        $data['kategori'] = $this->M_admin->select_where('kategori', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/kategori_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $create_at = date('Y-m-d H:i:s');
        
        $data = array(
            'id' => $post['id'],
            'nama' => $post['nama'],
            'alias' => $post['alias'],
            'icon' => $post['icon'],
            'create_at' => $create_at
        );
        $this->M_admin->insert_data('kategori', $data);

        redirect(base_url('funtech/kategori'));
    }
    function edit_aksi()
    {
        $post = $this->input->post();
        
        $where = array(
            'id' => $post['id']
        );
        $set = array(
            'nama' => $post['nama'],
            'alias' => $post['alias'],
            'icon' => $post['icon']
        );

        $this->M_admin->update_data('kategori', $set, $where);

        redirect(base_url('funtech/kategori?msg=kategori berhasil di update'));
    }
    function hapus()
    {
        $get = $this->input->get();
        
        $where = array(
            'id' => $get['id']
        );

        $this->M_admin->delete_data('kategori', $where);

        redirect(base_url('funtech/kategori?msg=kategori berhasil di hapus'));
    }
}
