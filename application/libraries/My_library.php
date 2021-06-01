<?php 
 
class My_library{
	function get_star()
    {
        $this->load->model('M_admin');
        $produk = $this->M_admin->select_all('produk')->result();

        foreach ($produk as $a) {
            $where = array('id_produk' => $a->id, );
            $nama = $a->id;
            $data[$nama] = $this->M_admin->select_select_where('AVG(star) as star', 'comment', $where)->row_array();
        }
        return $data;
    }
}