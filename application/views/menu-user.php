<?php foreach ($menu as $m) : ?>
    <?php if (in_array($m->url, array('Admin', 'HSSE', 'MPS', 'Vendor'))): ?>

	<div class="col-sm-2">
		<a href="<?= site_url($m->url) ?>">
			<div class="info-box">
				<span class="info-box-icon bg-danger"><i class="fas fa-<?= $m->icon ?>"></i></span>
				<div class="info-box-content">
					<span class="info-box-text" style="color:black"><?= $m->name ?></span>
					<span class="info-box-number"></span>
				</div>
			</div>
		</a>
	</div>

    <?php endif ?>
<?php endforeach; ?>