<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('status') != "login") {
			redirect('login','refresh');
		}
		//$this->load->view('vhome');
		//$this->load->model('M_kendaraan','datakendaraan');
	}
	//untuk menampilkan view halaman beranda
	public function index() {
		$this->load->view('vhome');
	}
	//untuk menampilkan view halaman data kendaraan
	/*public function data_kendaraan() {
		$this->load->view('vkendaraan');
	}
	//untuk menampilkan informasi data kendaraan yang masuk pintu gerbang beserta tanggal dan waktu pada saat itu
	public function pintu_gerbang() {
		date_default_timezone_set("Asia/Bangkok");
		$tanggal=date("D d-M-Y");
		$res = $this->datakendaraan->SelectDataMasuk();
		foreach ($res as $row ) {
			if($row['tanggal'] != $tanggal){
				$this->datakendaraan->TruncDataMasuk();
			}
		}
		$data = array('data' => $res);
		$this->load->view('vgerbang',$data);
	}
	//untuk menampilkan view halaman masuk pintu gerbang
	public function transaksi() {
		$this->load->view('vtransaksi');
	}
	//untuk menampilkan view halaman lihat data
	public function lihat() {
		$this->load->view('vlihat');
	}
	//untuk menampilkan view halaman tambah user
	public function tambah_user() {
		$this->load->view('vaccount');
	}

	//AJAX
	public function ajax_list()
	{	
		$list = $this->datakendaraan->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->plat;
			$row[] = $person->pengemudi;
			$row[] = $person->jenis;
			$row[] = $person->kapasitas;
			$row[] = '<a class="btn btn-primary btn-outline-primary" href="'.base_url().'/kendaraan/lihatdata/'.$person->id_kendaraan.'" title="Edit">Lihat data</a>';

			//html untuk kolom aksi
			$row[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_data('."'".$person->id_kendaraan."'".')"><i class="icofont icofont-pencil-alt-2"></i> Edit</a>
					  <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_data('."'".$person->id_kendaraan."'".')"><i class="icofont icofont-trash"></i> Delete</a>';
			
			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->datakendaraan->count_all(),
					"recordsFiltered" => $this->datakendaraan->count_filtered(),
					"data" => $data,
					);
		//output untuk format json
		echo json_encode($output);
	}
	//fungsi menambahkan data kendaraan pada database
	public function ajax_add()
	{
		$data = array(
			'rfid' => $this->input->post('rfid'),
			'plat' => $this->input->post('nopol'),
			'pengemudi' => $this->input->post('pengemudi'),
			'merk' => $this->input->post('merk'),
			'jenis' => $this->input->post('jenis'),
			'kapasitas' => $this->input->post('kapasitas'),
			'pemilik' => $this->input->post('pemilik'),
			'tahun' => $this->input->post('tahun')
			);
		$insert = $this->datakendaraan->save($data);
		echo json_encode(array("status" => TRUE));
	}
	//mengakses informasi data kendaraan berdasarkan nomor id untuk selanjutnya diperbarui 
	public function ajax_edit($id)
	{
		$data = $this->datakendaraan->get_by_id($id); 
		echo json_encode($data);
	}
	//memperbarui informasi data kendaraan yang sebelumnya telah tersimpan pada database
	public function ajax_update()
	{	
		$data = array(
			'rfid' => $this->input->post('rfid'),
			'plat' => $this->input->post('nopol'),
			'pengemudi' => $this->input->post('pengemudi'),
			'merk' => $this->input->post('merk'),
			'jenis' => $this->input->post('jenis'),
			'kapasitas' =>$this->input->post('kapasitas'),
			'pemilik' => $this->input->post('pemilik'),
			'tahun' => $this->input->post('tahun')
		);
		echo json_encode($data);
		$this->datakendaraan->update(array('id_kendaraan' => $this->input->post('id')), $data);
	}
	//menghapus data kendaraan pada database berdasarkan nomor id 
	public function ajax_delete($id)
	{
		$this->datakendaraan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	//menampilkan informasi lengkap mengenai data kendaraan saat memilih button lihat data
	public function lihatdata($id){
		$data = $this->datakendaraan->GetKendaraan($id);
		$data = array('data' => $data);
		$this->load->view('vlihat',$data);
	}
	//notifikasi sebagai tanda jika ada RFID yang belum terdaftar pada database
	public function notif(){
		$res = $this->datakendaraan->SelectR();
		echo json_encode($res);
	}
	//menampilkan jumlah data kendaraan yang tersimpan di database pada beranda
	public function jumlahdata() {
		$res = $this->datakendaraan->countAll("datakendaraan");
		echo json_encode($res);
	}
	//menampilkan jumlah data kendaraan yang masuk pintu gerbang pada beranda
	public function jumlahmasuk() {
		$res = $this->datakendaraan->countMU();
		echo json_encode($res);
	}	*/
}
?>