<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">
<form enctype='multipart/form-data' action="<?= site_url($current['controller']) ?>" method="POST" class="main-form col-sm-12">
  <div class="card card-danger card-outline">
    <div class="card-header text-right">
      <?php if ($show_download_button): ?>
      <a class="btn btn-danger" href="<?= site_url("HSE/download/{$uuid}") ?>">
        <i class="fa fa-download"></i> &nbsp;
        Download HSE Plan
      </a>
      <?php endif ?>
      <?php if ((empty($uuid) && in_array("create_{$current['controller']}", $permission)) || (!empty($uuid) && in_array("update_{$current['controller']}", $permission))) : ?>
        <button class="btn btn-success btn-save"><i class="fa fa-save"></i> &nbsp; Save</button>
      <?php endif ?>
      <?php if (!empty($uuid) && in_array("delete_{$current['controller']}", $permission)) : ?>
        <a href="<?= site_url($current['controller'] . "/delete/$uuid") ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp; Delete</a>
      <?php endif ?>
      <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Cancel</a>
    </div>
    <div class="card-body">

      <div class="" data-controller="<?= $current['controller'] ?>">
        <div class="form-horizontal form-groups">
          <input type="hidden" name="last_submit" value="<?= $last_submit ?>">

          <div class="form-group row">
            <div class="col-md-12 text-center">
              <h3><?= $project_name ?></h3>
            </div>
          </div>

          <?php $oddEven = 0 ?>
          <?php foreach ($form as $index => $field) : ?>

            <?php switch ($field['type']):
              case 'hidden': ?>
                <input class="form-control" type="<?= $field['type'] ?>" value="<?= $field['value'] ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                <?php break; ?>
              <?php
              case 'select': ?>
                <?php $oddEven++ ?>
                <div class="form-group row" style="background-color: <?= $oddEven % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label class="col-sm-9 control-label" style="padding-left: 25px; font-weight: 400"><?= $field['label']  ?></label>
                  <div class="col-sm-3 text-right">

                    <?php if ($field['upload']): ?>
                    <a class="btn btn-sm btn-success" style="height: 32px;" onclick="uploadDoc('<?= implode("-", array($last_submit, 'HSE', $uuid, $field['name'])) ?>.pdf')">Upload</a> &nbsp;
                    <?php endif ?>

                    <?php if ($field['preview']): ?>
                    <a class="btn btn-sm btn-warning" style="height: 32px;" onclick="<?= $field['preview'] ?>" data-toggle="modal" data-target="#pdf_viewer_modal">Preview</a> &nbsp;
                    <?php endif ?>

                    <?php if ($field['delete']): ?>
                    <a class="btn btn-sm btn-danger" style="height: 32px;" onclick="uploadDeletionDoc('<?= implode("-", array($last_submit, 'HSE', $uuid, $field['name'], 'delete')) ?>.pdf')">Delete</a>
                    <?php endif ?>

                  </div>
                </div>
                <?php break; ?>
              <?php
              case 'label': ?>
                <hr>
                <?php $oddEven++ ?>
                <div class="form-group row" style="background-color: <?= $oddEven % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label class="col-sm-12 control-label"><?= $field['label']  ?></label>
                </div>
                <?php break; ?>
            <?php endswitch; ?>

          <?php endforeach ?>

        </div>
      </div>

    </div>
  </div>

</form>

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