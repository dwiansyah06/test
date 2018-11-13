<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	function get_karyawan($param=null)
	{
		if (empty($param)) {
			$data = $this->db->get('karyawan');	
		} else {
			if ($param == "diatas") {
				$data = $this->db->query("SELECT * FROM karyawan WHERE gaji > 3000000");
			} else {
				$data = $this->db->query("SELECT * FROM karyawan WHERE gaji <= 3000000");
			}
		}

		return $data->result();
	}

	public function get_tot(){
		$data = $this->db->query("SELECT SUM(IF(gaji > 3000000, gaji, 0)) AS total_gaji FROM karyawan");

		return $data->result();
	}

}

/* End of file M_karyawan.php */
/* Location: ./application/models/M_karyawan.php */