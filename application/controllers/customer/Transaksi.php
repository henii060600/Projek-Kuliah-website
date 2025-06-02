<?php 

	class Transaksi extends CI_Controller{
		public function index()
		{
			$this->ModelRental->customer_login();

			$user = $this->session->userdata('id_user');
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor=mt.id_motor AND tr.id_user=cs.id_user AND cs.id_user='$user' ORDER BY id_rental ASC")->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/transaksi',$data);
			$this->load->view('templates_customer/footer');
		}

		public function pembayaran($id)
		{

			$this->ModelRental->customer_login();
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor=mt.id_motor AND tr.id_rental='$id' AND cs.id_user = tr.id_user ORDER BY id_rental DESC")->result();
		
			$this->load->view('templates_customer/header');
			$this->load->view('customer/pembayaran',$data);
			$this->load->view('templates_customer/footer');
		}

		public function pembayaran_aksi()
		{

			$this->ModelRental->customer_login();
			$id 				= $this->input->post('id_rental');
			$bukti_pembayaran	= $_FILES['bukti_pembayaran']['name'];
			
			if($bukti_pembayaran){
				$config['upload_path']		= './assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff|pdf|webp';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('bukti_pembayaran')){
					$bukti_pembayaran = $this->upload->data('file_name');
					$this->db->set('bukti_pembayaran', $bukti_pembayaran);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'bukti_pembayaran' => $bukti_pembayaran
			);

			$where = array(
				'id_rental'			=> $id
			);

			$this->ModelRental->update_data('transaksi', $data, $where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Bukti Pembayaran Anda Berhasil di Upload
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('customer/transaksi');

		}

		public function cetak_invoice($id)
		{

			$this->ModelRental->customer_login();
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor=mt.id_motor AND tr.id_user=cs.id_user AND tr.id_rental='$id'")->result();


			

			$this->load->view('customer/cetak_invoice',$data);
		}

		public function batal_transaksi($id)
		{

			$this->ModelRental->customer_login();
			$where = array('id_rental' => $id);
			$data  = $this->ModelRental->get_where($where, 'transaksi')->row();

			$where2 = array('id_motor' => $data->id_motor);
			$data2	= array('status'   => '1');

			$this->ModelRental->update_data('motor', $data2, $where2);
			$this->ModelRental->delete_data($where, 'transaksi');

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil dibatalkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('customer/transaksi');

		}
	}

?>