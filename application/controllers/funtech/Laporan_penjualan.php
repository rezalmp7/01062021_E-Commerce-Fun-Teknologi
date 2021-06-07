<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

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
		$header['page'] = 'laporan_penjualan';
        $header['page_name'] = "Data Laporan Penjualan";

        $data['laporan_penjualan'] = $this->M_admin->select_select_join_2table_type_orderBy('transaksi.id, transaksi.status, transaksi.total_bayar, pelanggan.nama as nama, transaksi.checkout_at', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', 'left', 'transaksi.checkout_at DESC')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/laporan_penjualan', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function info()
    {
        $get = $this->input->get();

		$header['page'] = 'laporan_penjualan';
        $header['page_name'] = "Info Laporan Penjualan";

        // $get = $this->input->get();

        // $where = array(
        //     'id' => $get['id']
        // );

        // $data['laporan_penjualan'] =$this->M_admin->select_where('transaksi', $where)->row();

		$where = array('transaksi.id' => $get['id'], );
        $penjualan = $this->M_admin->select_select_where_join_2table_type('transaksi.id, transaksi.total_bayar, transaksi.kupon, transaksi.checkout_at, transaksi.id_pelanggan, pelanggan.nama', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan = pelanggan.id', $where, 'left')->row();

		if($penjualan->kupon != null)
		{
			$where_kupon = array('kode' => $penjualan->kupon, );
			$data['kupon'] = $this->M_admin->select_where('promo', $where_kupon)->row();
		}
		else {
			$data['kupon'] = null;
		}

		$data['penjualan'] = $penjualan;

		$where_pending = array('pending.id_transaction' => $get['id'], );
        $data['data_pending'] = $this->M_admin->select_select_where_join_3table_type_groupBy('pending.id_transaction, pending.id_produk, produk.nama, produk.kode, produk.harga, produk.discount, gambar_produk.src', 'pending', 'produk', 'pending.id_produk=produk.id', 'left', 'gambar_produk', 'produk.id=gambar_produk.id_produk', 'left', $where_pending, 'pending.id')->result();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/penjualan_info', $data);
        $this->load->view('funtech/layout/footer');        
    }
    public function cetak()
    {
		$post = $this->input->post();


		$where = array(
			'status' => 'done', 
		);
		
		$data['laporan_penjualan'] = $this->M_admin->select_query("SELECT transaksi.id, transaksi.status, transaksi.total_bayar, pelanggan.nama, transaksi.checkout_at, transaksi.done_at FROM transaksi LEFT JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id WHERE transaksi.status = 'done' AND transaksi.done_at BETWEEN '".$post['tgl_awal']."' AND '".$post['tgl_akhir']."' ORDER BY transaksi.checkout_at")->result();
        
		$this->load->view('funtech/laporan_cetak', $data);
    }
}
