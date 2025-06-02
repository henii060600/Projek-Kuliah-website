<?php  


	class Transaksi extends CI_Controller{
		
		public function index()
		{
			$this->ModelRental->admin_login();

			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, motor mt, user cs WHERE tr.id_motor=mt.id_motor AND tr.id_user=cs.id_user")->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/Data_transaksi',$data);
			$this->load->view('templates_admin/footer');
		}

		public function pembayaran($id)
		{
			$this->ModelRental->admin_login();
			$where = array('id_rental' => $id);
			$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/konfirmasi_pembayaran',$data);
			$this->load->view('templates_admin/footer');

		}

		public function cek_pembayaran()
		{
			$this->ModelRental->admin_login();
			$id 				= $this->input->post('id_rental');
			$status_pembayaran	= $this->input->post('status_pembayaran');

			$data = array(
				'status_pembayaran'	=> $status_pembayaran
			);

			$where = array(
				'id_rental'		=> $id
			);

			$this->ModelRental->update_data('transaksi',$data,$where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Pembayaran telah dikonfirmasi
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/transaksi');
		}


		public function download_pembayaran($id)
		{
			$this->ModelRental->admin_login();
			$this->load->helper('download');
			$filePembayaran = $this->ModelRental->downloadPembayaran($id);
			$file = 'assets/upload/' . $filePembayaran['bukti_pembayaran'];
			force_download($file, NULL);
		}

		public function transaksi_selesai($id)
		{
			$this->ModelRental->admin_login();
			$where = array('id_rental' => $id);
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/transaksi_selesai',$data);
			$this->load->view('templates_admin/footer');
		}

		public function transaksi_selesai_aksi()
		{
			$this->ModelRental->admin_login();
			$id 					= $this->input->post('id_rental');
			$tgl_pengembalian		= $this->input->post('tgl_pengembalian');
			$status_rental 			= $this->input->post('status_rental');
			$status_pengembalian	= $this->input->post('status_pengembalian');
			$tgl_kembali			= $this->input->post('tgl_kembali');
			$denda					= $this->input->post('denda');

			$x						= strtotime($tgl_pengembalian);
			$y						= strtotime($tgl_kembali);
			$selisih				= abs($x - $y)/(60*60*24);
			$total_denda			= $selisih * $denda;
			

			$data = array(
				'tgl_pengembalian'		=> $tgl_pengembalian,
				'status_rental'			=> $status_rental,
				'status_pengembalian'	=> $status_pengembalian,
				'total_denda'			=> $total_denda
			);

			$where = array( 'id_rental' => $id);



			$this->ModelRental->update_data('transaksi', $data, $where);
			if($status_rental == 'Selesai'){
				$id_motor = $this->input->post('id_motor');
				$data2	= array('status'   => '1');
				$where2 = array('id_motor'  => $id_motor );
				$this->ModelRental->update_data('motor', $data2, $where2);
			}else{
			}

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi selesai
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');

			redirect('admin/transaksi');
		}

		public function batal_transaksi($id){
			$this->ModelRental->admin_login();
			$where = array('id_rental' => $id);
			$data  = $this->ModelRental->get_where($where, 'transaksi')->row();

			$where2 = array('id_motor' => $data->id_motor);
			$data2	= array('status'   => '1');

			$this->ModelRental->update_data('Motor', $data2, $where2);
			$this->ModelRental->delete_data($where, 'transaksi');

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil dibatalkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/transaksi');

		}
	}

?>