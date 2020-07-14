<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		// $this->duwi->listakses($this->session->userdata('user_level'));
		//$this->duwi->cekadmin();
		$this->user_level=$this->session->userdata('user_level');
	}
	public function setting(){
		$q_activity=[
			'tabel'=>'activity',
			'order'=>['kolom'=>'created_at','orderby'=>'DESC'],
		];
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'dokumentasi',
			'submenu'=>false,
			'url'=>base_url('Dokumentasi'),
			'activity'=>$this->Mdb->read($q_activity)->result(),
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view('Dokumentasi',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level),
		];
		backend($data);
	}
}
