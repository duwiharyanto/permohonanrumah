<div class="card card-primary">
  <div class="card-body">
    <form method="POST" action="<?=$url.'/prosesauth'?>" class="needs-validation" novalidate="">
      <div class="form-group">
        <label for="email">NIK</label>
        <input required id="username" type="text" class="form-control" name="username" tabindex="1"  autofocus value="<?= set_value('username'); ?>" placeholder="NIK">
        <div class="invalid-feedback">
          Please fill in your username
        </div>
      </div>

      <div class="form-group">
        <div class="d-block">
          <label for="password" class="control-label">Password</label>
          <div class="float-right">
            <a href="javascript:void(0)" class="text-small">
              Forgot Password?
            </a>
          </div>
        </div>
        <input required id="password" type="text" class="form-control datepicker" name="password" tabindex="2" placeholder="Tanggal Lahir">
        <div class="invalid-feedback">
          please fill in your password
        </div>
      </div>

      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
          <label class="custom-control-label" for="remember-me">Remember Me</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
<div class="mt-5 text-muted text-center">
  <?php if($open_registrasi):?>
    Belum punya akun ? <a href="<?=site_url('Login/Loginpemohon/register')?>">Buat</a>
  <?php endif;?>
</div>
<?php if($testing):?>
  <div id="notif" url="<?=$url.'/notif'?>"></div>
<?php endif;?>

<script type="text/javascript">
  $(document).ready(function(){
    var url=$('#notif').attr('url');
    $.getJSON(url, function(result){
      $('#notif').html(result.view)
      console.log(result.view);
    })
    $('.datepicker').daterangepicker({
      locale: {format: 'DD-MM-YYYY'},
      singleDatePicker: true,
    });
  })
</script>
