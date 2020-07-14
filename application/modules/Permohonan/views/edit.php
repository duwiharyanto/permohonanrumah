<div id="loadtabels">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                Pastikan nama pemohon sudah benar sebelum mengupdate aproval
            </div>
            <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
                <div class="form-group d-none">
                    <label>Id User</label>
                    <input required readonly type="text" class="form-control" value="<?=$data->permohonan_id?>" name="id">
                    <?=validationmsg('required')?>
                </div>
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
                                <option value="<?=$row->pemohon_id?>" <?=$data->permohonan_pemohonid==$row->pemohon_id ? 'selected':''?>><?=ucwords($row->pemohon_nama)?></option>
                            <?php endforeach;?>
                        </select>
                        <p class="text-secondary">
                            Pastikan nama pemohon sudah benar sebelum mengupdate aproval
                        </p>
                    <?php endif;?>
                    <?=validationmsg('required')?>
                </div>
                <div class="form-group">
                    <label>Kepemilikan Tanah</label>
                    <select class="form-control select2" name="permohonan_kepemilikantanahid">
                        <?php foreach($kepemilikantanah AS $row):?>
                            <option value="<?=$row->kepemilikantanah_id?>" <?=$row->kepemilikantanah_id==$data->permohonan_kepemilikantanahid ? 'selected':''?>><?=ucwords($row->kepemilikantanah_keterangan)?></option>
                        <?php endforeach;?>
                    </select>
                    <?=validationmsg('required')?>
                </div>
                <div class="form-group">
                    <label>Kepemilikan Rumah</label>
                    <select class="form-control select2" name="permohonan_kepemilikanrumahid">
                        <?php foreach($kepemilikanrumah AS $row):?>
                            <option value="<?=$row->kepemilikanrumah_id?>" <?=$row->kepemilikanrumah_id==$data->permohonan_kepemilikanrumahid ? 'selected':''?>><?=ucwords($row->kepemilikanrumah_keterangan)?></option>
                        <?php endforeach;?>
                    </select>
                    <?=validationmsg('required')?>
                </div>
                <div class="form-group">
                    <label class="d-block">Asset Rumah di Tempat Lain</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_asetrumah1" name="permohonan_asetrumah" value="1" <?=$data->permohonan_asetrumah==1 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_asetrumah1">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_asetrumah2" name="permohonan_asetrumah" value="" <?=$data->permohonan_asetrumah==0 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_asetrumah2">Tdak Ada</label>
                    </div>
                    <?=validationmsg('required')?>
                </div>
                <div class="form-group">
                    <label class="d-block">Asset Tanah di Tempat Lain</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_asettanah1" name="permohonan_asettanah" value="1" <?=$data->permohonan_asettanah==1 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_asettanah1">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_asettanah2" name="permohonan_asettanah" value="" <?=$data->permohonan_asettanah==0 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_asettanah2">Tdak Ada</label>
                    </div>
                    <?=validationmsg('required')?>
                </div>
                <div class="form-group">
                    <label class="d-block">Pernah Mendapatkan Bantuan Perumahan</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_bantuansebelumnya1" name="permohonan_bantuansebelumnya" value="1" <?=$data->permohonan_bantuansebelumnya==1 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_bantuansebelumnya1">Ya, Lebih dari 10 tahun yang lalu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_bantuansebelumnya2" name="permohonan_bantuansebelumnya" value="2" <?=$data->permohonan_bantuansebelumnya==2 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_bantuansebelumnya2">Ya, Lebih dari 10 tahun yang lalu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="permohonan_bantuansebelumnya3" name="permohonan_bantuansebelumnya" value="" <?=$data->permohonan_bantuansebelumnya==0 ? 'checked':''?>>
                        <label class="form-check-label" for="permohonan_bantuansebelumnya3">Belum Pernah</label>
                    </div>
                    <?=validationmsg('required')?>
                </div>
                <div class="form-group">
                    <label>Kawasan</label>
                    <select class="form-control select2" name="permohonan_kawasanrumahid">
                        <?php foreach($kawasan AS $row):?>
                            <option value="<?=$row->kawasan_id?>" <?=$row->kawasan_id==$data->permohonan_kawasanrumahid ? 'selected':''?>><?=ucwords($row->kawasan_keterangan)?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <?php if($this->user_level==1 OR $this->user_level==2):?>
                    <div class="form-group">
                        <label class="d-block text-danger"><strong>APPROVAL</strong></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio1" name="permohonan_aproval" value="0" <?=$data->permohonan_aproval==0 ? 'checked':''?>>
                            <label class="form-check-label" for="inlineradio1">Menunggu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio2" name="permohonan_aproval" value="1" <?=$data->permohonan_aproval==1 ? 'checked':''?>>
                            <label class="form-check-label" for="inlineradio2">Disetujui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineradio2" name="permohonan_aproval" value="2" <?=$data->permohonan_aproval==2 ? 'checked':''?>>
                            <label class="form-check-label" for="inlineradio2">Ditolak</label>
                        </div>
                        <?=validationmsg('required')?>
                    </div>
                <?php endif;?>
                <div class="form-group">
                    <label>Catatan<small>(opsional)</small></label>
                    <textarea class="form-control" name="permohonan_catatan" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
