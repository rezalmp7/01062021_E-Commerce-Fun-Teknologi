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
        
        if($this->session->userdata('ecommerce_admin_status') != 'ecommerce_admin_login')
        {
            redirect(base_url('funtech'));
        }
        
        $this->load->model('M_admin');

        $this->load->library('upload');
    }
	public function index()
	{
		$header['page'] = 'produk';
        $header['page_name'] = "Data Produk";

        $data['produk'] = $this->M_admin->select_all('produk')->result();
        
        
        $cek_jml_produk = $this->M_admin->select_all('produk')->num_rows();

        $produk = $data['produk'];

        foreach ($produk as $a) {
            $where = array('id' => $a->id);
            $data['vikor'][$a->id] = $this->M_admin->select_where('produk', $where)->row();
        }

        $data['sum_bobot'] = $this->M_admin->select_select('sum(bobot) as bobot', 'kriteria')->row();
        $data['kriteria'] = $this->M_admin->select_all('kriteria')->result();
        
        if($data['produk'] != null && $cek_jml_produk > 3)
        {
            $data['rekomendasi'] = $this->perhitungan();
            
        }
 
		$this->load->view('funtech/layout/header', $header);
		$this->load->view('funtech/produk', $data);
		$this->load->view('funtech/layout/footer');
	}
    public function info()
    {
        
		$header['page'] = 'produk';
        $header['page_name'] = "Info Produk";

        $get = $this->input->get();

        $where_pembeli = array(
            'id_produk' => $get['id'], 
            'id_kriteria' => 4
        );
        $where = array(
            'id' => $get['id']
        );
        $where_gambar = array(
            'id_produk' => $get['id']
        );

        $data['dibeli'] = $this->M_admin->select_where('data_nilai', $where_pembeli)->row();
        $data['produk'] = $this->M_admin->select_where('produk', $where)->row();
        $data['gambar_produk'] = $this->M_admin->select_where('gambar_produk', $where_gambar)->result();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/produk_info', $data);
        $this->load->view('funtech/layout/footer');        
    }
    public function tambah()
    {
        $header['page'] = 'produk';
        $header['page_name'] = "Tambah Produk";
        
        $max_id = $this->M_admin->select_select('max(id) as max_id', 'produk')->row_array();

        if($max_id['max_id'] != null)
        {
            $data['id'] = $max_id['max_id']+1;
        }
        else {
            $data['id'] = 1;
        }
        
        $data['kategori'] = $this->M_admin->select_all('kategori')->result();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/produk_tambah', $data);
        $this->load->view('funtech/layout/footer');
    }
    public function edit()
    {
        $this->output->delete_cache();
        
        $header['page'] = 'produk';
        $header['page_name'] = "Edit Produk";

        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );
        $where_gambar = array(
            'id_produk' => $get['id']
        );

        $data['produk'] = $this->M_admin->select_where('produk', $where)->row();
        $data['produk_gambar'] = $this->M_admin->select_where('gambar_produk', $where_gambar)->result();

        $data['kategori'] = $this->M_admin->select_all('kategori')->result();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/produk_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    public function edit_kriteria()
    {
        $header['page'] = 'produk';
        $header['page_name'] = "Edit Kriteria";

        $get = $this->input->get();

        $data['all_kriteria'] = $this->M_admin->select_all('kriteria')->result();

        $where = array('id' => $get['id'], );
        $data['kriteria'] = $this->M_admin->select_where('kriteria', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/kriteria_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    function kriteria_edit_aksi()
    {
        $post = $this->input->post();

        $where = array('id' => $post['id'], );

        $set = array(
            'nama' => $post['nama'],
            'tipe' => $post['tipe'],
            'bobot' => $post['bobot'] 
        );

        $this->M_admin->update_data('kriteria', $set, $where);

        redirect(base_url('funtech/produk'));
    }
    public function edit_discount()
    {
        $header['page'] = 'produk';
        $header['page_name'] = "Edit Discount";

        $get = $this->input->get();

        $where = array('id' => $get['id'], );
        $data['discount'] = $this->M_admin->select_where('produk', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/discount_edit', $data);
        $this->load->view('funtech/layout/footer');
    }
    function edit_discount_aksi()
    {
        $header['page'] = 'produk';
        $header['page_name'] = "Edit Discount";

        $post = $this->input->post();

        $where = array('id' => $post['id'] , );
        $set = array('discount' => $post['discount'], );

        $this->M_admin->update_data('produk', $set, $where);

        redirect(base_url('funtech/produk'));

    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $kode = $post['kd_kat'].'-'.$post['id'];

        $count = count($_FILES['gambar']['name']);
        echo $count;


        echo "<pre>";
        print_r($_FILES['gambar']);
        echo "</pre>";
    
        for($i=0;$i<$count;$i++){
        
            if($_FILES['gambar']['name'] != null){
        
                $_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
                $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
                $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];

                $config['upload_path'] = './assets/img/produk/'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '1000000';
                $config['file_name'] = $post['id'].'_'.$i;
        
                $this->load->library('upload',$config); 

                $this->upload->initialize($config);
            
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
        
                    $totalFiles[] = $filename;
                }
                else {
                    $totalFiles[] = 'gagal';
                }
            }
    
        }
        print_r($totalFiles);

        $data = array();

        $i = 0;
        foreach ($totalFiles as $nameImg) {
            if($nameImg == 'gagal')
            {
                continue;
            }
            else {
                $alt = explode(".",$nameImg);
                $data[$i] = array(
                    'id_produk' => $post['id'],
                    'src' => $nameImg,
                    'alt' => 'funtechnology '.$alt[0]
                );
                $i++;
            }
        }
        $this->M_admin->insertBatch('gambar_produk', $data);
        
        $data_produk = array(
            'id' => $post['id'],
            'kode' => $kode,
            'nama' => $post['nama'],
            'harga' => $post['harga'],
            'link' => $post['link'],
            'kategori' => $post['kategori'],
            'deskripsi' => $post['deskripsi']
        );
        $this->M_admin->insert_data('produk', $data_produk);

        $data_vikor = array(
            array(
                'id_produk' => $post['id'], 
                'id_kriteria' => 1, 
                'nilai' => null, 
            ),
            array(
                'id_produk' => $post['id'], 
                'id_kriteria' => 2, 
                'nilai' => null, 
            ),
            array(
                'id_produk' => $post['id'], 
                'id_kriteria' => 3, 
                'nilai' => null, 
            ),
            array(
                'id_produk' => $post['id'], 
                'id_kriteria' => 4, 
                'nilai' => null, 
            ),
        );
        $this->M_admin->insertBatch('data_nilai', $data_vikor);

        if(array_search("gagal",$totalFiles) != null)
        {
            redirect(base_url('funtech/produk?msg=ada gambar yang gagal diupload'));
        }
        else {
            redirect(base_url('funtech/produk?msg=produk berhasil di tambahkan'));
        }
    }
    public function produk_edit_gambar_edit()
    {
        $header['page'] = 'produk';
        $header['page_name'] = "Edit Gambar Produk";

        $get = $this->input->get();

        $where = array
        (
            'id' => $get['id']
        );
        $data['gambar'] = $this->M_admin->select_where('gambar_produk', $where)->row();

        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/produk_edit_gambar', $data);
        $this->load->view('funtech/layout/footer');
    }
    public function produk_edit_gambar_tambah()
    {
        $header['page'] = 'produk';
        $header['page_name'] = "Edit Gambar Produk";

        $get = $this->input->get();

        $where = array(
            'id_produk' => $get['id_produk']
        );
        $gambar = $this->M_admin->select_select_where('max(src) as max_src, id_produk', 'gambar_produk', $where)->row_array();

        if($gambar['max_src'] != null)
        {
            $str = $gambar['max_src'];
            $nama_gambar = explode(".",$str);
            $nama = explode("_",$nama_gambar[0]);
            $kode_gambar = $nama[1];
            
            $data['id_produk'] = $gambar['id_produk'];
            $data['max_src'] = $kode_gambar+1;
        }
        else {
            
            $data['id_produk'] = $get['id_produk'];
            $data['max_src'] = 0;
        }
        
        $this->load->view('funtech/layout/header', $header);
        $this->load->view('funtech/produk_tambah_gambar', $data);
        $this->load->view('funtech/layout/footer');
    }
    function produk_edit_gambar_tambah_aksi()
    {
        $post = $this->input->post();
        
        $config['upload_path'] = './assets/img/produk/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = $post['id_produk'].'_'.$post['kode_gambar'];
        $config['overwrite'] = true;
        
        $this->load->library('upload',$config); 

        $this->upload->initialize($config);
            
        if($this->upload->do_upload('gambar')){
            $uploadData = $this->upload->data(); 
            
            $data = array(
                'id_produk' => $post['id_produk'],
                'src' => $uploadData['file_name'],
                'alt' => 'funteknologi '.$post['kode_gambar'],
            );

            $this->M_admin->insert_data('gambar_produk', $data);

            redirect(base_url('funtech/produk/edit?id='.$post['id_produk']."&msg=gambar berhasil diupdate"));
        }
        else {
            redirect(base_url('funtech/produk/edit?id='.$post['id_produk']."&msg=gambar gagal diupdate"));
        }
    }
    function produk_edit_gambar_edit_aksi()
    {
        $post = $this->input->post();

        $config['upload_path'] = './assets/img/produk/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = $post['gambar_lama'];
        $config['overwrite'] = true;
        
        $this->load->library('upload',$config); 

        $this->upload->initialize($config);
            
        if($this->upload->do_upload('gambar')){
            $uploadData = $this->upload->data();    
            redirect(base_url('funtech/produk/edit?id='.$post['id_produk']."&msg=gambar berhasil diupdate"));
        }
        else {
            redirect(base_url('funtech/produk/edit?id='.$post['id_produk']."&msg=gambar gagal diupdate"));
        }
    }
    function produk_edit_gambar_hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $this->M_admin->delete_data('gambar_produk', $where);

        unlink('./assets/img/produk/'.$get['gmb']);

        redirect(base_url('funtech/produk/edit?id='.$get['id_produk']));
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        $where = array(
            'id' => $post['id'], 
        );
        $kode = $post['kd_kat'].'-'.$post['id'];
        $set = array(
            'kode' => $kode,
            'nama' => $post['nama'],
            'harga' => $post['harga'],
            'link' => $post['link'],
            'kategori' => $post['kategori'],
            'deskripsi' => $post['deskripsi']
        );

        $this->M_admin->update_data('produk', $set, $where);

        redirect(base_url('funtech/produk?msg=produk berhasil diupdate'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );
        $where_gambar = array('id_produk' => $get['id'], );

        $data_gambar = $this->M_admin->select_where('gambar_produk', $where_gambar)->result_array();

        if($data_gambar != null)
        {
            foreach($data_gambar as $dg) //deletes all pictures found
            {
                unlink("./assets/img/produk/".$dg['src']);
            }
            $this->M_admin->delete_data('gambar_produk', $where_gambar);
            $this->M_admin->delete_data('produk', $where);
            $this->M_admin->delete_data('comment', $where_gambar);

            redirect(base_url('funtech/produk?msg=produk berhasil di hapus'));
        }
        else {
            $this->M_admin->delete_data('produk', $where);

            redirect(base_url('funtech/produk?msg=produk berhasil di hapus'));
            $this->M_admin->delete_data('comment', $where_gambar);
        }
    }

    function perhitungan(){
        $result = $this->M_admin->select_all('kriteria')->result_array();
        //-- menyiapkan variable penampung berupa array
        $kriteria=array();
        $bobot=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        foreach ($result as $row) {
            $kriteria[$row['id']]=array($row['nama'],$row['tipe']);
            $bobot[$row['id']]=$row['bobot']/100;
        }


        //-- query untuk mendapatkan semua data kriteria di tabel vik_alternatif
        $result =  $this->M_admin->select_all('produk')->result_array();
        //-- menyiapkan variable penampung berupa array
        $alternatif=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        foreach ($result as $row) {
            $alternatif[$row['id']]=$row['id'];
        }

        //-- query untuk mendapatkan semua data sample penilaian di tabel vik_sample
        $result = $this->M_admin->select_all_order_by('*', 'data_nilai', 'id_kriteria ASC, id_produk ASC')->result_array();
        //-- menyiapkan variable penampung berupa array
        $sample=array();
        //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
        foreach ($result as $row) {
            //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
            //-- $row['id_alternatif'] adalah id kandidat/alternatif
            if (!isset($sample[$row['id']])) {
                $sample[$row['id_produk']] = array();
            }
            $sample[$row['id_produk']][$row['id_kriteria']] = $row['nilai'];

        }

        // //-- melakukan iterasi utk setiap alternatif
        // foreach ($sample as $id_altenatif=>$kriteria) {
        //     echo "<tr>";
        //     //-- melakukan iterasi utk setiap kriteria
        //     foreach($kriteria as $id_kriteria=>$nilai){
        //         echo "<td>{$nilai}</td>";
        //     }
        //     echo "</tr>";
        // }

        $f_plus=$f_min=array();
        //-- melakukan iterasi utk setiap alternatif
        foreach ($sample as $id_altenatif=>$kriteria) {
            //-- melakukan iterasi utk setiap kriteria
            foreach($kriteria as $j=>$nilai){
                //-- inisialisai nilai f_plus dan f_min
                if(!isset($f_plus[$j])) {
                    $f_plus[$j]=0;
                    $f_min[$j]=9999999;
                }
                $f_plus[$j] = ($f_plus[$j] < $nilai ? $nilai : $f_plus[$j]);
                $f_min[$j] = ($f_min[$j] > $nilai ? $nilai : $f_min[$j]);
                
            }
            
        }


        $N=array();
        //-- melakukan iterasi utk setiap alternatif
        foreach ($sample as $i=>$kriteria) {
            $N[$i]=array();
            //-- melakukan iterasi utk setiap kriteria
            foreach($kriteria as $j=>$nilai){
                $N[$i][$j]=($f_plus[$j] - $nilai)/($f_plus[$j]-$f_min[$j]);
            }
        }

        $F_star=array();
        //-- melakukan iterasi utk setiap alternatif
        foreach ($N as $i=>$kriteria) {
            $F_star[$i]=array();
            //-- melakukan iterasi utk setiap kriteria
            foreach($kriteria as $j=>$nilai){
                $F_star[$i][$j]=$nilai * $bobot[$j];
            }
        }

        $S=$R=array();
        //-- melakukan iterasi utk setiap alternatif
        foreach ($F_star as $i=>$kriteria) {
            $S[$i]=$R[$i]=0;
            //-- melakukan iterasi utk setiap kriteria
            foreach($kriteria as $j=>$nilai){
                $S[$i]+=$nilai;
                $R[$i]=($R[$i]<$nilai ? $nilai : $R[$i]);
            }
        }

        //-- inisialisasi nilai index VKOR (Q)
        $Q=array();
        //-- deklarasi fungsi untuk mencari nilai index VIKOR (Q)
        function get_Q($S,$R,$v=0.5)
        {
            //-- mencari nilai S_plus,S_min,R_plus dan R_min
            $S_plus=max($S);
            $S_min=min($S);
            $R_plus=max($R);
            $R_min=min($R);
            $Q=array();
            foreach($R as $i=>$r){
                $Q[$i]=$v*(($S[$i]-$S_min)/($S_plus-$S_min))+(1-$v)*(($R[$i]-$R_min)/($R_plus-$R_min));
            }
            return $Q;
        }
        //-- inisiasi nilai v untuk nilai by vote, by consensus, dan voting by majority rule
        $v=array(0.4,0.5,0.6);
        //-- menghitung nilai index VIKOR (Q) untuk v=0.5 (by consensus)
        $Q[$v[1]]=get_Q($S,$R);

        //-- mengurutkan nilai indeks VIKOR Q
        asort($Q[$v[1]]);
        //-- inisialisasi variabel array sQ
        $sQ=array();
        function get_sQ($Q)
        {
            $s_Q=array();
            foreach($Q as $i=>$v)
                $s_Q[]=array($i,$v);
            return $s_Q;
        }
        $sQ[$v[1]]=get_sQ($Q[$v[1]]);

        //-- inisialisasi kondisi_1
        $kondisi_1=0;
        //-- m adalah jumlah alternatif
        $m = count($sample);
        //-- menghitung nilai DQ
        $DQ = 1 / ($m - 1);
        //-- pengecekan kondisi Acceptable Advantage
        // if( ($sQ[$v[1]][1][1]-$sQ[$v[1]][0][1]) >= $DQ ){
        //     $kondisi_1=1;
        //     echo 'kondisi 1 terpenuhi<br>';
        // }else{
        //     echo 'kondisi 1 tidak terpenuhi<br>';
        // }

        //-- inisialisasi kondisi_2
        $kondisi_2=0;
        //-- menghitung nilai Q untuk v=$V[0] (by vote)
        $Q[$v[0]]=get_Q($S,$R,$v[0]);
        asort($Q[$v[0]]);
        $sQ[$v[0]]=get_sQ($Q[$v[0]]);
        //-- menghitung nilai Q untuk v=$V[2] (voting by majority rule)
        $Q[$v[2]]=get_Q($S,$R,$v[2]);
        asort($Q[$v[2]]);
        $sQ[$v[2]]=get_sQ($Q[$v[2]]);
        //-- pengecekan kondisi Acceptable Stability in Decision Making
        // if(($sQ[$v[1]][0][1]==$sQ[$v[0]][0][1]) && ($sQ[$v[1]][0][1]==$sQ[$v[2]][0][1])){
        //     $kondisi_2=1;
        //     echo 'kondisi 2 terpenuhi<br>';
        // }else{
        //     echo 'kondisi 2 tidak terpenuhi<br>';
        // }
            
        $kondisi_1 = 1;
        $kondisi_2 = 1;
            
        if($kondisi_1==1){
            if($kondisi_2==1){
                $alternatif[$sQ[$v[1]][0][0]];
            }else{
                $alternatif[$sQ[$v[1]][0][0]];
                $alternatif[$Q[$v[1]][1][0]];
            }
        } else{
            if($m>1){
                $nm=array();
                for($i=0;$i<$m;$i++) $nm[]=$alternatif[$sQ[$v[1]][$i][0]];
                $nm_a=array_pop($nm);
                implode(', ',$nm);
            }else{
                $alternatif[$sQ[$v[1]][0][0]];
            }
        }

        $hasil_real = array();
        $i = 0;
        foreach ($alternatif as $alt) {
            $hasil_real[] = $alternatif[$sQ[$v[1]][$i][0]];
            $i++;
        }
            
        return $hasil_real;
	}
}
