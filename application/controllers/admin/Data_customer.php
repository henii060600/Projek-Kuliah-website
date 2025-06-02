<?php 

class Data_customer extends CI_Controller
{
    public function index()
    {
        $this->ModelRental->admin_login();
		$data['user'] = $this->ModelRental->get_data('user')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/Data_customer',$data);
		$this->load->view('templates_admin/footer');
	}

    public function tambah_customer()
    {
        $this->ModelRental->admin_login();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_customer');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_customer_aksi()
    {
        $this->ModelRental->admin_login();
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_customer();
        }else{
            $nama_user		= $this->input->post('nama_user');
            $username		= $this->input->post('username');
            $alamat			= $this->input->post('alamat');
            $no_telepon		= $this->input->post('no_telepon');
            $no_identitas	= $this->input->post('no_identitas');
            $role_id		= $this->input->post('role_id');
            $password		= md5($this->input->post('password'));

            $data = array(
                'nama_user'     => $nama_user,
                'username'		=> $username,
                'alamat'		=> $alamat,
                'no_telp'		=> $no_telepon,
                'no_identitas'	=> $no_identitas,
                'password'		=> $password,
                'role_id'		=> $role_id,
            );

            $this->ModelRental->insert_data($data, 'user');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Customer Berhasil Ditambahkan
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect('admin/data_customer');

        }
    }
    public function update_customer($id)
    {
        $this->ModelRental->admin_login();

        $where = array('id_user' => $id);
        $data['user'] = $this->db->query("SELECT * FROM user WHERE id_user = '$id'")->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_customer',$data);
        $this->load->view('templates_admin/footer');

    }

    public function update_customer_aksi()
    {
        $this->ModelRental->admin_login();

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->update_customer($this->input->post('id_user'));
        }else{
            $id 			= $this->input->post('id_user');
            $nama_user	= $this->input->post('nama_user');
            $username		= $this->input->post('username');
            $alamat			= $this->input->post('alamat');
            $no_telepon		= $this->input->post('no_telepon');
            $no_identitas			= $this->input->post('no_identitas');
            $password		= md5($this->input->post('password'));
            $role_id		= $this->input->post('role_id');

            $data = array(
                'nama_user' => $nama_user,
                'username'		=> $username,
                'alamat'		=> $alamat,
                'no_telp'		=> $no_telepon,
                'no_identitas'		=> $no_identitas,
                'password'		=> $password,
                'role_id'		=> $role_id,
            );

            $where = array(
                'id_user' => $id
            );

            $this->ModelRental->update_data('user',$data,$where);

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Customer Berhasil Diupdate
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect('admin/data_customer');

        }
    }

    public function delete_customer($id)
    {
        $this->ModelRental->admin_login();

        $where = array('id_user' => $id);
        $this->ModelRental->delete_data($where, 'user');


        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Data Customer Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
        redirect('admin/data_customer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_user',"Nama",'required');
        $this->form_validation->set_rules('username',"Username",'required');
        $this->form_validation->set_rules('alamat',"Alamat",'required');
        $this->form_validation->set_rules('no_telepon',"No. Telepon",'required|numeric');
        $this->form_validation->set_rules('no_identitas',"No. Identitas",'required|numeric');
        $this->form_validation->set_rules('password',"Password",'required');
    }
  
   
}
?>