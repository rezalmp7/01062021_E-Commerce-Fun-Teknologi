<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

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

        if($this->session->userdata('ecommerce_fun_status') != 'ecommerce_fun_login')
        {
            redirect(base_url('login'));
        }
    }
	public function index()
	{
        $header['page'] = 'wishlist';
        $header['page_name'] = "Wishlist";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
        $id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();

        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');
        $where_wishlist = array('id_pelanggan' => $id_pelanggan, );
        $data['wishlist'] = $this->M_admin->select_select_where_join_3table_type_groupBy('wishlist.id, wishlist.create_at, wishlist.id_produk, produk.nama, produk.harga, produk.discount, produk.kode, gambar_produk.src', 'wishlist', 'produk', 'wishlist.id_produk = produk.id', 'left', 'gambar_produk', 'wishlist.id_produk = gambar_produk.id_produk', 'left', $where_wishlist, 'wishlist.id')->result();

        $data['star'] = $this->M_admin->get_star();

		$this->load->view('layout/header', $header);
        $this->load->view('wishlist', $data);
        $this->load->view('layout/footer');
	}
    public function tambah()
    {
        $get = $this->input->get();
        
        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');

        $where_cek = array(
            'id_produk' => $get['id'], 
            'id_pelanggan' => $id_pelanggan
        );
        $where_cek_pending = array(
            'transaksi.id_pelanggan' => $id_pelanggan,
            'pending.id_produk' => $get['id'] 
        );
        $cek = $this->M_admin->select_where('cart', $where_cek)->num_rows();
        $cek_pending = $this->M_admin->select_select_where_join_2table_type('transaksi.id', 'pending', 'transaksi', 'pending.id_transaction=transaksi.id', $where_cek_pending, 'left')->num_rows();
        if($cek > 0 || $cek_pending > 0)
        {
            redirect(base_url('wishlist?error=produk sudah wishlist/cart/diakun'));
        }
        else {
             $data = array(
                'id_produk' => $get['id'],
                'id_pelanggan' => $id_pelanggan 
            );
            $this->M_admin->insert_data('wishlist', $data);
            
            $where_data_nilai = array(
                'id_produk' => $get['id'], 
                'id_kriteria' => 2 
            );
            $select_data_nilai = $this->M_admin->select_where('data_nilai', $where_data_nilai)->row();

            $nilai_data_nilai = $select_data_nilai->nilai+1;

            $set_data_nilai = array('nilai' => $nilai_data_nilai, );
            
            $this->M_admin->update_data('data_nilai', $set_data_nilai, $where_data_nilai);

            redirect(base_url('wishlist?success=produk berhasil ditambahkan'));
            
        }
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $this->M_admin->delete_data('wishlist', $where);

        redirect(base_url('wishlist'));
    }
}
