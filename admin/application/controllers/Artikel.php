<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class artikel extends CI_Controller {

	function __construct() {
		parent::__construct();
		ob_start();
		$this->load->model('M_artikel', 'artikel');
	}
	public function index() {
		if($this->session->userdata('status') != "login") {
			$this->load->view('vlogin');
		}else{
			$this->load->view('vartikel');
		}	
	}

	public function artikel_list()
	{
		$list = $this->artikel->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->judulartikel;
			$row[] = $person->tglrilis;
			//html untuk kolom aksi
			$row[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_data('."'".$person->idartikel."'".')"><i class="icofont icofont-pencil-alt-2"></i> Edit</a>
					  <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_data('."'".$person->idartikel."'".')"><i class="icofont icofont-trash"></i> Delete</a>';
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->artikel->count_all(),
					"recordsFiltered" => $this->artikel->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	//untuk menambahkan user website
	public function artikel_add()
	{
		$data = array(
			'judulartikel' => $this->input->post('judulartikel'),
			'tglrilis' => date("d-M-Y"),
			'isi' => $this->input->post('isi'),
			'gambar' => $this->input->post('gambar')
			);
		$insert = $this->artikel->save($data);
		echo json_encode(array("status" => TRUE));
	}
	//untuk mengakses informasi pengguna berdasarkan nomor id untuk selanjutnya diperbarui 
	public function artikel_edit($id)
	{
		$data = $this->artikel->get_by_id($id); 
		echo json_encode($data);
	}
	//memperbarui informasi data pengguna yang sebelumnya telah tersimpan pada database
	public function artikel_update()
	{	
		$data = array(
			'judulartikel' => $this->input->post('judulartikel'),
			'isi' => $this->input->post('isi'),
			'gambar' => $this->input->post('gambar')
		);
		echo json_encode($data);
		$this->artikel->update(array('idartikel' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	//menghapus data pengguna pada database berdasarkan nomor id
	public function artikel_delete($id)
	{
		$this->artikel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan jumlah user yang terdaftar pada beranda
	public function jumlahdata() {
		$res = $this->artikel->countAll("tblartikel");
		echo json_encode($res);
	}
}
?>