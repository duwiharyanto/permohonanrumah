<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">Nama</th>
						<th class="text-white">Tgl.Lahir</th>
						<th class="text-white">Pendidikan</th>
						<th class="text-white">Pekerjaan</th>
						<th class="text-white">Alamat</th>
						<th class="text-white">No.Tlp</th>
						<th class="text-center text-white">#</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<?php
							$tgllahir=new DateTime($row->pemohon_tgllahir);
							$now=new DateTime('today');
							$umur=$now->diff($tgllahir);
						?>
						<tr>
							<td><?=$i?></td>
							<td><?=ucwords($row->pemohon_nama)?><br /><strong><?=$row->pemohon_jeniskelamin==1 ? 'Laki-laki':'Perempuan'?></strong><br />
									NIK : <?=$row->pemohon_nik?>
							</td>
							<td><?=date('d-m-Y',strtotime($row->pemohon_tgllahir))?><br /><strong>Umur : <?=$umur->y.' Tahun, '.$umur->m.' Bulan'?></strong></td>
							<td><?=ucwords($row->pendidikan_nama)?></td>
							<td><?=ucwords($row->pekerjaan_nama)?></td>
							<td><?=ucwords($row->pemohon_alamat)?></td>
							<td><?=ucwords($row->pemohon_notlp)?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->pemohon_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
