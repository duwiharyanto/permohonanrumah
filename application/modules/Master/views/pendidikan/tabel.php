<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">Pendidikan</th>
						<th class="text-white">Disimpan</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr>
							<td><?=$i?></td>
							<td><?=ucwords($row->pendidikan_nama)?></td>
							<td><?=date('d-M-Y H:i:s',strtotime($row->created_at))?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->pendidikan_id,$this->uri->segment(2))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
