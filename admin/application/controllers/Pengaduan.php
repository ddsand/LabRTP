<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

	function __construct() {
		parent::__construct();
		ob_start();
		$this->load->model('M_pengaduan', 'pengaduan');
	}
	public function index() {
		if($this->session->userdata('status') != "login") {
			$this->load->view('vlogin');
		}else{
			$this->load->view('vpengaduan');
		}	
	}

	public function pengaduan_list()
	{
		$list = $this->pengaduan->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no++;
			$row[] = $person->pengirim;
			$row[] = $person->ketpengaduan;
			$row[] = $person->tglditerima;
			if($person->status == 1){
				$a="Ditindaklanjuti";
			}else{
				$a= '<a class="btn btn-primary" href="javascript:void(0)" title="lihat" onclick="edit_status('."'".$person->idpengaduan."'".')"><i class="icofont icofont-pencil-alt-2"></i> Tindaklanjuti</a>
					  ';;
			}
			$row[] = $a; 
			
			//html untuk kolom aksi
			$row[] = '<a class="btn btn-warning" href="javascript:void(0)" title="lihat" onclick="edit_data('."'".$person->idpengaduan."'".')"><i class="icofont icofont-pencil-alt-2"></i> Lihat</a>
					  ';		
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->pengaduan->count_all(),
					"recordsFiltered" => $this->pengaduan->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	
	//untuk mengakses informasi pengguna berdasarkan nomor id untuk selanjutnya diperbarui 
	public function pengaduan_edit($id)
	{
		$data = $this->pengaduan->get_by_id($id); 
		echo json_encode($data);
	}
	public function editstatus($id)
	{	
		$data = array(
			'status' => 1
		);
		//echo json_encode($data);
		$this->pengaduan->update(array('idpengaduan' => $id), $data);
		//echo json_encode(array("status" => TRUE));
	}
	//menghapus data pengguna pada database berdasarkan nomor id
	public function pengaduan_delete($id)
	{
		$this->pengaduan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan jumlah user yang terdaftar pada beranda
	public function jumlahdata() {
		$res = $this->pengaduan->countAll("tblpengaduan");
		echo json_encode($res);
	}
	
}
?>