<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">
<style type="text/css">
  .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
    height: 32px;
    padding: 3px 12px;
    font-size: .875rem;
  }
  .select2-container--default .select2-results__option {
    font-size: .875rem;
  }
</style>
<form id="form_wip" enctype='multipart/form-data' action="<?= site_url($current['controller']) ?>" method="POST" class="main-form col-sm-12">
  <div class="card card-danger card-outline">
    <div class="card-header text-right">
      <a class="btn btn-danger" href="<?= site_url("WIP/download/{$uuid}") ?>">
        <i class="fa fa-download"></i> &nbsp;
        Report HSE Work Practice
      </a>
      <a class="btn btn-info" href="<?= site_url("WIP/download/{$uuid}") ?>">
        <i class="fa fa-download"></i> &nbsp;
        Report HSE Program
      </a>
      <?php if ((empty($uuid) && in_array("create_{$current['controller']}", $permission)) || (!empty($uuid) && in_array("update_{$current['controller']}", $permission))) : ?>
        <a class="btn btn-success btn-save" data-toggle="modal" data-target="#wip_submit_confirm"><i class="fa fa-save"></i> &nbsp; Submit</a>
      <?php endif ?>
      <?php if (!empty($uuid) && in_array("delete_{$current['controller']}", $permission)) : ?>
        <a href="<?= site_url($current['controller'] . "/delete/$uuid") ?>" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp; Delete</a>
      <?php endif ?>
      <a href="<?= site_url($current['controller']) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> &nbsp; Cancel</a>
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
                <?php if (strpos($field['name'], '_isneed') > -1) : ?>
                  <div class="form-group row" style="background-color: <?= $index % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                    <label style="padding-left: 25px; font-weight: 400" class="col-sm-3 control-label"><?= $field['label']  ?></label>
                    <div class="col-sm-2">
                      <select class="form-control" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                        <?php foreach ($field['options'] as $opt) : ?>
                          <option <?= $opt['value'] === $field['value'] || (is_array($field['value']) && in_array($opt['value'], $field['value'])) ? 'selected="selected"' : '' ?> value="<?= $opt['value'] ?>"><?= $opt['text'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  <?php endif ?>
                  <?php if (strpos($field['name'], '_score') > -1) : ?>
                    <div class="col-sm-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><?= $field['label'] ?></span>
                        </div>
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                  <?php endif ?>
                  <?php if (strpos($field['name'], '_note') > -1) : ?>
                    <div class="col-sm-3">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Note</span>
                        </div>
                        <input class="form-control" type="<?= $field['type'] ?>" value="<?= htmlentities($field['value']) ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                <?php break; ?>
            <?php endswitch; ?>

          <?php endforeach ?>

        </div>
      </div>

    </div>
  </div>

  <?php if (count($subform) > 0) : foreach ($subform as $subfield) : ?>
      <div class="card card-danger card-outline">
        <div class="card-body">
          <fieldset class="form-child" data-controller="<?= $subfield['controller'] ?>" data-uuids="<?= str_replace('"', "'", json_encode($subfield['uuids'])) ?>">
            <legend><?= $subfield['label'] ?></legend>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-12">
                <?php if ((empty($subfield->uuids) && in_array("create_{$subfield['controller']}", $permission)) || (!empty($subfield->uuids) && in_array("update_{$subfield['controller']}", $permission))) : ?>

                  <a class="btn btn-info btn-add">
                    <i class="fa fa-plus"></i> &nbsp;Input <?= $subfield['label'] ?>
                  </a>

                <?php endif ?>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
  <?php endforeach;
  endif; ?>

</form>

<div class="modal fade" id="wip_submit_confirm" tabindex="-1" role="dialog" aria-hidden="true">
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
        <a id="submit_form_wip" onclick="$('#form_wip').submit()" class="btn btn-success">Ya</a>
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