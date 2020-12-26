<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">
<form id="form_kpi" enctype='multipart/form-data' action="<?= site_url($current['controller']) ?>" method="POST" class="main-form col-sm-12">
  <div class="card card-danger card-outline">
  <div class="card-header text-right">

      <?php if ($download_label): ?>
      <input type="checkbox" name="download-button" class="download-button" style="display: none;">
      <a class="btn btn-danger" onclick="document.querySelector('.download-button').click()" data-toggle="modal" data-target="#kpi_submit_confirm">
        <i class="fa fa-download"></i> &nbsp;
        <?= $download_label ?>
      </a>
      <?php endif ?>

      <?php if ($sendmail_label): ?>
      <input type="checkbox" name="sendmail-button" class="sendmail-button" style="display: none;">
      <a class="btn btn-info" onclick="document.querySelector('.sendmail-button').click()" data-toggle="modal" data-target="#kpi_submit_confirm">
        <i class="fa fa-paper-plane"></i> &nbsp;
        Save & Email
      </a>
      <?php endif ?>

      <?php if ((empty($uuid) && in_array("create_{$current['controller']}", $permission)) || (!empty($uuid) && in_array("update_{$current['controller']}", $permission))) : ?>
        <a class="btn btn-success btn-save" data-toggle="modal" data-target="#kpi_submit_confirm"><i class="fa fa-save"></i> &nbsp; Save Only</a>
      <?php endif ?>
      <?php if (!empty($uuid) && in_array("delete_{$current['controller']}", $permission)) : ?>
        <a href="<?= site_url($current['controller'] . "/delete/$uuid") ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp; Delete</a>
      <?php endif ?>
      <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Back</a>
    </div>
    <div class="card-body">

      <div class="" data-controller="<?= $current['controller'] ?>">
        <div class="form-horizontal form-groups">
          <input type="hidden" name="last_submit" value="<?= time() ?>">
          <input type="hidden" name="progress" value="1">

          <div class="form-group row">
            <div class="col-md-12 text-center">
              <h3><?= $project_name ?></h3>
            </div>
          </div>

          <?php foreach ($form as $index => $field) : ?>

            <?php switch ($field['type']):
              case 'hidden': ?>
                <input class="form-control" type="<?= $field['type'] ?>" value="<?= $field['value'] ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                <?php break; ?>
              <?php
              case 'textarea': ?>
                <div class="form-group row">
                  <label class="col-sm-3 control-label"><?= $field['label']  ?></label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="<?= $field['name'] ?>" <?= $field['attr'] ?>><?= $field['value'] ?></textarea>
                  </div>
                </div>
                <?php break; ?>
              <?php
              case 'label': ?>
                <hr>
                <div class="form-group row" style="background-color: <?= $index % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label class="col-sm-12 control-label"><?= $field['label']  ?></label>
                </div>
                <?php break; ?>
              <?php
              default: ?>
                <?php if (strpos($field['name'], '_target') > -1) : ?>
                  <div class="form-group row" style="background-color: <?= $index % 4 !== 0 ? '#f9f9f9' : '#fff' ?>;">
                    <label style="padding-left: 25px; font-weight: 400" class="col-sm-3 control-label"><?= $field['label']  ?></label>
                    <div class="col-sm-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Target</span>
                        </div>
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                  <?php endif ?>
                  <?php if (strpos($field['name'], '_actual') > -1 && strpos($field['name'], '_score') < 1) : ?>
                    <div class="col-sm-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Actual</span>
                        </div>
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                  <?php endif ?>
                  <?php if (strpos($field['name'], '_score_max') > -1) : ?>
                    <div class="col-sm-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Score Max</span>
                        </div>
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                  <?php endif ?>
                  <?php if (strpos($field['name'], '_score_actual') > -1) : ?>
                    <?php if (!strpos($field['attr'], 'data-nonscoring="true"')) : ?>
                    <div class="col-sm-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Score Actual</span>
                        </div>
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                    <?php endif ?>
                  <!-- </div> -->
                <?php endif ?>
                <?php if (strpos($field['name'], '_doc') > -1) : ?>

                  <?php if ($field['show_as_single_btn']): ?>
                      <?php if ($field['show_preview_btn']): ?>
                        <a class="col-sm-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#pdf_viewer_modal" onclick="<?= $field['preview_onclick'] ?>" ><i class="fa fa-file-pdf"></i>&nbsp; preview</a>
                      <?php endif ?>
                    <?php else: ?>
                      <div class="dropdown col-sm-1">
                        <button class="btn btn-sm btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-pdf"></i>&nbsp; doc</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <?php if ($field['show_upload_btn']): ?>
                            <a class="dropdown-item" onclick="$('#<?= $field['name'] ?>').click()"><i class="fa fa-upload"></i>&nbsp; Upload</a>
                            <input type="hidden" name="<?= $field['name'] ?>" value="<?= $field['value'] ?>">
                          <?php endif ?>
                          <?php if ($field['show_preview_btn']): ?>
                            <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>&nbsp; Preview</a>
                          <?php endif ?>
                          <?php if ($field['show_delete_btn']): ?>
                            <a class="dropdown-item" href="#"><i class="fa fa-trash"></i>&nbsp; Delete</a>
                          <?php endif ?>
                        </div>
                      </div>
                    <?php endif ?>
                  </div>
                <?php endif ?>

                <?php break; ?>
            <?php endswitch; ?>

          <?php endforeach ?>

        </div>
      </div>

    </div>
  </div>

</form>

<div class="modal fade" id="kpi_submit_confirm" tabindex="-1" role="dialog" aria-hidden="true">
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
        <a id="submit_form_kpi" onclick="$('#form_kpi').submit()" class="btn btn-success">Ya</a>
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