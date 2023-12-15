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
		line-height: 52px;
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
			padding-top: 100px
		}
	}
</style> 

<div class="container">
	<div class="row justify-content-center py-2 mb-4">
		<div class="col-md-6">
			<h1>Kami menyediakan 10 Pertanyaan untuk anda jawab!</h1>
		</div>
		<div class="col-md-6">
				<form method="POST" enctype="multipart/form-data" id="form_bobot" action="hasil">
					
						<?php
							$i = 1;
							foreach ($pertanyaan as $key => $row){
						?>
						<input type="text" name="id_kriteria[]" value="<?= $row->id_kriteria ?>" hidden>
						<p class="font-weight-bold"><?= $i; ?>. <?= $row->pertanyaan; ?></p>
						<?php if ($row->id_kriteria != 10) { ?>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?>" name="bobot<?= $i ?>" class="custom-control-input" value="10">
								<label class="custom-control-label" for="bbt<?= $i ?>">Rendah</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?><?= $i+1 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="20">
								<label class="custom-control-label" for="bbt<?= $i ?><?= $i+1 ?>">Sedang</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?><?= $i+2 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="30">
								<label class="custom-control-label" for="bbt<?= $i ?><?= $i+2 ?>">Normal</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?><?= $i+3 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="40">
								<label class="custom-control-label" for="bbt<?= $i ?><?= $i+3 ?>">Tinggi</label>
							</div>
							<hr>
						<?php } else { ?>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?>" name="bobot<?= $i ?>" class="custom-control-input" value="10">
								<label class="custom-control-label" for="bbt<?= $i ?>">Rendah</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?><?= $i+1 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="20">
								<label class="custom-control-label" for="bbt<?= $i ?><?= $i+1 ?>">Sedang</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?><?= $i+2 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="30">
								<label class="custom-control-label" for="bbt<?= $i ?><?= $i+2 ?>">Normal</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="bbt<?= $i ?><?= $i+3 ?>" name="bobot<?= $i ?>" class="custom-control-input" value="40">
								<label class="custom-control-label" for="bbt<?= $i ?><?= $i+3 ?>">Tinggi</label>
							</div>
							<hr>
						<?php } ?>
						<?php
						$i++;
						}
						?>
						<?php for ($i=0; $i < count($hp); $i++) { ?>
							<input type="text" name="hp[]" value="<?= $hp[$i] ?>" hidden>
						<?php } ?>
					
					<div class="card-footer text-center">
						<button class="btn btn-info btn-block" id="btn_bobot" type="submit">
							<i class="fas fa-check"></i>&nbsp;Tampilkan Hasil
						</button>
					</div>
				</form>
			
		</div>
	</div> 
</div>
