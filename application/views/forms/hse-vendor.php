<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.css') ?>">
<form enctype='multipart/form-data' action="<?= site_url($current['controller']) ?>" method="POST" class="main-form col-sm-12">
  <div class="card card-danger card-outline">
    <div class="card-header text-right">
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
          <input type="hidden" name="last_submit" value="<?= time() ?>">

          <?php foreach ($form as $index => $field) : ?>

            <?php switch ($field['type']):
              case 'hidden': ?>
                <input class="form-control" type="<?= $field['type'] ?>" value="<?= $field['value'] ?>" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                <?php break; ?>
              <?php
              case 'select': ?>
                <div class="form-group row">
                  <label class="col-sm-3 control-label"><?= $field['label']  ?></label>
                  <div class="col-sm-9">
                    <?php if (preg_match('/(multiple)/', $field['attr']) > 0) : ?>
                      <input type="hidden" name="<?= str_replace('[]', '', $field['name']) ?>">
                    <?php endif ?>
                    <select class="form-control" name="<?= $field['name'] ?>" <?= $field['attr'] ?>>
                      <?php foreach ($field['options'] as $opt) : ?>
                        <option <?= $opt['value'] === $field['value'] || (is_array($field['value']) && in_array($opt['value'], $field['value'])) ? 'selected="selected"' : '' ?> value="<?= $opt['value'] ?>"><?= $opt['text'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
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
                <div class="form-group row">
                  <label class="col-sm-12 control-label"><?= $field['label']  ?></label>
                </div>
                <?php break; ?>
              <?php
              default: ?>
                <div class="form-group row" style="background-color: <?= $index % 2 === 1 ? '#f9f9f9' : '#fff' ?>;">
                  <label style="padding-left: 25px; font-weight: 400" class="col-sm-8 control-label"><?= $field['label']  ?></label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-sm">
                      <?php if ($field['show_upload_button']) : ?>
                        <input class="form-control" type="file" accept="application/pdf" onchange="uploadDoc('<?= $field['upload_url'] ?>');" style="font-size:.71rem">
                      <?php endif ?>
                      <?php if ($field['show_preview_button']) : ?>
                        <div class="input-group-append">
                          <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pdf_viewer_modal" onclick="<?= $field['onclick'] ?>">
                            <i class="fa fa-file-pdf"></i>&nbsp;
                            Preview
                          </a>
                        </div>
                      <?php endif ?>
                      <?php if ($field['show_score']) : ?>
                        <div class="input-group-append">
                          <a class="btn btn-sm btn-secondary">
                            <i class="fa fa-check"></i>&nbsp;
                            Score <?= $field['value'] ?>
                          </a>
                        </div>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
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