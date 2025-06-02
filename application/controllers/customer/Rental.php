<?php 

class Rental extends CI_Controller
{
	
	public function tambah_rental($id)
	{
		$this->ModelRental->customer_login();

		$data['detail'] = $this->ModelRental->detail_data_motor($id);
        //$data['detail'] = $this->db->query("SELECT * FROM motor mt, type tp, customer cs WHERE mt.id_motor = '$id' AND tp.nama_type = mt.nama_type ")->result();

		$this->load->view('templates_customer/header');
		$this->load->view('customer/tambah_rental', $data);
		$this->load->view('templates_customer/footer');
	}

	public function tambah_rental_aksi()
	{
		$this->ModelRental->customer_login();
		if(empty($this->session->userdata('role_id'))){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Silakan Login Untuk Melanjutkan Transaksi
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('customer/rental/tambah_rental/' . $this->input->post('id_motor'));
		}else{

		}

		$id_user	    	= $this->session->userdata('id_user');
		$id_motor 			= $this->input->post('id_motor');
		$tgl_rental 	    = $this->input->post('tgl_rental');
		$tgl_kembali     	= $this->input->post('tgl_kembali');
		$denda 				= $this->input->post('denda');
		$harga 				= $this->input->post('harga');

		$data = array(
			'id_user'			    => $id_user,
			'id_motor'				=> $id_motor,
			'tgl_rental'	    	=> $tgl_rental,		
			'tgl_kembali'		    => $tgl_kembali,
			'denda'					=> $denda,
			'harga'					=> $harga,
			'tgl_pengembalian'	    => '-',
			'status_rental'			=> 'Belum Selesai',
			'status_pengembalian'	=> 'Belum Kembali'
		);

		$this->ModelRental->insert_data($data, 'transaksi');
		$status = array('status' => '0');
		$id = array('id_motor' => $id_motor);

		$this->ModelRental->update_data('motor',$status,$id);

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Transaksi Berhasil, Silakan Checkout
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('customer/transaksi');

	}
}

?>