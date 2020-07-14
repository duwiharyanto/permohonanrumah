<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group d-none">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->pekerjaan_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Pekerjaan</label>
            <input required type="text" class="form-control" name="pekerjaan_nama"  value="<?=$data->pekerjaan_nama?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
