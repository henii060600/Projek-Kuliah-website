<?php

class Dashboard extends CI_Controller 
{
    public function index()
    {
        $this->ModelRental->admin_login();

        $data['total_data'] = $this->ModelRental->total_data();
		$data['transaksi']	= $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor = mt.id_motor AND tr.id_user = cs.id_user AND tr.status_pembayaran='0'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/Dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>
