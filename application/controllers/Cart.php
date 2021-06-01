<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
        $header['page'] = 'cart';
        $header['page_name'] = "Cart";
        $header['kategori'] = $this->M_admin->select_select_limit('*', 'kategori', '4')->result();
        $id_pelanggan_session = $this->session->userdata('ecommerce_fun_id');
        $where_header = array('id_pelanggan' => $id_pelanggan_session, );
        $header['jml_cart'] = $this->M_admin->select_where('cart', $where_header)->num_rows();
        $header['jml_wishlist'] = $this->M_admin->select_where('wishlist', $where_header)->num_rows();

        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');
        $where_cart = array('id_pelanggan' => $id_pelanggan, );
        $data['cart'] = $this->M_admin->select_select_where_join_3table_type_groupBy('cart.id, cart.create_at, cart.id_produk, produk.nama, produk.harga, produk.discount, produk.kode, produk.kategori, gambar_produk.src', 'cart', 'produk', 'cart.id_produk = produk.id', 'left', 'gambar_produk', 'cart.id_produk = gambar_produk.id_produk', 'left', $where_cart, 'cart.id')->result();

        $where_cek_promo = array('id_pengguna' => $id_pelanggan, );
        $cek_promo = $this->M_admin->select_select_limit_orderBy('promo', 'cart', '1', 'id_pelanggan DESC')->row_array();

        if(isset($cek_promo['promo']))
        {
            if($cek_promo['promo'] != null)
            {
                $where_promo = array('kode' => $cek_promo['promo'], );
                $data['promo'] = $this->M_admin->select_where('promo', $where_promo)->row();
            }
            else {
                $data['promo'] = null;
            }
        }
        else {
            $data['promo'] = null;
        }

		$this->load->view('layout/header', $header);
        $this->load->view('cart', $data);
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
            redirect(base_url('cart?error=produk sudah dicart/diakun'));
        }
        else {
             $data = array(
                'id_produk' => $get['id'],
                'id_pelanggan' => $id_pelanggan 
            );
            $this->M_admin->insert_data('cart', $data);

            $where_data_nilai = array(
                'id_produk' => $get['id'], 
                'id_kriteria' => 3 
            );
            $select_data_nilai = $this->M_admin->select_where('data_nilai', $where_data_nilai)->row();

            $nilai_data_nilai = $select_data_nilai->nilai+1;

            $set_data_nilai = array(
                'nilai' => $nilai_data_nilai, 
            );
            $this->M_admin->update_data('data_nilai', $set_data_nilai, $where_data_nilai);

            redirect(base_url('cart?success=produk berhasil ditambahkan'));
            
        }
    }
    function tambah_promo()
    {
        $post = $this->input->post();

        $where = array(
            'kode' => $post['kode']
        );
        $cek_promo = $this->M_admin->select_where('promo', $where)->num_rows();
        $promo = $this->M_admin->select_where('promo', $where)->row_array();
        if($cek_promo > 0)
        {
            //cek harga
            if($post['harga'] < $promo['harga_mulai'] || $post['harga'] > $promo['harga_akhir'])
            {
                $harga = 'gagal';
            }
            else {
                $harga = 'berhasil';
            }

            //cek kategori
            $where_diff_kat = $promo['kategori'];
            $kategori_diff = array_diff($post['kategori'], array($where_diff_kat));
            $count_kategori = count($kategori_diff);
            if($count_kategori > 0)
            {
                $kategori = 'gagal';
            }
            else {
                $kategori = 'berhasil';
            }

            //cek tanggal
            $today = date("Y-m-d");
            if($today < $promo['start_date'] || $today > $promo['end_date'])
            {
                $date = 'gagal';
            }
            else {
                $date = 'berhasil';
            }
            $where_diff_disc = array($promo['syt_dsc']);
            $no1100 = array();
            $no = 1;
            for($i=0;$no<=100;$i++)
            {
                $no1100[$i] = $no;
                $no++;
            }
            if($promo['syt_dsc'] == 'non')
            {
                $discount_diff = array_diff($post['disc'], array('0'));
                $count_disc = count($discount_diff);
                if($count_disc > 0)
                {
                    $syt_dsc = 'gagal';
                }
                else {
                    $syt_dsc = 'berhasil';
                }
            }
            elseif ($promo['syt_dsc'] == 'disc') {
                $discount_diff = array_diff($post['disc'], $no1100);
                $count_disc = count($discount_diff);
                if($count_disc > 0)
                {
                    $syt_dsc = 'gagal';
                }
                else {
                    $syt_dsc = 'berhasil';
                }
            }
            else {
                $syt_dsc = 'berhasil';
            }

            $id_pelanggan = $this->session->userdata('ecommerce_fun_id');
            if($harga=='gagal' || $kategori=='gagal' || $date=='gagal' || $syt_dsc == 'gagal')
            {
                print_r($post['kategori']);
                print_r($kategori_diff);
                redirect(base_url('cart?error=gagal menambahkan kode promo'.$kategori.'-'.$date.'-'.$harga.'-'.$syt_dsc));
            }
            else {
                $where_update = array('id_pelanggan' => $id_pelanggan, );
                $set = array(
                    'promo' => $post['kode'], 
                );

                $this->M_admin->update_data('cart', $set, $where_update);

                echo "gagal";
                redirect(base_url('cart?success=promo berhasil ditambahkan'));
            }
            print_r($count_disc);
            echo $kategori.'-'.$date.'-'.$harga.'-'.$syt_dsc;
        }
        else {
            echo "gagal";
            redirect(base_url('cart?error=promo tidak ditemukan'));
        }
        

        
    }
    function hapus_promo()
    {
        $id_pelanggan = $this->session->userdata('ecommerce_fun_id');

        $where = array('id_pelanggan' => $id_pelanggan, );
        
        $set = array('promo' => null, );

        $this->M_admin->update_data('cart', $set, $where);

        redirect(base_url('cart?success=promo berhasil dihapus'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $this->M_admin->delete_data('cart', $where);

        redirect(base_url('cart'));
    }
}
