<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group d-none">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->pendidikan_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Pendidikan</label>
            <input required type="text" class="form-control" name="pendidikan_nama" value="<?=$data->pendidikan_nama?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
