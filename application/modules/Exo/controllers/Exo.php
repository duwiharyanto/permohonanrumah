<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exo extends MY_Controller {
	public function __construct(){
		parent::__construct();
		// $this->duwi->listakses($this->session->userdata('user_level'));
		// $this->duwi->cekadmin();
	}
	private $default_leveluser=2;
	private $default_statususer=1; //AKTIF
	private $default_dashboarduser='Dashboard';
	private $TESTING=true;
	private $OPEN_REGISTRASI=false;
	
	public function index(){
		echo 'dawdwad';
		exit();
	}
}
