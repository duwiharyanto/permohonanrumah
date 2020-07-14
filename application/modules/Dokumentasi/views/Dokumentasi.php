<div class="row">
  <span id="urldashboard" url="<?=$url.'/getdata'?>"></span>
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Dokumentasi Sistem</h4>
          </div>
          <div class="card-body">
            <p>
              <?=ucwords(DOKUMENTASI)?> <span class="fas fa-fire text-danger"></span>
            </p>
            <a href="javascript:void(0)" onclick="alert('segera dibuat panduannya')" class="btn btn-primary"><span class="fas fa-download"></span> Panduan</a>
          </div>
        </div>
        <h5>Pengambangan</h5><hr />
        <?php foreach($activity AS $row):?>
          <div class="activities">
            <div class="activity">
              <div class="activity-icon text-white shadow-primary <?=$row->activity_status?>">
                <i class="<?=$row->activity_ikon?>"></i>
              </div>
              <div class="activity-detail">
                <div class="mb-2">
                  <span class="text-job text-primary"><?=date('d-m-Y H:i:s',strtotime($row->created_at))?></span>
                  <span class="bullet"></span>
                  <a class="text-job" href="#">View</a>
                </div>
                <p><?=ucwords($row->activity_nama)?></p>
              </div>
            </div>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</div>
