<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('M_Artikel');
            $this->load->model('M_Peminjaman');
		$this->load->library('pagination');
	}
	public function index() {
		$config = array();
		$data = array();
		$limit_per_page = 5;
		$page =  ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records = $this->M_Artikel->getTotalArtikel();
            $data['alat'] = $this->M_Peminjaman->getDevice();
		if($total_records > 0){
		$data['artikel'] = $this->M_Artikel->getArtikel($limit_per_page,$page*$limit_per_page);
            $data['recent_news'] = $this->M_Artikel->getRecentNews();
		$config['base_url'] = base_url() . 'artikel/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<div class="blog-pagination-wrap"> <ul class="pagination blog-pagination list-unstyled">';
            $config['full_tag_close'] = '</ul></div>';
             
            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<li class="firstlink">';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<li class="lastlink">';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = '<i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="active">';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $data['links'] = $this->pagination->create_links();
		}
		//echo $data["links"];
		//echo json_encode($data['artikel']);
		//echo $total_records;
		$this->load->view('v_artikel',$data);
	}
	public function detail($judul){
		$data = array();
		$data['alat'] = $this->M_Peminjaman->getDevice();
              $data['recent_news'] = $this->M_Artikel->getRecentNews();
		$data['d_artikel'] = $this->M_Artikel->getThisArticle(urldecode($judul));		
		//echo json_encode($data['d_artikel']);
		$this->load->view('v_detail',$data);
	}


}