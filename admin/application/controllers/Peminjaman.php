<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct() {
		parent::__construct();
		ob_start();
		$this->load->model('M_peminjaman', 'pinjam');
	}
	public function index() {
		if($this->session->userdata('status') != "login") {
			$this->load->view('vlogin');
		}else{
			$this->load->view('vpinjamalat');
		}	
	}

	public function pinjam_list()
	{
		$list = $this->pinjam->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->namaalat;
			$row[] = $person->kelas;
			$row[] = $person->peminjam;
			$row[] = $person->jmlpinjam;
			$row[] = $person->tglpinjam;
			$row[] = $person->tglkembali;
			if($person->statuspinjam==1){
				$a="Diijinkan";
			}else if ($person->statuspinjam==2) {
				$a="Ditolak";
			}else {
				$a ='<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_data('."'".$person->idpinjam."'".')"><i class="icofont icofont-pencil-alt-2"></i> Edit Perijinan</a>
					  ';
			}
			$row[] = $a;
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->pinjam->count_all(),
					"recordsFiltered" => $this->pinjam->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	
	//untuk mengakses informasi pengguna berdasarkan nomor id untuk selanjutnya diperbarui 
	public function pinjam_edit($id)
	{
		$data = $this->pinjam->get_by_id($id); 
		echo json_encode($data);
	}
	//memperbarui informasi data pengguna yang sebelumnya telah tersimpan pada database
	public function pinjam_update()
	{	
		$data = array(
			'status' => $this->input->post('editijin'),
			'tglkembali' => $this->input->post('tglkembali')
		);
		echo json_encode($data);
		$this->pinjam->update(array('idpinjam' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	//menghapus data pengguna pada database berdasarkan nomor id
	public function pinjam_delete($id)
	{
		$this->pinjam->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan jumlah user yang terdaftar pada beranda
	public function jumlahdata() {
		$res = $this->pinjam->countAll("tblpinjam");
		echo json_encode($res);
	}
}
?>