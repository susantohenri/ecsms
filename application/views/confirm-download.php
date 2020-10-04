<div class="col-sm-12">
  <div class="card card-danger card-outline">
    <div class="card-body">

      <div class="text-center">
        <h1>Are you sure to download ?</h1>
        <a class="btn btn-danger" onclick="window.open('<?= site_url($current['controller'] . '/download/' . $uuid) ?>','_blank'); window.location = '<?= base_url() ?>'"><i class="fa fa-download"></i> &nbsp; Yes</a>
        <a href="<?= base_url() ?>" class="btn btn-info"><i class="fa fa-home"></i> &nbsp; No</a>
      </div>

    </div>
  </div><!-- /.card -->
</div>