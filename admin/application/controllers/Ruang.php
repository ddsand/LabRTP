<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

	function __construct() {
		parent::__construct();
		ob_start();
		$this->load->model('M_ruang', 'ruang');
	}
	public function index() {
		if($this->session->userdata('status') != "login") {
			$this->load->view('vlogin');
		}else{
			$this->load->view('vruang');
		}	
	}

	public function ruang_list()
	{
		$list = $this->ruang->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->namaruang;
			$row[] = $person->ketua;
			//html untuk kolom aksi
			$row[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_data('."'".$person->idruang."'".')"><i class="icofont icofont-pencil-alt-2"></i> Edit</a>
					  ';		
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->ruang->count_all(),
					"recordsFiltered" => $this->ruang->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	//untuk menambahkan user website
	public function ruang_add()
	{
		$data = array(
			'namaruang' => $this->input->post('namaruang'),
			'ketua' => $this->input->post('ketua')
			);
		$insert = $this->ruang->save($data);
		echo json_encode(array("status" => TRUE));
	}
	//untuk mengakses informasi pengguna berdasarkan nomor id untuk selanjutnya diperbarui 
	public function ruang_edit($id)
	{
		$data = $this->ruang->get_by_id($id); 
		echo json_encode($data);
	}
	//memperbarui informasi data pengguna yang sebelumnya telah tersimpan pada database
	public function ruang_update()
	{	
		$data = array(
			'namaruang' => $this->input->post('namaruang'),
			'ketua' => $this->input->post('ketua')
		);
		echo json_encode($data);
		$this->ruang->update(array('idruang' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	//menghapus data pengguna pada database berdasarkan nomor id
	public function ruang_delete($id)
	{
		$this->ruang->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan jumlah user yang terdaftar pada beranda
	public function jumlahdata() {
		$res = $this->ruang->countAll("tblruang");
		echo json_encode($res);
	}
}
?>