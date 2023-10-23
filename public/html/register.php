<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	
	<title><?php echo $company_name; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
	require_once 'header.php';
?>

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-6 col-xl-7 col-lg-7 col-md-9 col-sm-11">
					<div class="text-center my-5">
						<h1 class="fw-bold mb-2 text-uppercase">Регистрация</h1>
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Имя</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
									<div class="invalid-feedback">
										Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Электронная почта</label>
									<input id="email" type="email" class="form-control" name="email" value="" required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Пароль</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password_confirmation">Подтверждение пароля</label>
									<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
								    <div class="invalid-feedback">
								    	Password confirmation is required
							    	</div>
								</div>
								<p class="form-text text-muted mb-3">
									Регистрируясь, вы соглашаетесь с нашими <a href="" >условиями пользования</a>.
								</p>
								<div class="align-items-center d-flex">
									<button type="submit" name="register_check" class="btn btn-primary ms-auto">
										Зарегистрироваться
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								У вас уже есть аккаунт? <a href="/Вход" class="text-dark">Войти</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
