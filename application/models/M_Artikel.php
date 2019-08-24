<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_Artikel extends CI_Model
	{
		function getArtikel($limit,$start){
			$this->db->limit($limit,$start);
			$query = $this->db->get('tblartikel')->result();
			return $query;
		}

		function getTotalArtikel(){
			return $this->db->count_all('tblartikel');
		}

		function getThisArticle($where){
			$this->db->where('judulartikel',$where);
			$query = $this->db->get('tblartikel')->result();
			return $query;
		}

		function getRecentNews(){
			$this->db->limit(3,0);
			$query = $this->db->get('tblartikel')->result();
			return $query;
		}
	}
