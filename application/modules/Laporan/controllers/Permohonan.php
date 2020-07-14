<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends MY_Controller {

	/**
	 * Email haryanto.duwi@gmail.com
	 */

	public function __construct(){
		parent::__construct();
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->user_level=$this->session->userdata('user_level');
		// $this->duwi->cekadmin();
	}
	private $tabel='pemohon';
	private $id='pemohon_id';
	private $MSG='Pemohon';
	private $TO_INDEX='Permohonan/Index';
	private $TO_TABEL='Permohonan/tabel';
	private $TO_ADD='Permohonan/add';
	private $TO_EDIT='Permohonan/edit';

	public function setting($param=null){
		$setting=[
			'sistem'=>'Starnode',
			'menu'=>'laporan',
			'submenu'=>'lap_permohonan',
			'headline'=>'laporan permohonan',
			'url'=>'Laporan/Permohonan',  //CASE SENSITIVE
			'aksi'=>[
				'add'=>false,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>true,
				'url'=>'Laporan/Permohonan',
			],
		];
		if(isset($param['bulan'])){
			$bulan=[
				'tabel'=>'bulan',
			];
			$setting['bulan']=$this->Mdb->read($bulan)->result();
		}
		return $setting;
	}
	public function index()
	{
		$param=[
			'bulan'=>true,
		];
		$data=[
			'konten'=>$this->load->view($this->TO_INDEX,$this->setting($param),TRUE),
			'setting'=>$this->setting(),
			'menu'=>$this->duwi->menu_backend($this->user_level),
		];
		backend($data);
	}
	public function tabel($keyword=null){
		if(!$keyword){
			$q=[
				'select'=>'a.*,a.created_at as pengajuan,b.pemohon_nama,b.pemohon_alamat,b.pemohon_notlp,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
				'tabel'=>'permohonan a',
				'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
							['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
					['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']]
			];
		}else{
			$q=[
				'select'=>'a.*,a.created_at as pengajuan,b.pemohon_nama,b.pemohon_alamat,b.pemohon_notlp,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
				'tabel'=>'permohonan a',
				'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
							['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
					['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']],
				'where'=>[['MONTH(a.created_at)'=>$keyword]],
			];
		}
		$data=[
			'data'=>$this->Mdb->join($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view($this->TO_TABEL,$data);

	}
	public function add(){
		if($this->input->post('log_iduser')){
			$data=[
				'log_iduser'=>$this->input->post('log_iduser'),
				'log_aksi'=>$this->input->post('log_aksi')
			];
			return $this->output->set_output(json_encode($data));
		}
		$data=[
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view($this->TO_ADD,$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('log_aksi')){
			$data=[
				'log_aksi'=>$this->input->post('log_aksi'),
			];
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$data,
				'where'=>[$this->id=>$id],
			];
			$r=$this->Mdb->update($q);
			if($r){
				$data=toastupdate('success',$this->MSG);
			}else{
				$data=toastupdate('error',$this->MSG);
			}
			return $this->output->set_output(json_encode($data));
		}
		$q=[
			'tabel'=>$this->tabel,
			'where'=>[[$this->id=>$id]],
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
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
			$data=toasthapus('success',$this->MSG);
		}else{
			$data=toasthapus('error',$this->MSG);
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
	public function cetak($keyword=null){
		if(!$keyword){
			$q=[
				'select'=>'a.*,a.created_at as pengajuan,b.pemohon_nama,b.pemohon_alamat,b.pemohon_notlp,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
				'tabel'=>'permohonan a',
				'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
							['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
					['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']]
			];
		}else{
			$q=[
				'select'=>'a.*,a.created_at as pengajuan,b.pemohon_nama,b.pemohon_alamat,b.pemohon_notlp,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
				'tabel'=>'permohonan a',
				'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
							['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
					['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']],
				'where'=>[['MONTH(a.created_at)'=>$keyword]],
			];
		}
		$data=array(
			'setting'=>$this->setting(),
			'data'=>$this->Mdb->join($q)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'),
		);
		$print=[
			'konten'=>$this->load->view('Permohonan/cetak',$data,TRUE), //VIEW HTML
		];
		$view=exportpdf($print);
		$cetak=[
			'judul'=>ucwords($data['setting']['headline']).'/'.date('d-m-Y'),
			'view'=>$view,
			'kertas'=>'A4-L',
		];
		$this->duwi->prosescetak($cetak);
	}
}
