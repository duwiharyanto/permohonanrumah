<div class="card card-primary">
    <div class="card-header"><h4>Register</h4></div>
    <div class="card-body">
        <form method="POST" action="<?=$url.'/prosesregistrasi'?>"  class="needs-validation" novalidate="">
            <div class="form-group">
              <label>Nomor NIK/KTP</label>
                <input required type="text" class="form-control" name="pemohon_nik">
                <p class="text-muted">
                  Digunakan untuk login sbg username
                </p>
                <?=validationmsg('required')?>
            </div>
            <div class="form-group">
              <label>Nama</label>
                <input required type="text" class="form-control" name="pemohon_nama">
                <?=validationmsg('required')?>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
                <input required type="text" class="form-control datepicker" name="pemohon_tgllahir">
                <p class="text-muted">
                  Digunakan untuk login sbg password
                </p>
                <?=validationmsg('required')?>
            </div>
            <div class="form-group">
              <label>Nomor Telepon</label>
                <input required type="text" class="form-control" name="pemohon_notlp">
                <?=validationmsg('required')?>
            </div>
            <div class="form-group">
              <label>Pendidikan</label>
              <select class="form-control select2" name="pemohon_pendidikanid">
                <?php foreach($pendidikan AS $row):?>
                  <option value="<?=$row->pendidikan_id?>"><?=ucwords($row->pendidikan_nama)?></option>
                <?php endforeach;?>
              </select>
                <?=validationmsg('required')?>
            </div>
            <div class="form-group">
              <label class="d-block">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineradio1" name="pemohon_jeniskelamin" value="1">
                <label class="form-check-label" for="inlineradio1">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineradio2" name="pemohon_jeniskelamin" value="0">
                <label class="form-check-label" for="inlineradio2">Perempuan</label>
              </div>
              <?=validationmsg('required')?>
            </div>
            <div class="form-group">
              <label>Pekerjaan</label>
              <select class="form-control select2" name="pemohon_pekerjaanid">
                <?php foreach($pekerjaan AS $row):?>
                  <option value="<?=$row->pekerjaan_id?>"><?=ucwords($row->pekerjaan_nama)?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
                <textarea class="form-control" name="pemohon_alamat" rows="6"></textarea>
                <?=validationmsg('required')?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</div>
<div class="mt-5 text-muted text-center">
    Sudah punya akun ? <a href="<?=site_url('Login/Loginpemohon')?>">Login</a>
</div>
<script>
    $(document).ready(function(){
        $(".select2").select2();
        $('.datepicker').daterangepicker({
          locale: {format: 'DD-MM-YYYY'},
          singleDatePicker: true,
        });
    })
</script>
