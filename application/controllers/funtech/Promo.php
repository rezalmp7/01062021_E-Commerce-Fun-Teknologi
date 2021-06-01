<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

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
		$header['page'] = 'promo';
        $header['page_name'] = "Daftar Promo";

        $data['promo'] = $this->M_admin->select_all('promo')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/promo', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function tambah()
    {
		$header['page'] = 'promo';
        $header['page_name'] = "Tambah Promo";

        $data['kategori'] = $this->M_admin->select_all('kategori')->result();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/promo_tambah', $data);
        $this->load->view('funtech/layout/footer');

    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $where_cekkode = array(
            'kode' => $post['kode'], );
        $cek_kode = $this->M_admin->select_where('promo', $where_cekkode)->num_rows();

        if($cek_kode > 0)
        {
            redirect(base_url('funtech/promo/tambah?error=kode sudah tepakai'));
        }
        else
        {
            $data = array(
                'kode' => $post['kode'],
                'nama' => $post['nama'],
                'disc' => $post['disc'],
                'start_date' => $post['tgl_start'],
                'end_date' => $post['tgl_end'],
                'kategori' => $post['kategori'],
                'harga_mulai' => $post['harga_start'],
                'harga_akhir' => $post['harga_end'],
                'syt_dsc' => $post['discount'],
                'deskripsi' => $post['deskripsi'],
            );
            $this->M_admin->insert_data('promo', $data);

            redirect(base_url('funtech/promo?success=promo sudah terpakai'));
        }
    }
    public function edit()
    {
		$header['page'] = 'promo';
        $header['page_name'] = "Edit Promo";

        $get = $this->input->get();

        $data['kategori'] = $this->M_admin->select_all('kategori')->result();

        $where = array('id' => $get['id'] );
        $data['promo'] = $this->M_admin->select_where('promo', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/promo_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        if($post['kode_lama'] == $post['kode'])
        {

            $where = array(
                'id' => $post['id'], 
            );
            $set = array(
                'kode' => $post['kode'], 
                'nama' => $post['nama'], 
                'disc' => $post['disc'], 
                'start_date' => $post['tgl_start'], 
                'end_date' => $post['tgl_end'], 
                'harga_mulai' => $post['harga_start'], 
                'harga_akhir' => $post['harga_end'], 
                'syt_dsc' => $post['discount'], 
                'deskripsi' => $post['deskripsi'], 
            );

            $this->M_admin->update_data('promo', $set, $where);

            redirect(base_url('funtech/promo?success=promo berhasil di edit'));
        }
        else {
            $where_cekkode = array('kode' => $post['kode'], );
            $cekkode = $this->M_admin->select_where('promo', $where_cekkode)->num_rows();

            if($cekkode > 0)
            {
                redirect(base_url('funtech/promo/edit?id='.$post['id'].'&error=kode sudah digunakan'));
            }
            else {
                $where = array(
                    'id' => $post['id'], 
                );
                $set = array(
                    'kode' => $post['kode'], 
                    'nama' => $post['nama'], 
                    'disc' => $post['disc'], 
                    'start_date' => $post['tgl_start'], 
                    'end_date' => $post['tgl_end'], 
                    'harga_mulai' => $post['harga_start'], 
                    'harga_akhir' => $post['harga_end'], 
                    'syt_dsc' => $post['discount'], 
                    'deskripsi' => $post['deskripsi'], 
                );

                $this->M_admin->update_data('promo', $set, $where);

                redirect(base_url('funtech/promo?success=promo berhasil di edit'));
            }
        }
    }
    public function info()
    {
		$header['page'] = 'promo';
        $header['page_name'] = "Info Promo";

        $get = $this->input->get();

        $where = array(
            'id' => $get['id'], 
        );

        $select_kode = $this->M_admin->select_where('promo', $where)->row_array();

        $where_digunakan = array(
            'kupon' => $select_kode['kode'], 
        );

        $data['digunakan'] = $this->M_admin->select_where('transaksi', $where_digunakan)->num_rows();
        $data['promo'] = $this->M_admin->select_select_join_2table_type('promo.id, promo.kode, promo.nama, promo.disc, promo.start_date, promo.end_date, promo.kategori, promo.harga_mulai, promo.harga_akhir, promo.syt_dsc, promo.deskripsi, promo.create_at, kategori.nama as nama_kategori', 'promo', 'kategori', 'promo.kategori = kategori.id', 'left')->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/promo_info', $data);
        $this->load->view('funtech/layout/footer');
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id']);

        $this->M_admin->delete_data('promo', $where);

        redirect(base_url('funtech/promo?success=promo berhasil di hapus'));
    }
}
