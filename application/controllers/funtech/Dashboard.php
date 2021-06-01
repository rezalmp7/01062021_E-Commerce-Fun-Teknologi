<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$header['page'] = 'dashboard';
		$header['page_name'] = 'Dashboard';

		$bulan_ini = date('m');
		$tahun_ini = date('Y');

		$where = 'MONTH(create_at) = '.$bulan_ini.' AND YEAR(create_at) = '.$tahun_ini;
		$where_transaksi = 'MONTH(checkout_at) = '.$bulan_ini.' AND YEAR(checkout_at) = '.$tahun_ini;
		
		$year = date('Y');

		$where1 = 'MONTH(checkout_at) = 1 AND YEAR(checkout_at) = '.$tahun_ini;
		$where2 = 'MONTH(checkout_at) = 2 AND YEAR(checkout_at) = '.$tahun_ini;
		$where3 = 'MONTH(checkout_at) = 3 AND YEAR(checkout_at) = '.$tahun_ini;
		$where4 = 'MONTH(checkout_at) = 4 AND YEAR(checkout_at) = '.$tahun_ini;
		$where5 = 'MONTH(checkout_at) = 5 AND YEAR(checkout_at) = '.$tahun_ini;
		$where6 = 'MONTH(checkout_at) = 6 AND YEAR(checkout_at) = '.$tahun_ini;
		$where7 = 'MONTH(checkout_at) = 7 AND YEAR(checkout_at) = '.$tahun_ini;
		$where8 = 'MONTH(checkout_at) = 8 AND YEAR(checkout_at) = '.$tahun_ini;
		$where9 = 'MONTH(checkout_at) = 9 AND YEAR(checkout_at) = '.$tahun_ini;
		$where10 = 'MONTH(checkout_at) = 10 AND YEAR(checkout_at) = '.$tahun_ini;
		$where11 = 'MONTH(checkout_at) = 11 AND YEAR(checkout_at) = '.$tahun_ini;
		$where12 = 'MONTH(checkout_at) = 12 AND YEAR(checkout_at) = '.$tahun_ini;

		$data['trnB1'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where1)->num_rows();
		$data['trnB2'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where2)->num_rows();
		$data['trnB3'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where3)->num_rows();
		$data['trnB4'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where4)->num_rows();
		$data['trnB5'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where5)->num_rows();
		$data['trnB6'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where6)->num_rows();
		$data['trnB7'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where7)->num_rows();
		$data['trnB8'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where8)->num_rows();
		$data['trnB9'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where9)->num_rows();
		$data['trnB10'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where10)->num_rows();
		$data['trnB11'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where11)->num_rows();
		$data['trnB12'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where12)->num_rows();

		$data['jml_transaksi'] = $this->M_admin->select_select_where_month_and_year('id', 'transaksi', $where_transaksi)->num_rows();
		$data['jml_pelanggan'] = $this->M_admin->select_select_where_month_and_year('id', 'pelanggan', $where)->num_rows();
		$data['jml_produk'] = $this->M_admin->select_select_where_month_and_year('id', 'produk', $where)->num_rows();

		$avg_produk = $this->M_admin->select_select('avg(star) as avg_star', 'comment')->row();
		$persen_avg_produk = $avg_produk->avg_star/5*100;
		$data['avg_produk'] = ceil($persen_avg_produk);

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/dashboard', $data);
		$this->load->view('funtech/layout/footer');
	}
}
