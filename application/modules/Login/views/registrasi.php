<div class="card card-primary">
  <div class="card-header"><h4>Register</h4></div>
  <div class="card-body">
    <form method="POST" action="<?=$url.'/prosesregistrasi'?>"  class="needs-validation" novalidate="">
      <div class="form-group">
        <label for="email">Nama</label>
        <input  required  type="text" class="form-control" name="nama" tabindex="1"  autofocus value="<?= set_value('nama'); ?>">
        <div class="invalid-feedback">
          Isikan nama anda
        </div>
      </div>
      <div class="form-group">
        <label for="email">Username</label>
        <input required  type="text" class="form-control" name="username" tabindex="1"  autofocus value="<?= set_value('username'); ?>">
        <div class="invalid-feedback" value="<?= set_value('username'); ?>">
          Isikan username anda
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input required type="text" class="form-control" name="email" tabindex="1"  autofocus value="<?= set_value('email'); ?>">
        <div class="invalid-feedback">
          Isikan email anda
        </div>
      </div>
      <div class="form-group">
        <label for="email">Password</label>
        <input required  type="password" class="form-control" name="password" tabindex="1"  autofocus>
        <div class="invalid-feedback">
          Isikan password anda
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input required type="checkbox" name="agree" class="custom-control-input" id="agree">
          <label class="custom-control-label" for="agree">Saya setuju dengan aturan yang berlaku</label></label>
          <div class="invalid-feedback">
            Silahkan di pilih dulu
          </div>
        </div>
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
  Sudah punya akun ? <a href="<?=site_url('Login')?>">Login</a>
</div>
