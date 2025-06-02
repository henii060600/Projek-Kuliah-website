<?php

class ModelRental extends CI_model{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_where($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_data_motor($id)
    {
        $hasil = $this->db->where('id_motor', $id)->get('motor');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
                        ->where('username',$username)
                        ->where('password',md5($password))
                        ->limit(1)
                        ->get('user');

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }

    public function downloadPembayaran($id){
        $query = $this->db->get_where('transaksi',array('id_rental' => $id));
        return $query->row_array();
    }

    public function total_data(){
        $user			    = $this->db->get_where('user', array('role_id' => '2'))->num_rows();
        $transaksi			= $this->db->count_all_results('transaksi');
        $transaksi_selesai	= $this->db->get_where('transaksi', array('status_rental' => 'Selesai'))->num_rows();
        $motor 				= $this->db->count_all_results('motor');

        $data = array(

            'total_customer' => $user,
            'total_transaksi'	=> $transaksi,
            'total_transaksi_selesai' => $transaksi_selesai,
            'total_motor'	=> $motor
        );	

        return $data;
    }
    

    public function admin_login(){
        if (!empty($this->session->userdata('role_id'))) {
            if ($this->session->userdata('role_id') == '1') {
                return;
            }elseif($this->session->userdata('role_id') == '2'){
                redirect('customer/dashboard');
            }else{
                redirect('rental/dashboard');
            }
        }else{
            redirect('customer/dashboard');
        }
    }

    public function customer_login(){
        if (!empty($this->session->userdata('role_id'))) {
            if ($this->session->userdata('role_id') == '2') {
                return;
            }elseif($this->session->userdata('role_id') == '1'){
                redirect('admin/dashboard');
            }else{
                redirect('rental/dashboard');
            }
        }else{
            redirect('customer/dashboard');
        }
    }
}

?>