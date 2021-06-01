<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
    function search()
    {
		$header['page'] = 'produk_search';
        $header['page_name'] = "Search";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
		$id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();

		$data['data_kategori'] = $header['kategori'];

        $get = $this->input->get();

		if(isset($get['sortBy']))
		{
			if($get['sortBy'] == 'terbaru')
			{
				$sortBy = "produk.create_at DESC";
				$vsortBy = 'terbaru';
			}
			elseif ($get['sortBy'] == 'terlama') {
				$sortBy = "produk.create_at ASC";
				$vsortBy = 'terlama';
			}
			elseif ($get['sortBy'] == 'za') {
				$sortBy = "produk.nama DESC";
				$vsortBy = 'terbaru';
			}
			else {
				$sortBy = "produk.nama ASC";
				$vsortBy = 'terbaru';
			}
		}
		else {
			$sortBy = "produk.nama ASC";
			$vsortBy = 'terbaru';
		}

		$data['sortBy_mob'] = $vsortBy;

		
		if(isset($get['kategori']))
		{
			if($get['kategori'] != 'all')
			{
				$kategori = $get['kategori'];
			}
			else {
				$kategori = 'kategori';
			}
		}
		else {
			$kategori = 'kategori';
		}
		
		$header['kat_active'] = $kategori;
		$data['kat_dekstop'] = $kategori;
		
		if(isset($get['price']))
		{
			if($get['price'] != 'all')
			{
				$where_price = "produk.harga BETWEEN ".$get['price'];
				$price = $get['price'];
			}
			else {
				$where_price = "produk.harga = harga";
				$price = 'harga';
			}
		}
		else {
			$where_price = 'produk.harga = harga';
			$price = 'harga';
		}
		$data['price'] = $price;

		$where = 'produk.kategori = '.$kategori.' AND '.$where_price;
		
		$jumlah_data = $this->M_admin->select_all('produk')->num_rows();

        $data['star'] = $this->M_admin->get_star();

		$data['produk'] = $this->M_admin->fun_produk_search('produk.id, produk.nama, produk.harga, produk.discount, gambar_produk.src', 'produk', 'gambar_produk', 'produk.id=gambar_produk.id_produk', $where, $sortBy)->result();
		
        $data['produk_baru'] = $this->M_admin->select_select_join_2table_type_limit_groupBy_orderBy('produk.id, produk.nama, produk.harga, produk.discount, gambar_produk.src', 'produk', 'gambar_produk', 'produk.id=gambar_produk.id_produk', 'left', '10', 'produk.id', 'produk.create_at DESC')->result();

		$this->load->view('layout/header', $header);
		$this->load->view('search', $data);
		$this->load->view('layout/footer');
    }
	function detail()
	{
		$header['page'] = 'produk_detail';
        $header['page_name'] = "Produk Detail";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
		$id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();

		$get = $this->input->get();

		$where_data_nilai = array(
			'id_produk' => $get['id'],
			'id_kriteria' => 1 
		);

		$where_jml_like = array(
			'id_produk' => $get['id'],
			'id_kriteria' => 2 
		);
		$data['jml_like'] = $this->M_admin->select_where('data_nilai', $where_jml_like)->row();
		$select_data_nilai = $this->M_admin->select_where('data_nilai', $where_data_nilai)->row();

		$data_nilai_lihat = $select_data_nilai->nilai+1;

		$set_data_nilai = array('nilai' => $data_nilai_lihat, );

		$this->M_admin->update_data('data_nilai', $set_data_nilai, $where_data_nilai);

		$where = array('produk.id' => $get['id'], );
		$where_gambar = array('id_produk' => $get['id'], );

		$data['produk'] = $this->M_admin->select_select_where_join_2table_type('produk.id, produk.nama, produk.discount, produk.harga, produk.deskripsi, produk.kode, kategori.nama as namaKategori', 'produk', 'kategori', 'produk.kategori = kategori.id', $where, 'left')->row();
		$data['gambar'] = $this->M_admin->select_where('gambar_produk', $where_gambar)->result();

		$where_comment = array('comment.id_produk' => $get['id']);
		$data['comment'] = $this->M_admin->select_select_where_join_3table_type('comment.star, comment.comment, comment.reply, comment.comment_at, comment.reply_at, pelanggan.nama as namaPelanggan, pelanggan.photo as photoPelanggan, user.nama as namaUser', 'comment', 'pelanggan', 'comment.comment_by = pelanggan.id', 'left', 'user', 'comment.reply_by = user.id', 'left', $where_comment)->result();

		$data['star'] = $this->M_admin->get_star();
		
        $data['produk_baru'] = $this->M_admin->select_select_join_2table_type_limit_groupBy_orderBy('produk.id, produk.nama, produk.harga, produk.discount, gambar_produk.src', 'produk', 'gambar_produk', 'produk.id=gambar_produk.id_produk', 'left', '10', 'produk.id', 'produk.create_at DESC')->result();

		$this->load->view('layout/header', $header);
		$this->load->view('produk_detail', $data);
		$this->load->view('layout/footer');
	}
	function comment_tambah()
	{
		$post = $this->input->post();

		$data = array(
			'id_produk' => $post['id_produk'],
			'comment_by' => $post['id'],
			'star' => $post['star'],
			'comment' => $post['comment']
		);

		$this->M_admin->insert_data('comment', $data);

		redirect(base_url('produk/detail?id='.$post['id_produk']));
	}
}
