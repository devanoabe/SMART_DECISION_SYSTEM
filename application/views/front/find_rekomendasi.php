<script type="text/javascript">
	function det_smart(id) {
		$.ajax({
			type: "ajax",
			url: "<?= base_url('pil_smart/') ?>"+id,
			async: false,
			dataType: "json",
			success: function (data) {
				Swal.fire({
					title: data.merk+' '+data.seri,
					imageUrl: '<?= "assets/img/smartphone/"?>'+data.foto,
					imageHeight: 150,
					html:
					'<hr>'+
					'<div class="text-left small">'+
					'<ul>'+
					'<li>Display: '+data.display+'"</li>'+
					'<li>OS: '+data.os+'</li>'+
					'<li>RAM: '+data.ram+' GB</li>'+
					'<li>ROM: '+data.rom+' GB</li>'+
					'<li>Kamera: '+data.kamera_belakang+' MP / '+data.kamera_depan+'MP</li>'+
					'<li>CPU: '+data.cpu+' GHz</li>'+
					'<li>Chipset: '+data.chipset+'</li>'+
					'<li>Baterai: '+data.baterai+' mAh</li>'+
					'<li>Harga: Rp.'+konversi(data.harga)+'</li>'+
					'</ul>'+
					'</div>'
				})
			}
		});
	}
</script>
<div class="card shadow animated fadeInDownBig border-bottom-primary shadow h-100 py-2 my-3" id="manual">
	<div class="card-header">
		<h6 class="font-weight-bold text-primary text-center">Cari Rekomendasi Smartphone</h6>
	</div>
	<div class="card-body">
		<!-- Isi -->
		<div class="table-responsive">
			<table class="table table-hover table-striped table-sm" id="tab_pilih">
				<form method="POST" enctype="multipart/form-data" id="form_cari">
					<thead class="thead-light text-center">
						<tr>
							<th class="px-1">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" id="chk_boxes" class="custom-control-input">
									<label class="custom-control-label" for="chk_boxes"></label>
								</div>
							</th>
							<th>Smartphone</th>
							<th>RAM-ROM</th>
							<th>Camera</th>
							<th>Display</th>
							<th>CPU</th>
							<th>Chipset</th>
							<th>OS</th>
							<th>Baterai</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody id="show_pilih">
					</tbody>
				</form>
			</table>
		</div>
	</div>
	<div class="card-footer text-center">
		<button class="btn btn-primary btn-block" id="btn_cari">
			<i class="fas fa-check"></i>&nbsp;Tampilkan Hasil
		</button>
	</div>
</div>