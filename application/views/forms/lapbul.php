<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">

<form id="form_lapbul" enctype='multipart/form-data' action="<?= site_url($current['controller']) ?>" method="POST" class="main-form col-sm-12">
  <div class="card card-danger">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <?php foreach ($tabs as $tab) : ?>
          <li class="nav-item">
            <a href="<?= site_url("LaporanBulanan/read/{$tab->lapbul_uuid}") ?>" class="nav-link <?= $tab->is_active ? 'active' : '' ?>" href="#">Bulan Ke-<?= $tab->lapbul_bulan ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="card-body">

      <div class="text-right">
        <?php if ((empty($uuid) && in_array("create_{$current['controller']}", $permission)) || (!empty($uuid) && in_array("update_{$current['controller']}", $permission))) : ?>
          <a data-toggle="modal" data-target="#lapbul_submit_confirm" class="btn btn-success btn-save"><i class="fa fa-save"></i> &nbsp; Save</a>
        <?php endif ?>
        <?php if (!empty($uuid) && in_array("delete_{$current['controller']}", $permission)) : ?>
          <a href="<?= site_url($current['controller'] . "/delete/$uuid") ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp; Delete</a>
        <?php endif ?>
        <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Cancel</a>
      </div>

      <div class="" data-controller="<?= $current['controller'] ?>">
        <div class="form-horizontal form-groups">
          <input type="hidden" name="last_submit" value="<?= $last_submit ?>">
          <input type="hidden" name="progress" value="1">

          <hr>
          <div class="form-group row">
            <div class="col-md-12 text-center">
              <h3><?= $project_name ?></h3>
            </div>
          </div>
          <hr>

          <?php foreach ($form as $index => $field) : ?>

            <?php switch ($field['type']):
              case 'hidden': ?>
                <input class="form-control" type="<?= $field['type'] ?>" value="<?= $field['value'] ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                <?php break; ?>
              <?php
              case 'label': ?>
                <hr>
                <div class="form-group row">
                  <label class="col-sm-12 control-label"><?= $field['label']  ?></label>
                </div>
                <?php break; ?>
              <?php
              default: ?>
                <div class="form-group row" style="background-color: <?= $index % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label style="padding-left: 25px; font-weight: 400" class="col-sm-7 control-label"><?= $field['label']  ?></label>

                  <div class="col-sm-3 text-right">
                    <?php if ($field['upload']): ?>
                    <a class="btn btn-sm btn-success" style="height: 32px;" onclick="uploadDoc('<?= implode("-", array($last_submit, 'LaporanBulanan', $uuid, $field['name'])) ?>.pdf')">Upload</a>
                    <?php endif ?>

                    <?php if ($field['preview']): ?>
                    <a class="btn btn-sm btn-warning" style="height: 32px;" onclick="<?= $field['preview'] ?>" data-toggle="modal" data-target="#pdf_viewer_modal">Preview</a>
                    <?php endif ?>

                    <?php if ($field['delete']): ?>
                    <a class="btn btn-sm btn-danger" style="height: 32px;" onclick="uploadDeletionDoc('<?= implode("-", array($last_submit, 'LaporanBulanan', $uuid, $field['name'], 'delete')) ?>.pdf')">Delete</a>
                    <?php endif ?>
                  </div>

                  <div class="input-group input-group-sm col-sm-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Realisasi</span>
                    </div>
                    <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                  </div>

                </div>
                <?php break; ?>
            <?php endswitch; ?>

          <?php endforeach ?>

        </div>
      </div>

    </div>
  </div>

</form>

<div class="modal fade" id="lapbul_submit_confirm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h4>Apakah Anda Yakin ?</h4>
      </div>
      <div class="modal-footer">
        <a id="submit_form_lapbul" onclick="$('#form_lapbul').submit()" class="btn btn-success">Ya</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

<div id="overlay">
  <h1 class="fa fa-spinner fa-spin text-danger"></h1>
</div>
<style type="text/css">
  #overlay {
    padding: 25% 50%;
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.2);
    z-index: 2;
    cursor: pointer;
  }
</style>