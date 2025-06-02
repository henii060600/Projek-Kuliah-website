<?php 
	class Laporan extends CI_Controller{

		public function index()
		{
			$this->ModelRental->admin_login();

			$dari 		= $this->input->post('dari');
			$sampai 	= $this->input->post('sampai');
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->load->view('templates_admin/header');
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/filter_laporan');
				$this->load->view('templates_admin/footer');
			}else{

				$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor=mt.id_motor AND tr.id_user=cs.id_user AND date(tgl_rental) >= '$dari' AND date(tgl_rental) <= '$sampai'")->result();

				$this->load->view('templates_admin/header');
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/tampilkan_laporan',$data);
				$this->load->view('templates_admin/footer');
			} 
		}


		public function print_laporan()
		{
			$this->ModelRental->admin_login();
			$dari 		= $this->input->get('dari');
			$sampai 	= $this->input->get('sampai');

			$data['title']	 = "Print Laporan Transaksi";
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor=mt.id_motor AND tr.id_user=cs.id_user AND date(tgl_rental) >= '$dari' AND date(tgl_rental) <= '$sampai'")->result();

				$this->load->view('templates_admin/header');
				$this->load->view('admin/print_laporan',$data);
		}

		public function _rules(){
			$this->form_validation->set_rules('dari', 'Dari Tanggal','required');
			$this->form_validation->set_rules('sampai', 'Sampai Tanggal','required');
		}
	}
?>