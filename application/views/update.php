<?php foreach ($del as $d) {
} ?>
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
						<a class="nav-link" href="<?= base_url('home/index'); ?>">View</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= base_url('home/logout'); ?>">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row mt-5 ">
			<div class="col-lg-4 mx-auto">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
						<form action="<?= base_url('home/update_data'); ?>" method="POST" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="" class="form-label">name</label>
								<input type="text" class="form-control" id="" name="name" value="<?= $del->name  ?>">
								<input type="hidden" name="id" value="<?= $del->id  ?>">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">address</label>
								<input type="text" class="form-control" id="" name="address" value="<?= $del->address ?>">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">designation</label>
								<input type="text" class="form-control" id="" name="designation" value="<?= $del->designation ?>">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">salary</label>
								<input type="text" class="form-control" id="" name="salary" value="<?= $del->salary ?>">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">image</label>
								<input type="file" class="form-control" id="" name="image" value="">
								<?= form_error('image'); ?>
							</div>


							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</html>
