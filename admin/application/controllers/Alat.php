<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller {
	function __construct() {
		parent::__construct();
		ob_start();
		$this->load->model('M_alat', 'alat');
	}
	public function index() {
		if($this->session->userdata('status') != "login") {
			$this->load->view('vlogin');
		}else{
			$this->load->view('valat');
		}	
	}
	public function alat_list()
	{
		$list = $this->alat->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->namaalat;
			$row[] = $person->jumlah;
			$row[] = $person->tahun;
			if($person->status == 1){
				$a="Baik";
			}else{
				$a="Rusak";
			}

			$row[] = $a;

			//html untuk kolom aksi
			$row[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_data('."'".$person->idalat."'".')"><i class="icofont icofont-pencil-alt-2"></i> Edit</a>
					  <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_data('."'".$person->idalat."'".')"><i class="icofont icofont-trash"></i> Delete</a>';		
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->alat->count_all(),
					"recordsFiltered" => $this->alat->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	//untuk menambahkan user website
	public function alat_add()
	{
		$data = array(
			'namaalat' => $this->input->post('namaalat'),
			'tahun' => $this->input->post('tahun'),
			'jumlah' => $this->input->post('jumlah'),
			'status' => $this->input->post('status')
			);
		$insert = $this->alat->save($data);
		echo json_encode(array("status" => TRUE));
	}
	//untuk mengakses informasi pengguna berdasarkan nomor id untuk selanjutnya diperbarui 
	public function alat_edit($id)
	{
		$data = $this->alat->get_by_id($id); 
		echo json_encode($data);
	}
	//memperbarui informasi data pengguna yang sebelumnya telah tersimpan pada database
	public function alat_update()
	{	
		$data = array(
			'namaalat' => $this->input->post('namaalat'),
			'tahun' => $this->input->post('tahun'),
			'jumlah' => $this->input->post('jumlah'),
			'status' => $this->input->post('status')
		);
		echo json_encode($data);
		$this->alat->update(array('idalat' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	//menghapus data pengguna pada database berdasarkan nomor id
	public function alat_delete($id)
	{
		$this->alat->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan jumlah user yang terdaftar pada beranda
	public function jumlahdata() {
		$res = $this->alat->countAll("tblalat");
		echo json_encode($res);
	}
}
?>