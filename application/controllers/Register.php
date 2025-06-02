<?php 

	class Register extends CI_Controller{

		public function index(){

			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->load->view('templates_admin/header');
				$this->load->view('register_form');
				$this->load->view('templates_admin/footer');
			}else{
				$nama_user	= $this->input->post('nama_user');
				$username		= $this->input->post('username');
				$alamat			= $this->input->post('alamat');
				$no_telp		= $this->input->post('no_telp');
				$no_identitas			= $this->input->post('no_identitas');
				$password		= md5($this->input->post('password'));
				$role_id		= '2';

				$data = array(
					'nama_user' => $nama_user,
					'username'		=> $username,
					'alamat'		=> $alamat,
					'no_telp'		=> $no_telp,
					'no_identitas'		=> $no_identitas,
					'password'		=> $password,
					'role_id'		=> $role_id
				);

				$this->ModelRental->insert_data($data, 'user');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Berhasil Register, Silakan Login!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('auth/login');


			}


		}

		public function _rules(){
			$this->form_validation->set_rules('nama_user',"Nama",'required');
			$this->form_validation->set_rules('username',"Username",'required');
			$this->form_validation->set_rules('alamat',"Alamat",'required');
			$this->form_validation->set_rules('no_telp',"No. Telepon",'required|numeric');
			$this->form_validation->set_rules('no_identitas',"No. Identitas",'required|numeric');
			$this->form_validation->set_rules('password',"Password",'required');
		}
	}

 ?>