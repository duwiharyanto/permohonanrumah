<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemohon extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		$this->user_id=$this->session->userdata('user_id');
		// $this->duwi->cekadmin();
	}
	private $tabel='pemohon';
	private $id='pemohon_id';
	private $MSG_ACTION='Pemohon';
	//private $path='upload/sistem/';

	public function setting(){
		$param=true;
		if($this->user_level!=1 AND $this->user_level!=2){
			$param=false;
		}
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'pemohon',
			'submenu'=>false,
			'headline'=>'daftar pemohon',
			'url'=>'Pemohon',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>$param,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>$param,
				'cetak'=>false,
				'url'=>'Pemohon',
			],
		];
		return $setting;
	}
	public function index()
	{
		$data=[
			'konten'=>$this->load->view('Index',$this->setting(),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level), //LOAD BACKEND MENU
		];
		backend($data); //LOAD HELPER BACKEND
	}
	public function tabel(){
		if($this->user_level!=1 AND $this->user_level!=2){
			$q=[
				'select'=>'a.*,b.pendidikan_nama,c.pekerjaan_nama',
				'tabel'=>'pemohon a',
				'join'=>[['tabel'=>'pendidikan b','ON'=>'a.pemohon_pendidikanid=b.pendidikan_id','jenis'=>'INNER'],
						['tabel'=>'pekerjaan c','ON'=>'a.pemohon_pekerjaanid=c.pekerjaan_id','jenis'=>'INNER']],
				'where'=>[['a.pemohon_id'=>$this->user_id]]
			];
		}else{
			$q=[
				'select'=>'a.*,b.pendidikan_nama,c.pekerjaan_nama',
				'tabel'=>'pemohon a',
				'join'=>[['tabel'=>'pendidikan b','ON'=>'a.pemohon_pendidikanid=b.pendidikan_id','jenis'=>'INNER'],
						['tabel'=>'pekerjaan c','ON'=>'a.pemohon_pekerjaanid=c.pekerjaan_id','jenis'=>'INNER']]
			];			
		}

		$data=[
			'data'=>$this->Mdb->join($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view('tabel',$data);
	}
	public function add(){
		if($this->input->post('pemohon_nama')){
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
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
			];
			$r=$this->Mdb->insert($q);
			$dt=toastsimpan($r,$this->MSG_ACTION);
			return $this->output->set_output(json_encode($dt));
		}
		$pekerjaan=[
			'tabel'=>'pekerjaan',
		];
		$pendidikan=[
			'tabel'=>'pendidikan',
		];
		$data=[
			'pekerjaan'=>$this->Mdb->read($pekerjaan)->result(),
			'pendidikan'=>$this->Mdb->read($pendidikan)->result(),
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view('add',$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('pemohon_nama')){
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
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success',$this->MSG_ACTION);
			}else{
				$data=toastupdate('error',$this->MSG_ACTION);
			}
			return $this->output->set_output(json_encode($data));
		}
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[[$this->id=>$id]],
		];
		$pekerjaan=[
			'tabel'=>'pekerjaan',
		];
		$pendidikan=[
			'tabel'=>'pendidikan',
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
			'pekerjaan'=>$this->Mdb->read($pekerjaan)->result(),
			'pendidikan'=>$this->Mdb->read($pendidikan)->result(),
			'setting'=>$this->setting(),
			'headline'=>'edit data',
			'data'=>$result,
		];
		$this->load->view('edit',$data);
	}
	public function hapus(){
		$id=$this->input->post('id');
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[$this->id=>$id]
		];
		$result=$this->Mdb->delete($q);
		if($result){
			$data=toasthapus('success',$this->MSG_ACTION);
		}else{
			$data=toasthapus('error',$this->MSG_ACTION);
		}
		$this->output->set_output(json_encode($data));
	}
}
