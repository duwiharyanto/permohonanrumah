<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">Status</th>
						<th class="text-white">Pemohon</th>
						<th class="text-white">Kep.Tanah</th>
						<th class="text-white">Kep.Rumah</th>
						<th class="text-white">Kawasan</th>
						<th class="text-white">Asset</th>
						<th class="text-white">Bantuan</th>
						<th class="text-center text-white">#</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr>
							<td><?=$i?></td>
							<td>
								Diajukan : <?=date('d-m-Y',strtotime($row->pengajuan))?><br />
								<a href="javascript:void(0)" class="badge <?=($row->permohonan_aproval==1 ? 'badge-success':($row->permohonan_aproval==2 ? 'badge-danger':'badge-primary'))?>"><?=($row->permohonan_aproval==1 ? 'Disetujui':($row->permohonan_aproval==2 ? 'Ditolak':'Menunggu'))?></a><br />
								<p class="text-danger">
									<?php if($row->permohonan_catatan):?>
										Catatan : <?=ucwords($row->permohonan_catatan)?>
									<?php endif;?>
								</p>
							</td>
							<td><?=ucwords($row->pemohon_nama)?><br />
								<?=ucwords($row->pemohon_notlp)?>
								<br /><strong><?='Alamat : '.$row->pemohon_alamat?></strong></td>
							<td><?=ucwords($row->kepemilikantanah_keterangan)?></strong></td>
							<td><?=ucwords($row->kepemilikanrumah_keterangan)?></td>
							<td><?=ucwords($row->kawasan_keterangan)?></td>
							<td>Rumah :<?=$row->permohonan_asetrumah==1 ? 'Ada':'Tidak Ada'?><br />
									Tanah :<?=$row->permohonan_asettanah==1 ? 'Ada':'Tidak Ada'?>
							</td>
							<td><?=($row->permohonan_bantuansebelumnya==1 ? 'Ya, Lebih dari 10 tahun yang lalu':($row->permohonan_bantuansebelumnya==2 ? 'Ya, Lebih dari 10 tahun yang lalu':'Belum Pernah'))?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->permohonan_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
