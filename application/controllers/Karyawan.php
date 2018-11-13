<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_karyawan');
	}

	public function index()
	{
		$data['judul'] = 'dashboard | Perhitungan Gaji';
		$data['karyawan'] = $this->M_karyawan->get_karyawan();
		$data['total_gaji'] = $this->M_karyawan->get_tot();
		$this->template->display('karyawan/dashboard',$data);
	}

	public function count_bonus()
	{
		if ($_POST) {
			$nama = $this->input->post('nama');
			$gaji = preg_replace('/\D/', '', $this->input->post('gaji'));
			$bonus = preg_replace('/\D/', '', $this->input->post('nilai_bonus'));
			$total_gaji = $this->input->post('total_gaji');

			$nilai_bonus = $gaji/$total_gaji*$bonus;
			$data = array(
				'nama' => $nama,
				'gaji' => $gaji,
				'bonus' => $bonus,
				'nilai_bonus' => $nilai_bonus
			);

			echo json_encode($data);
		} else {
			redirect(base_url());
		}
	}

	function get_param()
	{
		$param = $this->input->post('param');
		$data = $this->M_karyawan->get_karyawan($param);

		echo json_encode($data);
	}

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */