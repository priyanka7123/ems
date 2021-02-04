<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee management system</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<a class="navbar-brand" href="#">Employee management system</a>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('home/insert'); ?>">Add New</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= base_url('home/logout'); ?>">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<?= $this->session->flashdata('msg'); ?>
		<?= $this->session->flashdata('msgs'); ?>
		<?= $this->session->flashdata('msgss'); ?>
		<table class="table">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Address</th>
				<th>Designation</th>
				<th>Salary</th>
				<th>picture</th>
				<th>action</th>
			</tr>
			<?php foreach ($views as $view) : ?>
				<tr>
					<td><?= $view->id; ?></td>
					<td><?= $view->name; ?></td>
					<td><?= $view->address; ?></td>
					<td><?= $view->designation; ?></td>
					<td><?= $view->salary; ?></td>
					<td>
						<?php if ($view->picture == "") { ?>
							<p>No image</p>
						<?php } else { ?>
							<img class="img-fluid" style="width:100px" src="<?= base_url() . "assets/" . $view->picture; ?>">
						<?php } ?>
					</td>
					<td>
						<a href="<?= base_url('home/delete_data/' . $view->id); ?>" class="btn btn-danger">Delete</a>
						<a href="<?= base_url('home/update/' . $view->id); ?>" class="btn btn-primary">Edit</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
