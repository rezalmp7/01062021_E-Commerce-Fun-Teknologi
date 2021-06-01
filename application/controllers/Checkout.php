<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTION');
class Checkout extends CI_Controller {

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
        $params = array('server_key' => 'SB-Mid-server-RSnNV0Q8I7ZnxNiCDDU-kjpS', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);

        if($this->session->userdata('ecommerce_fun_status') != 'ecommerce_fun_login')
        {
            redirect(base_url('login'));
        }
    }
	public function index()
	{
        $header['page'] = 'checkout';
        $header['page_name'] = "Checkout";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
        $id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();
        
        $get = $this->input->get();
        $where_pending = array('pending.id_transaction' => $get['id'], );
        $data['data_checkout'] = $this->M_admin->select_select_where_join_3table_type_groupBy('pending.id_transaction, pending.id_produk, produk.nama, produk.harga, produk.discount, gambar_produk.src', 'pending', 'produk', 'pending.id_produk=produk.id', 'left', 'gambar_produk', 'produk.id=gambar_produk.id_produk', 'left', $where_pending, 'pending.id')->result();

        $where_transaksi = array('id' => $get['id'], );
        $data['data_transaksi'] = $this->M_admin->select_where('transaksi', $where_transaksi)->row();

        if(isset($data['data_transaksi']->kupon))
        {
            $where_kupon = array('kode' => $data['data_transaksi']->kupon);
            $data['kupon'] = $this->M_admin->select_where('promo', $where_kupon)->row_array();
        }
        else {
            $data['kupon'] = null;
        }

        // foreach($data['data_checkout'] as $b)
        // {
        //     $where_data_nilai = array(
        //         'id_produk' => $b->id_produk, 
        //         'id_kriteria' => 4
        //     );
        //     $data_nilai = $this->M_admin->select_where('data_nilai', $where_data_nilai)->row();

        //     $nilai_data_nilai = $data_nilai->nilai+1;

        //     $data_nilai_array[] = array(
        //         'id' => $data_nilai->id,
        //         'nilai' => $nilai_data_nilai 
        //     );
        // }
        // echo '<pre>';
        // print_r($data_nilai_array);
        // echo '</pre>';
        // $this->M_admin->updateBatch('data_nilai', $data_nilai_array, 'id');


		$this->load->view('layout/header', $header);
        $this->load->view('checkout', $data);
        $this->load->view('layout/footer');
	}
    public function token()
    {
        $post = $this->input->post();
		// Required
		$transaction_details = array(
		  'order_id' => $post['id_transaksi'],
		  'gross_amount' => $post['harga_dibayar'], // no decimal allowed for creditcard
        //   'gross_amount' => 18000,
		);


		// Optional
		$item_details = array();

        $where_cart = array('id_pelanggan' => $post['id_pelanggan'], );
        $cart = $this->M_admin->select_select_where_join_2table_type('produk.id, produk.nama, produk.discount, produk.harga', 'cart', 'produk', 'cart.id_produk = produk.id', $where_cart, 'left')->result();

        // $item_details[] = array(
        //     'id' => 'a1',
        //     'price' => 18000,
        //     'quantity' => 1,
        //     'name' => "Apple"
        // );

        foreach ($cart as $a) {
            $harga_akhir = $a->harga-($a->harga*$a->discount/100);
            $item_details[] = array(
                'id' => $a->id,
                'price' => $harga_akhir,
                'quantity' => 1,
                'name' => $a->nama
            );
        }
        $item_details[] = array(
            'id' => $post['kupon'],
            'price' => -$post['potongan_kupon'],
            'quantity' => 1,
            'name' => "Potongan Promo"
        );

		// Optional
        $where_pelanggan = array('id' => $post['id_pelanggan'], );
        $pelanggan = $this->M_admin->select_where('pelanggan', $where_pelanggan)->row();
		// Optional
		$customer_details = array(
            'first_name'    => $pelanggan->nama,
            'email'         => $pelanggan->email,
            'phone'         => $pelanggan->whatsapp
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d 01:00:00 O"),
            'unit' => 'hour', 
            'duration'  => 48
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'), true);
    	echo '<pre>';
        print_r($result);
        echo '</pre>';

        
        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');
        
        $where_cart = array('id_pelanggan' => $id_pelanggan, );
        $cart = $this->M_admin->select_select_where_join_2table_type('produk.id, produk.nama, produk.harga, produk.discount, cart.promo', 'cart', 'produk', 'cart.id_produk = produk.id', $where_cart, 'left')->result();

        $promo = null;

        foreach ($cart as $a) {
            $promo = $a->promo;
        }

        $dateTransaction = date('Ymd', strtotime($result['transaction_time']));

		$data = array(
            'id' => $result['order_id'],
            'id_pelanggan' => $id_pelanggan,
            'total_bayar' => $result['gross_amount'],
            'kupon' => $promo,
            'status' =>	'checkout',
            'exp_pay' => date('Y-m-d 01:00:00', strtotime('+2 day')),
            'pdf_url' => $result['pdf_url'],
            'checkout_at' => $result['transaction_time'],
            'done_at' => null,
        );

        $this->M_admin->insert_data('transaksi', $data);

        $data_nilai_array = array();

        foreach($cart as $c)
        {
            $where_data_nilai = array(
                'id_produk' => $c->id, 
                'id_kriteria' => 4
            );
            $data_nilai = $this->M_admin->select_where('data_nilai', $where_data_nilai)->row();

            $nilai_data_nilai = $data_nilai->nilai+1;

            $data_nilai_array[] = array(
                'id' => $data_nilai->id,
                'nilai' => $nilai_data_nilai 
            );
        }
        print_r($data_nilai_array);
        $this->M_admin->updateBatch('data_nilai', $data_nilai_array, 'id');

        $data_pending = array();
        foreach($cart as $b)
        {
            $data_pending[] = array('id_transaction'=> $result['order_id'], 'id_produk'=>$b->id);
        }
        
        $this->M_admin->insertBatch('pending', $data_pending);

        $where_del_cart = array('id_pelanggan' => $id_pelanggan, );
        $this->M_admin->delete_data('cart', $where_del_cart);


        redirect(base_url('checkout?id='.$result['order_id']));

    }
}
