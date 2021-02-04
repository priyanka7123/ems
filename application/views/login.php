<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
	<div class="container mt-5">
		<div class="row ">
			<div class="col-lg-4 mx-auto">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
						<p>Admin login</p>
						<h3>log in here</h3>
						<h5><?= $this->session->flashdata('alert'); ?></h5>
						<form action="<?= base_url('auth/login_function'); ?>" method="post">
							<div class="mb-3">
								<label>user_name</label>
								<input type="text" name="username" id="user_name" class="form-control" id="user_name">
							</div>
							<div class="mb-3">
								<label>password</label>
								<input type="password" name="password" class="form-control" id="user_name">
							</div>
							<div class="mb-3">

								<input type="submit" class="btn btn-success btn-block me-auto">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
