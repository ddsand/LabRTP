<?php 
	
class M_pinjam extends CI_Model {
	var $table = 'tblpinjamruang'; //deklarasi tabel yang digunakan
	var $column_order = array('peminjam','tglpinjam','kelas','status'); //deklarasi nama kolom untuk digunakan pada fungsi order/sort  
	var $column_search = array('peminjam','tglpinjam','kelas','status'); //deklarasi nama kolom untuk query search
	var $order = array('idpinjam' => 'asc'); //deklarasi  id tabel untuk fungsi search and order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//untuk mengambil data query pada tabel berdasarkan struktur dari datatable
	private function _get_datatables_query()
	{
		
		//$this->db->from($this->table); //definisi tabel yang digunakan
		$this->db->select('*');
		$this->db->from('tblpinjamruang');
		$this->db->join('tblruang','tblruang.idruang=tblpinjamruang.idruang');
		$i = 0; //mendefinisikan nilai awal counter data pada tabel
	
		foreach ($this->column_search as $item) //perulangan untuk kolom yang akan ditampilkan
		{
			if($_POST['search']['value']) //perintah untuk fungsi cari menggunakan metode POST
			{
				
				if($i===0) 
				{
					$this->db->group_start(); //perintah query group start digunakan untuk mengantisipasi jika terdapat input lebih dari satu karakter 
					$this->db->like($item, $_POST['search']['value']); //untuk mencari karakter yang sama dengan data pada tabel dan input POST
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']); //perintah or_like digunakan apabila karakter lebih dari satu
				}

				if(count($this->column_search) - 1 == $i) //akhir perulangan
					$this->db->group_end(); //akhir perintah query
			}
			$i++;
		}
		//digunakan untuk fungsi order pada data tabel berdasarkan kolom 
		if(isset($_POST['order'])) 
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		//digunakan untuk fungsi order
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	//digunakan untuk mendapatkan data pada tabel untuk ditampilkan
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	//untuk menghitung jumlah data pada tabel
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	//untuk menjumlahkan seluruh data pada tabel
	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//untuk mendapatkan query data berdasarkan nomor id
	public function get_by_id($id)
	{
		$this->db->from('tblpinjamruang');
		$query = $this->db->get();
		return $query->row();
	}
	//fungsi untuk menyimpan data baru dari form
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	//fungsi untuk memperbarui data pada tabel
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	//fungsi untuk menghapus data pada tabel
	public function delete_by_id($id)
	{
		$this->db->where('idruang', $id);
		$this->db->delete($this->table);
	}
	//menghitung data pada tabel account
	public function countAll($table){
		$this->db->select('count(idruang) as rows');
		$this->db->from($table);
		$query = $this->db->get()->row();
		return $query;
	}
}
?>