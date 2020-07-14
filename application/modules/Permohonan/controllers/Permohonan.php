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
		$this->user_id=$this->session->userdata('user_id');
		// $this->duwi->cekadmin();
	}
	private $tabel='permohonan';
	private $id='permohonan_id';
	private $MSG_ACTION='Permohonan Bantuan';
	private $path='upload/permohonan/';

	public function setting(){
		$param=true;
		if($this->user_level!=1 AND $this->user_level!=2){
			$param=false;
		}
		$setting=[
			'sistem'=>'Starnodes',
			'menu'=>'permohonan',
			'submenu'=>false,
			'headline'=>'daftar permohonan bantuan',
			'url'=>'Permohonan',  //CASE SENSITIVE
			'aksi'=>[
				'tambah'=>true,
				'edit'=>true,
				'detail'=>false,
				'hapus'=>$param,
				'cetak'=>true,
				'cetakall'=>$param,
				'url'=>'Permohonan',
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
				'select'=>'a.*,a.created_at as pengajuan,b.pemohon_nama,b.pemohon_alamat,b.pemohon_notlp,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
				'tabel'=>'permohonan a',
				'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
							['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
					['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']],
				'where'=>[['b.pemohon_id'=>$this->user_id]]
			];
		}else{
			$q=[
				'select'=>'a.*,a.created_at as pengajuan,b.pemohon_nama,b.pemohon_alamat,b.pemohon_notlp,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
				'tabel'=>'permohonan a',
				'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
							['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
					['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']]
			];
		}
		$data=[
			'data'=>$this->Mdb->join($q)->result(),
			'setting'=>$this->setting(),
		];
		$this->load->view('tabel',$data);
	}
	public function add(){
		if($this->input->post('permohonan_pemohonid')){
			$data=[
				'permohonan_pemohonid'=>$this->input->post('permohonan_pemohonid'),
				'permohonan_kepemilikantanahid'=>$this->input->post('permohonan_kepemilikantanahid'),
				'permohonan_kepemilikanrumahid'=>$this->input->post('permohonan_kepemilikanrumahid'),
				'permohonan_asetrumah'=>$this->input->post('permohonan_asetrumah'),
				'permohonan_asettanah'=>$this->input->post('permohonan_asettanah'),
				'permohonan_bantuansebelumnya'=>$this->input->post('permohonan_bantuansebelumnya'),
				'permohonan_kawasanrumahid'=>$this->input->post('permohonan_kawasanrumahid'),
				'permohonan_aproval'=>false,
			];
			//============================UPLOAD FILE===============================\\
			$file='permohonan_fotorumah';
			if($_FILES[$file]['name']){
				if($this->duwi->gambarupload($this->path,$file)){
					$fileupload=$this->upload->data('file_name');
					$data[$file]=$fileupload;
				}else{
					$msg=$this->upload->display_errors();
					$dt=toastupload('error',$msg);
					return $this->output->set_output(json_encode($dt));
				}
			}
			$q=[
				'tabel'=>$this->tabel,
				'data'=>$this->security->xss_clean($data),
			];
			$r=$this->Mdb->insert($q);
			$dt=toastsimpan($r,$this->MSG_ACTION);
			return $this->output->set_output(json_encode($dt));
		}
		$kepemilikantanah=[
			'tabel'=>'kepemilikantanah',
		];
		$kepemilikanrumah=[
			'tabel'=>'kepemilikanrumah',
		];
		$kawasan=[
			'tabel'=>'kawasan',
		];
		$pemohon=[
			'tabel'=>'pemohon',
		];
		$data=[
			'kepemilikanrumah'=>$this->Mdb->read($kepemilikanrumah)->result(),
			'kepemilikantanah'=>$this->Mdb->read($kepemilikantanah)->result(),
			'pemohon'=>$this->Mdb->read($pemohon)->result(),
			'kawasan'=>$this->Mdb->read($kawasan)->result(),
			'setting'=>$this->setting(),
			'headline'=>'tambah data',
		];
		$this->load->view('add',$data);
	}
	public function edit(){
		$id=$this->input->post('id');
		if($this->input->post('permohonan_pemohonid')){
			$data=[
				'permohonan_pemohonid'=>$this->input->post('permohonan_pemohonid'),
				'permohonan_kepemilikantanahid'=>$this->input->post('permohonan_kepemilikantanahid'),
				'permohonan_kepemilikanrumahid'=>$this->input->post('permohonan_kepemilikanrumahid'),
				'permohonan_asetrumah'=>$this->input->post('permohonan_asetrumah'),
				'permohonan_asettanah'=>$this->input->post('permohonan_asettanah'),
				'permohonan_bantuansebelumnya'=>$this->input->post('permohonan_bantuansebelumnya'),
				'permohonan_kawasanrumahid'=>$this->input->post('permohonan_kawasanrumahid'),
				'permohonan_aproval'=>$this->input->post('permohonan_aproval'),
				'permohonan_catatan'=>$this->input->post('permohonan_catatan'),
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
		$kepemilikantanah=[
			'tabel'=>'kepemilikantanah',
		];
		$kepemilikanrumah=[
			'tabel'=>'kepemilikanrumah',
		];
		$kawasan=[
			'tabel'=>'kawasan',
		];
		$pemohon=[
			'tabel'=>'pemohon',
		];
		$result=$this->Mdb->read($q)->row();
		$data=[
			'kepemilikanrumah'=>$this->Mdb->read($kepemilikanrumah)->result(),
			'kepemilikantanah'=>$this->Mdb->read($kepemilikantanah)->result(),
			'pemohon'=>$this->Mdb->read($pemohon)->result(),
			'kawasan'=>$this->Mdb->read($kawasan)->result(),
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
	public function cetakpdfall(){
		$q=[
			'select'=>'a.*,b.pemohon_nama,b.pemohon_alamat,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan',
			'tabel'=>'permohonan a',
			'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
					['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
				['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER']]
		];
		$data=array(
			'setting'=>$this->setting(),
			'data'=>$this->Mdb->join($q)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'),
		);
		$print=[
			'konten'=>$this->load->view('cetakpdf',$data,TRUE), //VIEW HTML
		];
		$view=exportpdf($print);
		$cetak=[
			'judul'=>ucwords($data['setting']['headline']).'/'.date('d-m-Y'),
			'view'=>$view,
			'kertas'=>'A4-L',
		];
		$this->duwi->prosescetak($cetak);
	}
	public function cetakpdfbyid($id){
		$q=[
			'select'=>'a.*,a.created_at as pengajuan,b.*,c.kepemilikantanah_keterangan,d.kepemilikanrumah_keterangan,e.kawasan_keterangan,f.pendidikan_nama,g.pekerjaan_nama',
			'tabel'=>'permohonan a',
			'join'=>[['tabel'=>'pemohon b','ON'=>'a.permohonan_pemohonid=b.pemohon_id','jenis'=>'INNER'],
						['tabel'=>'kepemilikantanah c','ON'=>'a.permohonan_kepemilikantanahid=c.kepemilikantanah_id','jenis'=>'INNER'],
					['tabel'=>'kepemilikanrumah d','ON'=>'a.permohonan_kepemilikanrumahid=d.kepemilikanrumah_id','jenis'=>'INNER'],
				['tabel'=>'kawasan e','ON'=>'a.permohonan_kawasanrumahid=e.kawasan_id','jenis'=>'INNER'],
				['tabel'=>'pendidikan f','ON'=>'b.pemohon_pendidikanid=f.pendidikan_id','jenis'=>'INNER'],
				['tabel'=>'pekerjaan g','ON'=>'b.pemohon_pekerjaanid=g.pekerjaan_id','jenis'=>'INNER'],
			],
			'where'=>[['a.permohonan_id'=>$id]],
		];
		$data=array(
			'setting'=>$this->setting(),
			'data'=>$this->Mdb->join($q)->row(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'),
		);
		$print=[
			'konten'=>$this->load->view('cetakpdfbyid',$data,TRUE), //VIEW HTML
		];
		$view=exportpdf($print);
		$cetak=[
			'judul'=>ucwords($data['setting']['headline']).'/'.date('d-m-Y'),
			'view'=>$view,
			'kertas'=>'A4',
		];
		$this->duwi->prosescetak($cetak);
	}
}
