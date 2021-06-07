<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller {

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
        //header
        $header['page'] = 'profil';
        $header['page_name'] = "Profil";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
        $id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();
        $where_header_pelanggan = array('id' => $id_pelanggan_session, );
        
        //get session id pelanggan
        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');

        //get database pelanggan for edit profil
        $where_pelanggan = array('id' => $id_pelanggan, );
        $data['pengguna'] = $this->M_admin->select_where('pelanggan', $where_pelanggan)->row();

        //get database produk done
        $where_done = array('id_pelanggan' => $id_pelanggan, );
        $data['source_code'] = $this->M_admin->select_select_where_join_3table_type_groupBy('produk.id, produk.link, produk.nama, gambar_produk.src', 'done', 'produk', 'done.id_produk=produk.id', 'left', 'gambar_produk', 'produk.id=gambar_produk.id_produk', 'left', $where_done, 'done.id')->result();

        $where_checkout = array('transaksi.id_pelanggan' => $id_pelanggan, );
        $data_checkout = $this->M_admin->select_select_where_join_2table_type('transaksi.id, transaksi.total_bayar, transaksi.kupon, transaksi.status, transaksi.exp_pay, transaksi.pdf_url, promo.disc', 'transaksi', 'promo', 'transaksi.kupon = promo.kode', $where_checkout, 'left')->result();

        $data['data_checkout'] = $data_checkout;
        $data['data_pending'] = array();
        foreach ($data_checkout as $a) {
            $where_data_pending = array('pending.id_transaction' => $a->id, );
            $data['data_pending'][$a->id] = $this->M_admin->select_select_where_join_3table_type_groupBy('pending.id_transaction, pending.id_produk, produk.nama, produk.harga, produk.discount, gambar_produk.src', 'pending', 'produk', 'pending.id_produk=produk.id', 'left', 'gambar_produk', 'produk.id=gambar_produk.id_produk', 'left', $where_data_pending, 'pending.id')->result();
        }

        
        $hari_ini = date('Y-m-d H:i:s');
        $where_select_del_exp_pay = array('exp_pay <' => $hari_ini, 'status' => 'checkout');
        $select_del_exp_pay = $this->M_admin->select_where('transaksi', $where_select_del_exp_pay)->result();
        foreach ($select_del_exp_pay as $a) {
            $where_del_exp_pay = array('id' => $a->id, );
            $where_del_exp_pay_pending = array('id_transaction' => $a->id, );
            $this->M_admin->delete_data('transaksi', $where_del_exp_pay);
            $this->M_admin->delete_data('pending', $where_del_exp_pay_pending);
        }

		$this->load->view('layout/header', $header);
        $this->load->view('profil', $data);
        $this->load->view('layout/footer');
	}
    public function edit_pengguna()
    {
        $post = $this->input->post();

        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');

        if($post['password'] != null)
        {
            $password = $post['password'];
        }
        else {
            $password = $post['password_lama'];
        }

        $where = array('id' => $id_pelanggan, );
        $set = array(
            'nama' => $post['nama'],
            'tmp_lahir' => $post['tmp_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
            'password' => $password,
            'alamat' => $post['alamat'],
            'email' => $post['email'],
            'telegram' => $post['telegram'],
            'whatsapp' => $post['whatsapp'] 
        );
        $this->M_admin->update_data('pelanggan', $set, $where);

        redirect(base_url('profil?success=profil berhasil diupdate'));
    }
    public function edit_photo()
    {
        $post = $this->input->post();

        $where = array('id' => $post['id'], );
        $nama = $post['id'];
        
        $config['upload_path'] = './assets/img/pelanggan/'; 
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '1000000';
        $config['file_name'] = $nama;
        $config['overwrite'] = true;
        
        $this->load->library('upload',$config); 

        $this->upload->initialize($config);
            
        if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();
            $nama_return =  $uploadData['file_name'];

            $set = array('photo' => $nama_return, );
            $this->M_admin->update_data('pelanggan', $set, $where);
            
            redirect(base_url('profil?success=photo berhasil diupdate'));
        }
        else {
            echo $this->upload->display_errors();
            redirect(base_url('profil?error=photo gagal diupdate'));
        }
    }
    function download()
    {
        $session = $this->session->userdata();
        $get = $this->input->get();

        $id_session = $session['ecommerce_fun_id'];
        $id_produk = $get['id'];

        //cek id_user

        $where = array(
            'id_produk' => $id_produk,
            'id_pelanggan' => $id_session 
        );
        $cek_produk = $this->M_admin->select_where('done', $where)->num_rows();

        if($cek_produk > 0)
        {
            $where_produk = array(
                'id' => $id_produk, 
            );
            $produk = $this->M_admin->select_select_where('link', 'produk', $where_produk)->row_array();

            redirect($produk['link']);
        }
        else {
            reidrect(base_url());
        }
    }
    function cetak()
    {
        $get = $this->input->get();

        $where_transaksi = array(
            'id' => $get['id'], 
        );
        $where_pending = array(
            'id_transaction' => $get['id'], 
        );

        
        $transaksi = $this->M_admin->select_where('transaksi', $where_transaksi)->row_array();
        $pending = $this->M_admin->select_select_where_join_2table_type('produk.nama, produk.harga', 'pending', 'produk', 'pending.id_produk = produk.id', $where_pending, 'left')->result();

        $where_pelanggan = array(
            'id' => $transaksi['id_pelanggan'], 
        );
        $where_kupon = array(
            'kode' => $transaksi['kupon'], 
        );
        $kupon = $this->M_admin->select_where('promo', $where_kupon)->row_array();
        $pelanggan = $this->M_admin->select_where('pelanggan', $where_pelanggan)->row_array();

        $data = array(
            'transaksi' => $transaksi,
            'pending' => $pending,
            'pelanggan' => $pelanggan,
            'kupon' => $kupon
        );

        $this->load->view('cetak_invoice', $data);
    }
}
