<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $this->uri->segment(1) ? ucwords($this->uri->segment(1)):'Home'?> &mdash; <?=$setting[
    'sistem']?></title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>favicon.ico">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/components.css">


  <!-- General JS Scripts -->
  <script src="<?=base_url()?>assets/modules/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/modules/popper.js"></script>
  <script src="<?=base_url()?>assets/modules/tooltip.js"></script>
  <script src="<?=base_url()?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?=base_url()?>assets/modules/moment.min.js"></script>
  <script src="<?=base_url()?>assets/js/stisla.js"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?=base_url()?>assets/img/rlthsleman.jpeg" alt="logo" width="100" class="shadow-light">
              <h5 class="mt-3"><?=$setting['getsistem']->setting_tagline?></h5>
            </div>
            <?php if($msg=$this->session->flashdata('success')):?>
              <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                  <div class="alert-title">Perhatian !!</div>
                  <?= ucwords($msg)?>, <a href="<?=site_url()?>">Login</a>
                </div>
              </div>
            <?php endif;?>
            <?php if($msg=$this->session->flashdata('error')):?>
              <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                  <div class="alert-title">Perhatian !!</div>
                  <?= ucwords($msg)?>
                </div>
              </div>
            <?php endif;?>
            <div id="kontainderform">
              <?php print_r($konten)?>
            </div>
            <div class="simple-footer">
              <?=FOOTPRINT?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>assets/js/scripts.js"></script>
  <script src="<?=base_url()?>assets/js/custom.js"></script>
</body>
</html>
