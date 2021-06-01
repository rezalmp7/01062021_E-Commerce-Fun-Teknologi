<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

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
		$header['page'] = 'comment';
        $header['page_name'] = "Comment Produk";

        $data['comment'] = $this->M_admin->select_select_join_2table_type_orderBy('comment.comment_at, comment.reply, produk.nama, comment.comment, comment.id', 'comment', 'produk', 'comment.id_produk = produk.id', 'left', 'comment.comment_at DESC')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/comment', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function answer()
    {
        $header['page'] = "comment";
        $header['page_name'] = "Answer";

        $get = $this->input->get();

        $where = array(
            'comment.id' => $get['id'], 
        );
        $data['comment'] = $this->M_admin->select_select_where_join_4table_type('comment.id, comment.comment, comment.comment_at, pelanggan.nama as nama_pelanggan, pelanggan.photo as photo_pelanggan, comment.reply, comment.reply_at, user.nama as nama_user', 'comment', 'pelanggan', 'comment.comment_by = pelanggan.id', 'left', 'produk', 'comment.id_produk = produk.id', 'left', 'user', 'comment.reply_by = user.id', 'left', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/answer', $data);
        $this->load->view('funtech/layout/footer');

    }
    function answer_aksi()
    {
        $post = $this->input->post();

        $where = array('id' => $post['id'] );

        $reply_by = 1; //$this->session->userdata('ecomfun_admin_id')

        $reply_at = date('Y-m-d H:i:s');

        $set = array(
            'reply' => $post['answer'],
            'reply_by' => $reply_by,
            'reply_at' => $reply_at

        );
        $this->M_admin->update_data('comment', $set, $where);

        redirect(base_url('funtech/comment'));
    }
}
