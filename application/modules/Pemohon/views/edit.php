<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group d-none">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->pemohon_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
            <label>NIK</label>
            <input required type="text" class="form-control" name="pemohon_nik" value="<?= ucwords($data->pemohon_nik)?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Nama</label>
            <input required type="text" class="form-control" name="pemohon_nama" value="<?= ucwords($data->pemohon_nama)?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
            <input required type="text" class="form-control datepicker" name="pemohon_tgllahir" value="<?= date('d-m-Y',strtotime($data->pemohon_tgllahir))?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Nomor Telepon</label>
            <input required type="text" class="form-control" name="pemohon_notlp" value="<?= ucwords($data->pemohon_notlp)?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Pendidikan</label>
          <select class="form-control select2" name="pemohon_pendidikanid">
            <?php foreach($pendidikan AS $row):?>
              <option value="<?=$row->pendidikan_id?>" <?=$data->pemohon_pendidikanid==$row->pendidikan_id ? 'selected':''?>><?=ucwords($row->pendidikan_nama)?></option>
            <?php endforeach;?>
          </select>
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label class="d-block">Jenis Kelamin</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineradio1" name="pemohon_jeniskelamin" value="1" <?=$data->pemohon_jeniskelamin==1 ? 'checked':''?>>
            <label class="form-check-label" for="inlineradio1">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineradio2" name="pemohon_jeniskelamin" value="0" <?=$data->pemohon_jeniskelamin==0 ? 'checked':''?>>
            <label class="form-check-label" for="inlineradio2">Perempuan</label>
          </div>
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Pekerjaan</label>
          <select class="form-control select2" name="pemohon_pekerjaanid">
            <?php foreach($pekerjaan AS $row):?>
              <option value="<?=$row->pekerjaan_id?>" <?=$data->pemohon_pekerjaanid==$row->pekerjaan_id ? 'selected':''?>><?=ucwords($row->pekerjaan_nama)?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label>Alamat</label>
            <textarea class="form-control" name="pemohon_alamat" rows="6"><?=ucwords($data->pemohon_alamat)?></textarea>
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
