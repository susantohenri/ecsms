<style type="text/css">
	ul.pagination li a {
		cursor: pointer;
	}
	ul.pagination li a.active {
		background-color: rgba(0,0,0,.03);
	}
	.border-info {
		border: 1px solid #17a2b8;
		background-color: #fff;
	}
	.border-warning {
		border: 1px solid #ffc107;
		background-color: #fff;
	}
	.border-default {
		border: 1px solid #007bff;
		background-color: #fff;
	}
	.border-secondary {
		border: 1px solid #6c757d;
		background-color: #fff;
	}
	.border-teal {
		border: 1px solid #20c997;
		background-color: #fff;
	}
	.border-danger {
		border: 1px solid #dc3545;
		background-color: #fff;
	}
</style>

<?php foreach ($menu as $m) : ?>

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

<?php endforeach; ?>

<div class="col-sm-12">
	<div class="card card-danger card-outline">
		<div class="card-header">
			<a href="<?= site_url('Project/create') ?>" class="btn btn-danger btn-sm">
				<i class="fa fa-plus"></i>
				Add New Project
			</a>

			<div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

					<div class="input-group-append">
						<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table project">
				<thead>
					<tr>
						<th>#</th>
						<th width="25%">Project</th>
						<th>
							<div class="row text-center">
								<div class="col-sm-2 bg-info">HSE PLAN</div>
								<div class="col-sm-2 bg-warning">PJA</div>
								<div class="col-sm-2" style="background-color: #007bff;">LAP BUL</div>
								<div class="col-sm-2 bg-secondary">WIP</div>
								<div class="col-sm-2 bg-teal">KPI</div>
								<div class="col-sm-2 bg-danger">FE</div>
							</div>
						</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			<div class="card-tools">
				<ul class="pagination pagination-md float-right">
					<li class="page-item"><a class="page-link text-danger active">1</a></li>
				</ul>
			</div>
		</div>
		<div class="overlay" id="table_spinner">
			<h2 class="fa fa-spinner fa-spin"></h2>
		</div>
	</div>
</div>