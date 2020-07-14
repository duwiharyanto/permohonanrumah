<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendidikan extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='pendidikan';
	private $id='pendidikan_id';
	private $index='Master/pendidikan/Index';
	private $path_tabel='Master/pendidikan/tabel';
	private $add='Master/pendidikan/add';
	private $edit='Master/pendidikan/edit';
	//private $path='upload/sistem/';

	public function setting(){
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'master',
			'submenu'=>'pendidikan',
			'headline'=>'master pendidikan',
			'url'=>'Master/pendidikan',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>true,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'cetak'=>false,
				'url'=>'Master/pendidikan',
			],
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view($this->index,$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level), //LOAD BACKEND MENU
		];
		backend($data); //LOAD HELPER BACKEND
	}
	public function tabel(){
		$q=[
			'tabel'=>'pendidikan',
		];
		$data=[
			'data'=>$this->Mdb->read($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view($this->path_tabel,$data);
	}
	public function add(){
		$cek_user=[
			'tabel'=>$this->tabel,
			'where'=>[['user_username'=>$this->input->post('user_username')]]
		];
		if($this->input->post('pendidikan_nama')){
			$data=[
				'pendidikan_nama'=>$this->input->post('pendidikan_nama'),
			];
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
			];
			$r=$this->Mdb->insert($q);
			$dt=toastsimpan($r,'Pendidikan');
			return $this->output->set_output(json_encode($dt));
		}
		$q=[
			'tabel'=>$this->tabel,
		];
		$level=[
			'tabel'=>'level',
		];
		$data=[
			'dump'=>$this->Mdb->read($q)->result(),
			'level'=>$this->Mdb->read($level)->result(),
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view($this->add,$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('pendidikan_nama')){
			$data=[
				'pendidikan_nama'=>$this->input->post('pendidikan_nama'),
			];
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success','pendidikan');
			}else{
				$data=toastupdate('error','pendidikan');
			}
			return $this->output->set_output(json_encode($data));
		}
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[[$this->id=>$id]],
		];
		$level=[
			'tabel'=>'level',
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'edit data',
			'level'=>$this->Mdb->read($level)->result(),
			'data'=>$result,
		];
		$this->load->view($this->edit,$data);
	}
	public function hapus(){
		$id=$this->input->post('id');
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[$this->id=>$id]
		];
		$result=$this->Mdb->delete($q);
		if($result){
			$data=toasthapus('success','pendidikan');
		}else{
			$data=toasthapus('error','pendidikan');
		}
		$this->output->set_output(json_encode($data));
	}
	public function faker(){
		$faker=Faker\factory::create('id_ID');
		for ($i=0; $i < 20 ; $i++) {
			echo $faker->name.'<br>';
			echo $faker->date.'<br>';
		}
	}
}
