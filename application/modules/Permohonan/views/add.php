<div class="row">
  <div class="col-sm-12">
    <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/add')?>" >
      <div class="form-group">
        <label>Pemohon</label>
        <?php if($this->user_level!=1 AND $this->user_level!=2):?>
          <select class="form-control select2" name="permohonan_pemohonid">
            <?php foreach($pemohon AS $row):?>
              <?php if($this->session->userdata('user_id')==$row->pemohon_id):?>
              <option value="<?=$row->pemohon_id?>"><?=ucwords($row->pemohon_nama)?></option>
              <?php endif;?>
            <?php endforeach;?>
          </select>
        <?php else:?>
          <select class="form-control select2" name="permohonan_pemohonid">
            <?php foreach($pemohon AS $row):?>
              <option value="<?=$row->pemohon_id?>"><?=ucwords($row->pemohon_nama)?></option>
            <?php endforeach;?>
          </select>
        <?php endif;?>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Kepemilikan Tanah</label>
        <select class="form-control select2" name="permohonan_kepemilikantanahid">
          <?php foreach($kepemilikantanah AS $row):?>
            <option value="<?=$row->kepemilikantanah_id?>"><?=ucwords($row->kepemilikantanah_keterangan)?></option>
          <?php endforeach;?>
        </select>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Kepemilikan Rumah</label>
        <select class="form-control select2" name="permohonan_kepemilikanrumahid">
          <?php foreach($kepemilikanrumah AS $row):?>
            <option value="<?=$row->kepemilikanrumah_id?>"><?=ucwords($row->kepemilikanrumah_keterangan)?></option>
          <?php endforeach;?>
        </select>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label class="d-block">Asset Rumah di Tempat Lain</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio1" name="permohonan_asetrumah" value="1">
          <label class="form-check-label" for="inlineradio1">Ada</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio2" name="permohonan_asetrumah" value="">
          <label class="form-check-label" for="inlineradio2">Tdak Ada</label>
        </div>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label class="d-block">Asset Tanah di Tempat Lain</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio1" name="permohonan_asettanah" value="1">
          <label class="form-check-label" for="inlineradio1">Ada</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio2" name="permohonan_asettanah" value="">
          <label class="form-check-label" for="inlineradio2">Tdak Ada</label>
        </div>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label class="d-block">Pernah Mendapatkan Bantuan Perumahan</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio1" name="permohonan_bantuansebelumnya" value="1">
          <label class="form-check-label" for="inlineradio1">Ya, Lebih dari 10 tahun yang lalu</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio2" name="permohonan_bantuansebelumnya" value="2">
          <label class="form-check-label" for="inlineradio2">Ya, Lebih dari 10 tahun yang lalu</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineradio2" name="permohonan_bantuansebelumnya" value="0">
          <label class="form-check-label" for="inlineradio2">Belum Pernah</label>
        </div>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Kawasan</label>
        <select class="form-control select2" name="permohonan_kawasanrumahid">
          <?php foreach($kawasan AS $row):?>
            <option value="<?=$row->kawasan_id?>"><?=ucwords($row->kawasan_keterangan)?></option>
          <?php endforeach;?>
        </select>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Foto Rumah</label>
        <input required type="file" name="permohonan_fotorumah" class="form-control" />
        <p class="text-muted">
          Upload berkas max 2mb, format jpg
        </p>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </form>
  </div>
</div>
