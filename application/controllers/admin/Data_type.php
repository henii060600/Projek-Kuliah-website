<?php 
class Data_type extends CI_Controller{
    public function index()
    {
		$this->ModelRental->admin_login();
		$data['type'] = $this->ModelRental->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_type',$data);
		$this->load->view('templates_admin/footer');
	}

    public function tambah_type()
    {
        $this->ModelRental->admin_login();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_type');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_type_aksi()
    {
        $this->ModelRental->admin_login();

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_type();
        }else{
            $nama_type		= $this->input->post('nama_type');

            $data = array(
                'nama_type' => $nama_type
            );

            $this->ModelRental->insert_data($data, 'type');
            $this->session->set_flashdata('pesan',"Data Type Berhasil Ditambahkan");
            redirect('admin/data_type');
        }
    }

    public function update_type($id)
    {
        $this->ModelRental->admin_login();

        $where = array('id_type'=>$id);
        $data['type'] = $this->db->query("SELECT * FROM type WHERE id_type='$id'")->result();
 
         $this->load->view('templates_admin/header');
         $this->load->view('templates_admin/sidebar');
         $this->load->view('admin/form_update_type', $data);
         $this->load->view('templates_admin/footer');
    }

    public function update_type_aksi()
    {
        $this->ModelRental->admin_login();

        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->update_type();
        }else{
            $id        = $this->input->post('id_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'nama_type' => $nama_type
            );

            $where = array (
                'id_type' => $id
            );
            
            $this->ModelRental->update_data('type', $data, $where);
            $this->session->set_flashdata('pesan',"Data Type Berhasil Diupdate");
            redirect('admin/data_type');
        }
    }
    
    public function _rules()
    {
            $this->form_validation->set_rules('nama_type', 'Nama Type', 'required');	
    }

    public function delete_type($id)
    {
        $this->ModelRental->admin_login();
        
        $where = array('id_type' => $id);
        $this->ModelRental->delete_data($where, 'type');
    
        $this->session->set_flashdata('pesan','Data Type Berhasil Dihapus');
        redirect('admin/data_type');
    }
}
?>


