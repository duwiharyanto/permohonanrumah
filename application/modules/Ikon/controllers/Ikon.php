<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ikon extends MY_Controller {

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
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'setting',
			'submenu'=>'ikon',
			'url'=>base_url('Ikon'),
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view('Ikon',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level),
		];
		backend($data);
	}
}
