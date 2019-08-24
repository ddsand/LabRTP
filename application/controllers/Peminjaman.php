<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_Peminjaman');
	}
	public function Submit() {
		$data = array();
		$data_input = array(
			'idalat' => $this->input->post('alat'),
			'kelas' => $this->input->post('tingkat')." ".$this->input->post('kelas'),
			'peminjam' => $this->input->post('nrp'),
			'tglpinjam' => $this->input->post('tgl_pinjam'),
			'jmlpinjam' => $this->input->post('jumlah'),
			'statuspinjam' => '0'
		);
		$data_alat = $this->M_Peminjaman->getThisDevice($data_input['idalat']);
		$jumlah_sekarang = $data_alat->jumlah;
		if($jumlah_sekarang < $this->input->post('jumlah')){
			redirect('Peminjaman/Error','refresh');			
		}else{
			$data_update = array(
				'jumlah' => ($jumlah_sekarang - $this->input->post('jumlah'))
			);
			$insert = $this->M_Peminjaman->pinjamBarang($data_input);
			$update	= $this->M_Peminjaman->updateBarang($data_input['idalat'],$data_update);	
			redirect('Home','refresh');	
		}		
	}

	public function Submit_() {
		$data = array();
		$data_input = array(
			'idruang' => $this->input->post('ruang'),
			'kelas' => $this->input->post('tingkat_')." ".$this->input->post('kelas_'),
			'peminjam' => $this->input->post('nrp_'),
			'tglpinjam' => $this->input->post('tgl_pinjam_'),			
			'status' => '0'			
		);
		$data_ruang = $this->M_Peminjaman->getThisRoom($data_input['idruang'],$data_input['tglpinjam'])->num_rows();
		echo "<pre>";
		print_r($data_input);
		echo "<br>";
		//echo $data_ruang;
		if($data_ruang == 0){
			// Insert Data
			$insert = $this->M_Peminjaman->pinjamRuang($data_input);
			redirect('Home','refresh');	
		}else{
			//echo "Sudah di pesan";
			redirect('Peminjaman/Error','refresh');
		}
		/*if($jumlah_sekarang < $this->input->post('jumlah')){
			redirect('Peminjaman/Error','refresh');			
		}else{
			$data_update = array(
				'jumlah' => ($jumlah_sekarang - $this->input->post('jumlah'))
			);
			$insert = $this->M_Peminjaman->pinjamBarang($data_input);
			$update	= $this->M_Peminjaman->updateBarang($data_input['idalat'],$data_update);	
			redirect('Home','refresh');	
		}*/		
	}

	public function Submit__() {
		$data = array();
		$data_input = array(
			'pengirim' => $this->input->post('nrp__'),
			'ketpengaduan' => $this->input->post('kepentingan'),
			'isi' => $this->input->post('isi'),
			'status' => '0',			
			'tglditerima' => $this->input->post('tgl_terima')			
		);
		$insert = $this->M_Peminjaman->insertPengaduan($data_input);
		if($insert){
			redirect('Home','refresh')
		}
	}

	public function Error(){
		$data['alat'] = $this->M_Peminjaman->getDevice();
		$data['ruang'] = $this->M_Peminjaman->getRoom();
		$data['error'] = "1";			
		$this->load->view('v_home',$data);
	}
	
}