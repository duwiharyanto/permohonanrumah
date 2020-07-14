<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginpemohon extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		// $this->duwi->listakses($this->session->userdata('user_level'));
		// $this->duwi->cekadmin();
	}
	private $default_leveluser=2;
	private $default_statususer=1; //AKTIF
	private $default_dashboarduser='Dashboard';
	private $TESTING=true;
	private $OPEN_REGISTRASI=true;
	private $DEF_URL='Login/Loginpemohon/';
	private $DEF_AUTH='pemohonauth/auth';
	private $DEF_REGISTRASI='pemohonauth/registrasi';
	public function validation(){
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s harus diisi.',
				),
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide a %s.',
				),
			),
		);
		$this->form_validation->set_rules($config);
	}
	public function validasiregistrasi(){
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s harus diisi.',
				),
			),
			array(
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s harus diisi.',
				),
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s harus diisi.',
				),
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide a %s.',
				),
			),
		);
		$this->form_validation->set_rules($config);
	}
	public function setting($param=null){
		$setting=[
			'testing'=>$this->TESTING,
			'open_registrasi'=>$this->OPEN_REGISTRASI,
			'sistem'=>'Starnode',
			'menu'=>'dashboard',
			'url'=>base_url('Login/Loginpemohon'),
			'getsistem'=>$this->duwi->getsistem(),
		];
		if(isset($param['register'])){
			$pendidikan=[
				'tabel'=>'pendidikan',
			];
			$pekerjaan=[
				'tabel'=>'pekerjaan',
			];
			$setting['pendidikan']=$this->Mdb->read($pendidikan)->result();
			$setting['pekerjaan']=$this->Mdb->read($pekerjaan)->result();
		}
		return $setting;
	}
	public function index()
	{
		$this->duwi->ceklogin();
		$data=[
			'konten'=>$this->load->view($this->DEF_AUTH,$this->setting(),true),
			'setting'=>$this->setting(),
		];
		pemohonauth($data);
	}
	public function notif(){
		$data=[
			'view'=>$this->load->view('notif','',TRUE),
		];
		return $this->output->set_output(json_encode($data));
	}
	public function register()
	{
		$this->duwi->ceklogin();
		$param=[
			'register'=>true,
		];
		$data=[

			'konten'=>$this->load->view($this->DEF_REGISTRASI,$this->setting($param),true),
			'setting'=>$this->setting(),
		];
		pemohonauth($data);
	}
	public function prosesregistrasi(){
		$data=[
			'pemohon_nama'=>$this->input->post('pemohon_nama'),
			'pemohon_nik'=>$this->input->post('pemohon_nik'),
			'pemohon_tgllahir'=>date('Y-m-d',strtotime($this->input->post('pemohon_tgllahir'))),
			'pemohon_pendidikanid'=>$this->input->post('pemohon_pendidikanid'),
			'pemohon_jeniskelamin'=>$this->input->post('pemohon_jeniskelamin'),
			'pemohon_pekerjaanid'=>$this->input->post('pemohon_pekerjaanid'),
			'pemohon_alamat'=>$this->input->post('pemohon_alamat'),
			'pemohon_notlp'=>$this->input->post('pemohon_notlp')
		];
		$q=[
			'tabel'=>'pemohon',
			'data'=>$data,
		];
		$r=$this->Mdb->insert($q);
		if($r){
			$this->session->set_flashdata('success','Pendaftaran berhasil');
		}else{
			$this->session->set_flashdata('error','Pendaftaran gagal, silahkan cek kembali');
		}
		redirect(site_url($this->DEF_URL.'register'));

	}
	public function prosesauth(){
		$data=[
			'konten'=>$this->load->view($this->DEF_AUTH,$this->setting(),true),
			'setting'=>$this->setting(),
		];
		$this->validation();
		if ($this->form_validation->run()){
			$username=$this->input->post('username');
			$password=date('Y-m-d',strtotime($this->input->post('password')));
			$q_cekuser=[
				'tabel'=>'pemohon',
				'where'=>[['pemohon_nik'=>$username]]
			];
			$r_cekuser=$this->Mdb->read($q_cekuser)->result();
			//CEK USER DI DATABASE
			if(count($r_cekuser)!=0){
				$q_cekuserpass=[
					'tabel'=>'pemohon',
					'where'=>[['pemohon_nik'=>$username],['pemohon_tgllahir'=>$password]],
					'limit'=>1,
				];
				$r_cekuserpass=$this->Mdb->read($q_cekuserpass);
				//CEK USER DAN PASS DI DATABASE
				if(count($r_cekuserpass->result())!=0){
					$dt_session=$r_cekuserpass->row();
					$set_session=[
						'user_dashboard'=>'Pemohon',
						'user_nama'=>$dt_session->pemohon_nama,
						'user_level'=>3,
						'user_id'=>$dt_session->pemohon_id,
						'user_foto'=>'default.png',//SET FOTO
						'user_login'=>true,
					];
					// $logdata=[
					// 	'aksi'=>'login',
					// 	'iduser'=>$dt_session->user_id,
					// 	'loglevel'=>1,
					// ];
					// if(!$this->duwi->log($logdata)){
					// 	$this->session->set_flashdata('error','log tidak tercatat');
					// 	redirect(site_url('Login'));
					// }

					$this->session->set_userdata($set_session);
					//GET ATTR SISTEM
					$getsistem=$this->duwi->getsistem();
					$sistem=[
						'sistem'=>$getsistem->setting_namasistem,
						'emailsistem'=>$getsistem->setting_email,
						'alamatsistem'=>$getsistem->setting_alamat,
					];
					$this->session->set_userdata($sistem);
					$this->session->set_flashdata('success','Selamat datang '.ucwords($dt_session->user_nama));
					redirect(site_url($dt_session->user_dashboard));
				}else{
					$this->session->set_flashdata('error','Password & Username Salah');
					pemohonauth($data);
				}
			}else{
				$this->session->set_flashdata('error','Username tidak ditemukan');
				pemohonauth($data);
			}
		}else{
			$this->session->set_flashdata('error','Username tidak ditemukan');
			pemohonauth($data);
		}
	}
	public function logout(){
		if(!$this->duwi->log($logdata)){
			$this->session->set_flashdata('error','log tidak tercatat');
			redirect(base_url($this->DEF_URL));
		}
		$this->session->sess_destroy();
		redirect(site_url($this->DEF_URL));
	}
}
