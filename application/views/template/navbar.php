<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>
	<title><?= $title?></title>
	<link rel="icon" href="<?= base_url('assets/img/logo_uty2.png') ?>">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css">
	<style type="text/css"> 
		body{
			<?php
			$pf = $this->agent->platform();
			if ($pf=='Android'||$pf=='iOS') {
				$img='bgalt.jpg';
				$pd='px-1';
			} else {
				$img='bg.jpg';
				$pd='';
			}
			?>
			background: #1c1c1c;
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment:fixed;
			opacity: 0.98;
		}
		#userNama {
			/* Gaya atau properti CSS yang diinginkan */
			font-weight: bold;
			color: #93f291;
			/* Tambahan gaya lainnya sesuai kebutuhan */
		}
		@media screen and (max-width: 768px) {
		.colaps{
			border-radius: 20px
		}
		p{
			text-align: center;
		}
	}
	</style>
</head>
<body id="page-top" class="sb-nav-fixed">
	<?php $p = $this->uri->segment(1); ?>
	<nav class="sb-topnav navbar navbar-expand-lg navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>">SmartSystem</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse pt-2" id="navbarText">
				<ul style="background: #222222; padding: 2px 20px; border-radius: 20px;" class="navbar-nav ml-auto">
					<li class="nav-item <?php if($p == '' || $p == 'beranda'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('beranda') ?>">&nbsp;Beranda <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?php if($p == 'list' || $p == 'daftar'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('daftar') ?>"></i>&nbsp;Smartphone</a>
					</li>
					<li class="nav-item <?php if($p == 'help' || $p == 'bantuan'){echo "active font-weight-bold";} ?>">
						<a class="nav-link" href="<?= base_url('bantuan') ?>"></i>&nbsp;Bantuan</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown no-arrow pt-3">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<p class="d-lg-inline small">
								<?php
								if ($this->session->userdata('user')) {
									echo '<div id="userNama">' . $this->session->userdata('user')['nama'] . '</div>';
								} else {
									echo '<h1 style="font-size: 14px; font-weight: bold; color: #333; background-color: #93f291; padding: 10px 20px; border-radius: 20px;">Pilihan</h1>';

								}
								?>
							</p>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<?php if ($this->session->userdata('user')) { ?>
								<?php } ?>
								<a class="dropdown-item" href="#" id="btn_edt_user">
									Ubah Pengaturan Akun
								</a>
							<?php if ($this->session->userdata('admin')) { ?>
								<a class="dropdown-item" href="<?= base_url('admin') ?>">
									Menuju Dashboard
									<i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
								</a>
							<?php } elseif (!$this->session->userdata('user')) { ?>
								<a class="dropdown-item" href="<?= base_url('masuk') ?>">
									Login
								</a>
							<?php } ?>
							<div class="dropdown-divider"></div>
							<?php if ($this->session->userdata('admin') || $this->session->userdata('user')) { ?>
								<a class="dropdown-item" href="#" onclick="logout();">
									Keluar
								</a>
							<?php } ?>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid <?= $pd ?>">
