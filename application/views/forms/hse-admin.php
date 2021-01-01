<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">

<form id="form_hse" enctype='multipart/form-data' action="<?= site_url($current['controller']) ?>" method="POST" class="main-form col-sm-12">
  <input type="hidden" name="progress" value="1">
  <div class="card card-danger">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <?php foreach ($tabs as $tab) : ?>
          <a href="<?= site_url("HSE/read/{$tab->uuid}") ?>" class="nav-item nav-link <?= $tab->is_active ?>"><?= $tab->vendor ?></a>
        <?php endforeach ?>
      </ul>
    </div>
    <div class="card-body">

      <div class="text-right">
        <input type="checkbox" name="download-button" class="download-button" style="display: none;">
        <a class="btn btn-danger" onclick="document.querySelector('.download-button').click()" data-toggle="modal" data-target="#hse_submit_confirm">
          <i class="fa fa-download"></i> &nbsp;
          Save & Download
        </a>
        <input type="checkbox" name="sendmail-button" class="sendmail-button" style="display: none;">
        <a class="btn btn-info" onclick="document.querySelector('.sendmail-button').click()" data-toggle="modal" data-target="#hse_submit_confirm">
          <i class="fa fa-paper-plane"></i> &nbsp;
          Save & Email
        </a>
        <?php if ((empty($uuid) && in_array("create_{$current['controller']}", $permission)) || (!empty($uuid) && in_array("update_{$current['controller']}", $permission))) : ?>
          <a class="btn btn-success btn-save" data-toggle="modal" data-target="#hse_submit_confirm"><i class="fa fa-save"></i> &nbsp; Save Only</a>
        <?php endif ?>
        <?php if (!empty($uuid) && in_array("delete_{$current['controller']}", $permission)) : ?>
          <a href="<?= site_url($current['controller'] . "/delete/$uuid") ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp; Delete</a>
        <?php endif ?>
        <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
      </div>

      <div class="" data-controller="<?= $current['controller'] ?>">
        <div class="form-horizontal form-groups">
          <input type="hidden" name="last_submit" value="<?= time() ?>">

          <hr>
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
              case 'label': ?>
                <hr>
                <?php $oddEven++ ?>
                <div class="form-group row" style="background-color: <?= $oddEven % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label class="col-sm-12 control-label"><?= $field['label']  ?></label>
                </div>
                <?php break; ?>
              <?php case 'select': ?>
                <?php $oddEven++ ?>
                <div class="form-group row" style="background-color: <?= $oddEven % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label class="col-sm-9 control-label" style="padding-left: 25px; font-weight: 400"><?= $field['label']  ?></label>

                  <div class="col-sm-1">
                    <?php if ($field['preview']): ?>
                      <a class="btn btn-warning" onclick="<?= $field['preview'] ?>" data-toggle="modal" data-target="#pdf_viewer_modal">Preview</a> &nbsp;
                    <?php endif ?>
                  </div>

                  <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Score</span>
                      </div>
                      <select class="form-control" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                        <?php foreach ($field['options'] as $opt) : ?>
                          <option <?= $opt['value'] === $field['value'] || (is_array($field['value']) && in_array($opt['value'], $field['value'])) ? 'selected="selected"' : '' ?> value="<?= $opt['value'] ?>"><?= $opt['text'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                </div>
                <?php break; ?>
              <?php default: ?>
                <?php break; ?>
            <?php endswitch; ?>

          <?php endforeach ?>

        </div>
      </div>

    </div>
  </div>

</form>

<div class="modal fade" id="hse_submit_confirm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        &nbsp;
      </div>
      <div class="modal-body text-center">
        <h4>Apakah Anda Yakin ?</h4>
      </div>
      <div class="modal-footer">
        <a id="submit_form_hse" onclick="$('#form_hse').submit()" class="btn btn-success">Ya</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('.download-button, .sendmail-button').prop('checked', false)">Tidak</button>
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