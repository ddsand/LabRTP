<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_Peminjaman extends CI_Model
	{
		function getDevice(){			
			$query = $this->db->get('tblalat')->result();
			return $query;
		}

		function getThisDevice($where){
			$this->db->where('idalat',$where);
			$query = $this->db->get('tblalat')->row();
			return $query;
		}

		function getRoom(){
			$query = $this->db->get('tblruang')->result();
			return $query;
		}

		function getThisRoom($room,$date){
			$this->db->where('idruang',$room);
			$this->db->where('tglpinjam',$date);
			$query = $this->db->get('tblpinjamruang');
			return $query;
		}

		function pinjamBarang($dataInput){
			$this->db->insert('tblpinjamalat',$dataInput);
			return $this->db->insert_id();
		}

		function pinjamRuang($dataInput){
			$this->db->insert('tblpinjamruang',$dataInput);
			return $this->db->insert_id();
		}

		function updateBarang($where,$dataUpdate){
			$this->db->where('idalat',$where);
			return $this->db->update('tblalat',$dataUpdate);
		}

		function insertPengaduan($input){
			$this->db->insert('tblpengaduan',$input);
			return $this->db->insert_id();
		}
	}
