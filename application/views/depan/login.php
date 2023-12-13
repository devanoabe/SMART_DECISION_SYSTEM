<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<style type="text/css">
	h1{
		word-wrap: break-word;
		-webkit-hyphens: auto;
		-moz-hyphens: auto;
		-ms-hyphens: auto;
		-o-hyphens: auto;
		hyphens: auto;
		font-size: 38px;
		font-family: 'Noto Sans', sans-serif;
		color: white;
	}
	.btn{
		background: #93f291;
		border-radius: 20px;
		padding: 7px 20px;
		color: black;
		font-weight: 800;
	}
	.card{
		border-radius: 20px;
		background: #222222;
		border: 1px solid #222222;
	}
	.form-control{
		background: #222222;
		border: 1px solid #3b3b40;
		border-radius: 20px
	}
	.regris p{
		color: #ffff;
		text-align: center;
		font-size: 16px;
	}
</style> 

<div class="row justify-content-center py-2 mt-4">
	<div class="col-md-3 mb-2">
		<div class="card animated fadeInLeftBig h-100 py-1 px-3 pt-4" id="manual">
			<div class="card-body">
				<!-- Isi -->
				<h1>Welcome</h1>
				<form class="mt-4" id="flogin" method="POST" autocomplete="off">
					<div class="form-group form-label-group">
						<label for="username" class="small">Username</label>
						<input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus required="yes">
					</div>
					<div class="form-group form-label-group">
						<label for="password" class="small">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="yes">
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="small">Masuk Sebagai :</label><br>
								<div class="custom-control custom-radio">
									<input type="radio" name="login_as" id="as_user" value="user" class="custom-control-input">
									<label class="custom-control-label" for="as_user">Pengguna</label>
								</div>
								<div class="custom-control custom-radio mt-1">
									<input type="radio" name="login_as" id="as_admin" value="admin" class="custom-control-input">
									<label class="custom-control-label" for="as_admin">Admin</label>
								</div>
							</div>
						</div>
					</div>
				</form> 
				<button class="btn btn-block mt-3" id="btn_flogin">
					Masuk
				</button>
				<hr>
				<a class="regris" href="<?= base_url('register') ?>">
					<p>Belum Memiliki Akun? <br>Daftar Sekarang!</p>
				</a>
			</div>
		</div>
	</div>
</div>