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
<script type="text/javascript">
</script>
<div class="row justify-content-center py-">
	<div class="col-md-3 mb-2">
		<div class="card animated fadeInLeftBig h-100 py-1 px-3 pt-4" id="manual">
			<div class="card-body">
				<!-- Isi -->
				<h1>Register</h1>
				<form class="mt-4" id="fdaftar" method="POST" autocomplete="off">
					<div class="form-group form-label-group">
						<label for="username" class="small">Username</label>
						<input type="text" min="6" name="username" id="username" class="form-control" placeholder="Username" autofocus required="yes">
					</div>
					<div class="form-group form-label-group">
						<label for="password" class="small">Password</label>
						<input type="password" min="6" name="password" id="password" class="form-control" placeholder="Password" required="yes">
					</div>
					<div class="form-group form-label-group">
						<label for="password_conf" class="small">Konfirmasi Password</label>
						<input type="password" name="password_conf" id="password_conf" class="form-control" placeholder="Konfirmasi Password" required="yes">
					</div>
					<div class="form-group form-label-group pb-2">
						<label for="nama" class="small">Nama</label>
						<input type="text" min="6" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" autofocus required="yes">
					</div>
				</form> 
				<button class="btn btn-block mt-4" id="btn_fdaftar">
					Register
				</button>
				<hr>
				<a class="regris" href="<?= base_url('login') ?>">
					<p>Belum Memiliki Akun? <br>Daftar Sekarang!</p>
				</a>
			</div>
		</div>
	</div>
</div>