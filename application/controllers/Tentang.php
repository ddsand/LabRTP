<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_Peminjaman');
	}
	public function index() {
		$data['alat'] = $this->M_Peminjaman->getDevice();
		$this->load->view('v_tentang',$data);
	}
}