<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		ob_start();
		//$this->load->model('M_kendaraan','datamasuk');
		$this->load->model('M_login', 'account');
	}
	public function index() {
		if($this->session->userdata('status') != "login") {
			$this->load->view('vlogin');
		}else{
			$this->load->view('vaccount');
		}	
	}
	//untuk login dengan pencocokan username dan password untuk mengetahui hak akses user 
	public function aksi_login() 
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'user' => $username,
			'password' => base64_encode($password)
		);

		$cek = $this->account->cek_login($where);
		
		$ok = $cek->num_rows();
		if($ok > 0) {
				$data_session = array(
					'nama' => $username,
					'status' => "login",
				);
				print_r($data_session);
				$res = $this->session->set_userdata($data_session);
				print_r($res);
				redirect(base_url("Home"));
		}
		else {
			echo "<script>alert('Username atau password anda salah');window.location='".base_url()."/Login'</script>";
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}

	//untuk menampilkan daftar user pada halaman data user 
	public function account_list()
	{
		$list = $this->account->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->user;
			//html untuk kolom aksi
			$row[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_data('."'".$person->iduser."'".')"><i class="icofont icofont-pencil-alt-2"></i> Edit</a>
					  <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_data('."'".$person->iduser."'".')"><i class="icofont icofont-trash"></i> Delete</a>';		
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->account->count_all(),
					"recordsFiltered" => $this->account->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	//untuk menambahkan user website
	public function account_add()
	{
		$data = array(
			'user' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password'))
			);
		$insert = $this->account->save($data);
		echo json_encode(array("status" => TRUE));
	}
	//untuk mengakses informasi pengguna berdasarkan nomor id untuk selanjutnya diperbarui 
	public function account_edit($id)
	{
		$data = $this->account->get_by_id($id); 
		echo json_encode($data);
	}
	//memperbarui informasi data pengguna yang sebelumnya telah tersimpan pada database
	public function account_update()
	{	
		$data = array(
			'user' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password'))
		);
		echo json_encode($data);
		$this->account->update(array('iduser' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	//menghapus data pengguna pada database berdasarkan nomor id
	public function account_delete($id)
	{
		$this->account->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan jumlah user yang terdaftar pada beranda
	public function jumlahdata() {
		$res = $this->account->countAll("tbluser");
		echo json_encode($res);
	}
}
?>