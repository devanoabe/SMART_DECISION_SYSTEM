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
		font-size: 48px;
		font-family: 'Noto Sans', sans-serif;
		color: white;
		line-height: 45px;
	}
	p{
		font-weight: 100;
	}
	.btn{
		background: #93f291;
		border-radius: 20px;
		padding: 7px 20px;
	}
	.text{
		color: black;
		font-weight: 600;
	}
	.icon{
		color: black;
	}
	.coba{
		width: 450px;
	}
	.btn{
		color: black;
		font-weight: 600;
	}
	@media screen and (max-width: 768px) {
		h1{
			font-size: 21px;
			text-align: center;	
			font-family: 'Noto Sans', sans-serif;
			color: white;
		}
		p{
			text-align: center;
		}	
		.btn{
			float: center;
		}
		.coba{
			padding-top: 10px
		}
	}
</style> 


<div style="padding-top: 60px" class="row justify-content-center px-5">
	<div class="col-md-12 mb-2">
		<form method="POST" enctype="multipart/form-data" id="form_direct" action="pembobotan">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<center><img class="img-fluid animated flash coba" src="<?= base_url('assets/img/bg2.png') ?>"></center>
				</div>
				<div class="col-md-12">
					<h1 class="text-center">Cari HP yang <br>Worth it?</h1>
				</div>
				<div class="col-md-12 py-3">
					<h6 class="card-text text-center">
						Pilih HP-mu berdasarkan isi kuesioner!
					</h6>
				</div>			
				<?php for ($i=0; $i < count($smartphone); $i++) { ?>
					<input type="text" name="hp[]" value="<?= $smartphone[$i]->id ?>" hidden>
				<?php } ?>
				<div>
					<button class="btn" id="btn_cari">
						Kuesioner
					</button>
				</div>
			</div>
		</form>
	</div>
</div>