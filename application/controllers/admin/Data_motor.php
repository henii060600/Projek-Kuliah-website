<?php
class Data_motor extends CI_Controller{
	public function index()
	{
		$this->ModelRental->admin_login();

		$data['motor'] = $this->ModelRental->get_data('motor')->result();
		$data['type'] = $this->ModelRental->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/Data_motor',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_motor()
	{ 

		$this->ModelRental->admin_login();

		$data['type'] = $this->ModelRental->get_data('type')->result();
		//$data['nama_rental'] = $this->db->query("SELECT nama_rental FROM user WHERE role_id='3'")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_motor',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_motor_aksi()
	{
		$this->ModelRental->admin_login();

		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah_motor();
		}else{
			$nama_motor 			= $this->input->post('nama_motor');
			$nama_type				= $this->input->post('nama_type');
			$merk					= $this->input->post('merk');
			$no_plat				= $this->input->post('no_plat');
			$warna					= $this->input->post('warna');
			$tahun					= $this->input->post('tahun');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$gambar					= $_FILES['gambar']['name'];


			if($gambar='0'){}else{
				$config['upload_path']		= 'assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|jfif|webp';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar  Gagal diupload!";
				}else{
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nama_motor'		=> $nama_motor,
				'nama_type'			=> $nama_type,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'tahun'				=> $tahun,
				'warna'				=> $warna,
				'status'			=> $status,
				'gambar'			=> $gambar,
				'harga'				=> $harga,
				'denda'				=> $denda
			);

			$this->ModelRental->insert_data($data, 'motor');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Motor Berhasil Ditambahkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/data_motor');
		}
	}


	public function update_motor($id)
	{
		$this->ModelRental->admin_login();

		$where = array('id_motor' => $id);
		$data['motor'] = $this->db->query("SELECT * FROM motor mt, type tp WHERE mt.nama_type=tp.nama_type AND mt.id_motor='$id'")->result();
		$data['type'] = $this->ModelRental->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_motor',$data);
		$this->load->view('templates_admin/footer');

	}

	public function update_motor_aksi()
	{
		$this->ModelRental->admin_login();

		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->update_motor($this->input->post('id_motor'));
		}else{
			$id 					= $this->input->post('id_motor');
			$nama_motor 			= $this->input->post('nama_motor');
			$nama_type				= $this->input->post('nama_type');
			$merk					= $this->input->post('merk');
			$no_plat				= $this->input->post('no_plat');
			$warna					= $this->input->post('warna');
			$tahun					= $this->input->post('tahun');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$gambar					= $_FILES['gambar']['name'];
			
			if($gambar){
				$config['upload_path']		= 'assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|jfif|webp';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')){
					$gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nama_motor'		=> $nama_motor,
				'nama_type'			=> $nama_type,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'tahun'				=> $tahun,
				'warna'				=> $warna,
				'status'			=> $status,
				'harga'				=> $harga,
				'denda'				=> $denda
				
			);

			$where = array(
				'id_motor' => $id
			);

			$this->ModelRental->update_data('motor', $data, $where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data motor Berhasil Diupdate
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/data_motor');
		}
	}

	public function _rules(){

		
		$this->form_validation->set_rules('nama_motor','Nama Motor','required');
		$this->form_validation->set_rules('nama_type','Type motor','required');
		$this->form_validation->set_rules('merk','Merk','required');
		$this->form_validation->set_rules('no_plat','No Plat','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('warna','Warna','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('denda','Denda','required');

	}


	public function detail_motor($id)
	{
		$this->ModelRental->admin_login();

		$data['detail'] = $this->ModelRental->detail_data_motor($id);
		$data['type'] = $this->ModelRental->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_motor',$data);
		$this->load->view('templates_admin/footer');

	}

	public function delete_motor($id)
	{
		$this->ModelRental->admin_login();

		$where = array('id_motor' => $id);
		$this->ModelRental->delete_data($where,'motor');

		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data motor Berhasil Dihapus
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('admin/data_motor');
	}
}
?>