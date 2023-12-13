<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
</head>

<style type="text/css">
	.btn-image:before {
		content: "";
		width: 17px;
		height: 17px;
		display: inline-block;
		margin-right: 5px;
		vertical-align: text-top;
		background-color: transparent;
		background-position : center center;
		background-repeat:no-repeat;
	}
	.image-btn:before{
		background-image : url(https://pbs.twimg.com/profile_images/1295283628872568832/bL9i6lY0_400x400.jpg) !important;
		background-size: cover;
		border-radius: 50%;
	}
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
<?php
$d = $detail_con->row();
$session = $this->session->userdata('user');
if ($session) { $url = base_url('list'); } else { $url = base_url('login'); }
?>
<div class="container">
	<div class="m-0">
		<div class="row justify-content-center py-3 my-5">
			<div class="col-md-8">
				<h1>Kapan sebuah website membantumu merasa terbantu dalam mengambil keputusan?</h1>
			</div>
			<div class="col-md-4">
				<p>
				Kami akan memberikan contoh penggunaan AHP dalam berbagai konteks, seperti pemilihan vendor, evaluasi kinerja karyawan, pemilihan investasi, dan banyak lagi. Anda akan melihat bagaimana AHP dapat membantu menghasilkan keputusan yang lebih baik.
				</p>
				<a href="<?= $url ?>" class="btn m-1">
					<span class="icon text-black pr-2"><i class="fas fa-chevron-circle-right"></i></span>
					<span class="text">Berikutnya</span>
				</a>
			</div>
		</div>
		<div class="row justify-content-center ">
			<div class="col-md-12">
				<center><img class="img-fluid mt-4 animated flash coba" src="<?= base_url('assets/img/bg.png') ?>"></center>
			</div>
		</div>
	</div>
</div>


<?php if($flash): ?>
<div class="flash-data" data-type="<?= $flash['type']; ?>" data-title="<?= $flash['title']; ?>"></div>
<?php endif; ?>