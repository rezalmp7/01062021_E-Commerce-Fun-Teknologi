<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow extends CI_Controller {

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
		$header['page'] = 'slideshow';
        $header['page_name'] = "Slideshow";


        $data['slideshow'] = $this->M_admin->select_all('slideshow')->result();

		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/slideshow', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'slideshow';
        $header['page_name'] = "Tambah Slideshow";

        $cek_max = $this->M_admin->select_select('MAX(id) as max_id', 'slideshow')->row_array();

        if($cek_max == null)
        {
            $data['id'] = 1;
        }
        else {
            $data['id'] = $cek_max['max_id']+1;
        }

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/slideshow_tambah', $data);
        $this->load->view('funtech/layout/footer');
    }
    function upload_gambar($nama)
    {
        $config['upload_path'] = './assets/img/slideshow/'; 
        $config['allowed_types'] = 'png|jpg|jpeg|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = $nama;
        $config['overwrite'] = true;
        
        $this->load->library('upload',$config); 

        $this->upload->initialize($config);
            
        if($this->upload->do_upload('gambar')){
            $uploadData = $this->upload->data();
            return $uploadData['file_name'];
        
        }
        else {
            return 'gagal';
        }
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $nama = $post['id'];

        $src = $this->upload_gambar($nama);

        if($src != 'gagal')
        {
            $data = array(
                'id' => $post['id'],
                'src' => $src,
                'judul' => $post['judul'],
                'deskripsi' => $post['deskripsi']
            );

            $this->M_admin->insert_data('slideshow', $data);

            redirect(base_url('funtech/slideshow?success=slideshow berhasil di upload'));
        }
        else {
            redirect(base_url('funtech/slideshow/tambah?error=gambar gagal diupload silahkan cek extensi dan size filenya'));
        }
    }
    public function edit()
    {
        $header['page'] = 'slideshow';
        $header['page_name'] = "Edit Slideshow";

        $get = $this->input->get();

        $where = array(
            'id' => $get['id'], 
        );

        $data['slideshow'] = $this->M_admin->select_where('slideshow', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/slideshow_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        $where = array(
            'id' => $post['id'], 
        );

        if($_FILES['gambar']['name'])
        {
            $nama = $post['id'];
            $src = $this->upload_gambar($nama);

            unlink('./assets/img/slideshow/'.$post['gambar_lama']);
        }
        else {
            $src = $post['gambar_lama'];
        }

        if($src != 'gagal')
        {
            $set = array(
                'id' => $post['id'],
                'src' => $src,
                'judul' => $post['judul'],
                'deskripsi' => $post['deskripsi']
            );

            $this->M_admin->update_data('slideshow', $set, $where);

            redirect(base_url('funtech/slideshow?success=slideshow berhasil di upload'));
        }
        else {
            redirect(base_url('funtech/slideshow/tambah?error=gambar gagal diupload silahkan cek extensi dan size filenya'));
        }
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array(
            'id' => $get['id'], 
        );

        $data_slide = $this->M_admin->select_where('slideshow', $where)->row_array();

        if($data_slide != null)
        {
            unlink('./assets/img/slideshow/'.$data_slide['src']);
            $this->M_admin->delete_data('slideshow', $where);
            redirect(base_url('funtech/slideshow?success=slideshow berhasil dihapus'));
        }
        else {
            redirect(base_url('funtech/slideshow?error=gagal menghapus'));
        }
    }
}
