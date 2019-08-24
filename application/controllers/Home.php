<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_Peminjaman');
		$this->load->model('M_Artikel');
	}
	public function index() {
		$data = array();
		$data['alat'] = $this->M_Peminjaman->getDevice();
		$data['ruang'] = $this->M_Peminjaman->getRoom();
		$data['recent_news'] = $this->M_Artikel->getRecentNews();
		$this->load->view('v_home',$data);
	}
	public function getJumlah($alat) {
		$data = array();
		$data_alat = $this->M_Peminjaman->getThisDevice($alat);
		$data['jumlah'] = $data_alat->jumlah;
		$this->load->view('v_option',$data);
	}
}