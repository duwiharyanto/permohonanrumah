<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {

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
	private $OPEN_REGISTRASI=false;
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
	public function setting(){
		$setting=[
			'testing'=>$this->TESTING,
			'open_registrasi'=>$this->OPEN_REGISTRASI,
			'sistem'=>'Starnode',
			'menu'=>'dashboard',
			'url'=>base_url('Login'),
			'getsistem'=>$this->duwi->getsistem(),
		];
		return $setting;
	}
	public function index()
	{
		$this->duwi->ceklogin();
		$data=[
			'konten'=>$this->load->view('auth',$this->setting(),true),
			'setting'=>$this->setting(),
		];
		login($data);
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
		$data=[
			'konten'=>$this->load->view('registrasi',$this->setting(),true),
			'setting'=>$this->setting(),
		];
		login($data);
	}
	public function prosesregistrasi(){
		$this->validasiregistrasi();
		if ($this->form_validation->run()){
			$data=[
				'user_nama'=>$this->input->post('nama'),
				'user_username'=>$this->input->post('username'),
				'user_email'=>$this->input->post('email'),
				'user_password'=>md5($this->input->post('password')),
				'user_level'=>$this->default_leveluser,
				'user_status'=>$this->default_statususer,
				'user_dashboard'=>$this->default_dashboarduser,
			];
			$q=[
				'tabel'=>'user',
				'data'=>$data,
			];
			$r=$this->Mdb->insert($q);
			if($r){
				$this->session->set_flashdata('success','Pendaftaran berhasil');
			}else{
				$this->session->set_flashdata('error','Pendaftaran gagal, silahkan cek kembali');
			}
			redirect(site_url('registrasi'));
		}else{
			$data=[
				'setting'=>$this->setting(),
			];
			$this->session->set_flashdata('error','Kolom masih ada yang kosong !');
			register($data);
		}

	}
	public function prosesauth(){
		$data=[
			'konten'=>$this->load->view('auth',$this->setting(),true),
			'setting'=>$this->setting(),
		];
		$this->validation();
		if ($this->form_validation->run()){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$q_cekuser=[
				'tabel'=>'user',
				'where'=>[['user_username'=>$username]]
			];
			$r_cekuser=$this->Mdb->read($q_cekuser)->result();
			//CEK USER DI DATABASE
			if(count($r_cekuser)!=0){
				$q_cekuserpass=[
					'tabel'=>'user',
					'where'=>[['user_username'=>$username],['user_password'=>md5($password)]],
					'limit'=>1,
				];
				$r_cekuserpass=$this->Mdb->read($q_cekuserpass);
				//CEK USER DAN PASS DI DATABASE
				if(count($r_cekuserpass->result())!=0){
					$dt_session=$r_cekuserpass->row();
					$set_session=[
						'user_dashboard'=>$dt_session->user_dashboard,
						'user_nama'=>$dt_session->user_nama,
						'user_level'=>$dt_session->user_level,
						'user_id'=>$dt_session->user_id,
						'user_foto'=>$dt_session->user_foto ? $dt_session->user_foto:'default.png' ,
						'user_login'=>true,
						'user_dashboard'=>$dt_session->user_dashboard,
					];
					if($dt_session->user_status!=1){
						$this->session->set_flashdata('error','User Anda Non Aktif, kontak Adminstrator');
						login($data);
					}else{
						$logdata=[
							'aksi'=>'login',
							'iduser'=>$dt_session->user_id,
							'loglevel'=>1,
						];
						if(!$this->duwi->log($logdata)){
							$this->session->set_flashdata('error','log tidak tercatat');
							redirect(site_url('Login'));
						}
						//CEK KETERSEDIAAN HALAMAN DASHBOARD USER
						if($dt_session->user_dashboard){
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
							$this->session->set_flashdata('error','User anda belum di set halaman dashboard, kontak administrator');
							login($data);
						}

					}
				}else{
					$this->session->set_flashdata('error','Password & Username Salah');
					login($data);
				}
			}else{
				$this->session->set_flashdata('error','Username tidak ditemukan');
				login($data);
			}
		}else{
			$this->session->set_flashdata('error','Username tidak ditemukan');
			login($data);
		}
	}
	public function logout(){
		$logdata=[
			'aksi'=>'logout',
			'iduser'=>$this->session->userdata('user_id'),
			'loglevel'=>3,
		];
		if(!$this->duwi->log($logdata)){
			$this->session->set_flashdata('error','log tidak tercatat');
			redirect(base_url('Login'));
		}
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}
}
