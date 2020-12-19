				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script>
	<script src="<?= base_url() ?>assets/js/notif.js"></script>
	<script src="<?= base_url() ?>assets/vendor/summernote/summernote-bs4.js"></script>
	<script src="<?= base_url() ?>assets/vendor/sweetalert/dist/sweetalert2.js"></script>
	<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
	<script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
	<?php $p = $this->uri->segment(1); ?>
	<script type="text/javascript">
		// $('.sidebar').toggleClass('toggled');
		function logout() {
			Swal.fire({
				confirmButtonClass: 'btn btn-success m-2',
				cancelButtonClass: 'btn btn-danger m-2',
				buttonsStyling: false,
				showCancelButton: true,
				title: 'Yakin ingin keluar ?',
				type: 'warning',
				confirmButtonText: '<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Ya !',
				cancelButtonText: '<i class="fas fa-times"></i>&nbsp;&nbsp;Batal'
			}).then((result) => {
				if (result.value) {
					window.location.replace('<?= base_url('logout') ?>');
				}
			})
		}

		<?php if ($p == 'smartphone') { ?>
		function previewImage() {
			document.getElementById("image-preview").style.display = "block";
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("foto").files[0]);

			oFReader.onload = function(oFREvent) {
				document.getElementById("image-preview").src = oFREvent.target.result;
			};
		};

		function konversi(angka) {
			var reverse = angka.toString().split('').reverse().join(''),
			ribuan = reverse.match(/\d{1,3}/g);
			ribuan = ribuan.join('.').split('').reverse().join('');
			return ribuan
		}
		<?php } ?>
		
		$(document).ready(function() {
			<?php if ($p == 'smartphone') { ?>
			var tab_smart;
			tab_smart = $('#tab_smart').DataTable({
				"processing": true,
				"serverSide": true,
				"order": [],
				"ajax": {
					"url": "<?= base_url('ajax_list')?>",
					"type": "POST"
				},
				"columnDefs": [{ 
					"targets": [ -1 ],
					"orderable": false
				}],
				initComplete:function () {
					$('#tab_smart thead tr th').addClass("align-middle text-center");
					$('#show_smart tr td').addClass("align-middle");
				}
			});
			function reload_tab_smart()
			{
				// tab_smart.ajax.reload(null,false);
				tab_smart.ajax.reload(function () {
					$('#show_smart tr td').addClass("align-middle");
				})
			}
			$('#form_smart').submit(function (e) {
				e.preventDefault();
				var form = document.getElementById('form_smart');
				var merk = $('[name="merk"]').val();
				var seri = $('[name="seri"]').val();
				var display = $('[name="display"]').val();
				var os = $('[name="os"]').val();
				var kamera_belakang = $('[name="kamera_belakang"]').val();
				var kamera_depan = $('[name="kamera_depan"]').val();
				var ram = $('[name="ram"]').val();
				var rom = $('[name="rom"]').val();
				var cpu = $('[name="cpu"]').val();
				var chipset = $('[name="chipset"]').val();
				var baterai = $('[name="baterai"]').val();
				var harga = $('[name="harga"]').val();
				if (merk==''||seri==''||display==''||os==''||kamera_depan==''||kamera_belakang==''||ram==''||rom==''||cpu==''||chipset==''||baterai==''||harga=='') {
					swal('Lengkapi Data Terlebih Dahulu');
				} else {
					$.ajax({
						url: "<?= base_url('simpan_smartphone') ?>",
						type: "POST",
						data: new FormData(form),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						success: function(data){
							$('#mdl_smart').modal('hide');notif_sukses();console.log(data);reload_tab_smart();
						},
						error: function(data){
							notif_gagal();
						}
					});
				}
			})
			$('#del_smart').click(function () {
				$.ajax({
					type: "POST",
					url: "<?= base_url('del_smartphone') ?>",
					data: $('#form_del_smart').serialize(),
					success: function (data){
						$('#mdl_smart_del').modal('hide');
						sukses_hapus();
						reload_tab_smart();
					},
					error: function(data){
						notif_gagal();
					}
				});
			})
			$('#reload_tsmart').click(function () {
				reload_tab_smart();
			})
			// tampil_smartphone();
			function tampil_smartphone() {
				pop_det = 'data-toggle="tooltip" title="Detail Data"';
				pop_edt = 'data-toggle="tooltip" title="Edit Data"';
				pop_del = 'data-toggle="tooltip" title="Delete Data"';
				$.ajax({
					type: "ajax",
					url: "<?= base_url('list_smartphone') ?>",
					async: false,
					dataType: "json",
					success: function (data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html+= '<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+data[i].merk+'</td>'+
							'<td>'+data[i].seri+'</td>'+
							'<td>'+data[i].display+'"</td>'+
							'<td>'+data[i].ram+' GB</td>'+
							'<td>'+data[i].rom+' GB</td>'+
							'<td>'+data[i].kamera_belakang+' MP / '+data[i].kamera_depan+' MP</td>'+
							'<td>'+data[i].cpu+' GHz</td>'+
							'<td>'+data[i].chipset+'</td>'+
							'<td>'+data[i].os+'</td>'+
							'<td>'+data[i].baterai+' mAh</td>'+
							'<td>Rp.'+konversi(data[i].harga)+'</td>'+
							'<td class="text-center">'+
							'<button class="btn btn-sm btn-primary m-1" onclick="det_smart('+
							data[i].id+
							');" '+pop_det+'><i class="fas fa-info-circle"></i></button>'+
							'<button class="btn btn-sm btn-warning m-1" onclick="edt_smart('+
							data[i].id+
							');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
							'<button class="btn btn-sm btn-danger m-1" onclick="del_smart('+
							data[i].id+
							');" '+pop_del+'><i class="fas fa-trash"></i></button>'+
							'</td>'+
							'</tr>';
						}
						$('#show_smart').html(html);
					}
				});
			}
			<?php } ?>

			<?php if ($p == 'kriteria') { ?>
			tampil_kriteria();
			function tampil_kriteria() {
				pop_edt = 'data-toggle="tooltip" title="Edit Data"';
				$.ajax({
					type: "ajax",
					url: "<?= base_url('list_kriteria') ?>",
					async: false,
					dataType: "json",
					success: function (data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html+= '<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+data[i].kriteria+'</td>'+
							'<td class="text-center">'+
							'<button class="btn btn-sm btn-warning m-1" onclick="edt_kriteria('+
							data[i].id_kriteria+
							');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
							'</td>'+
							'</tr>';
						}
						$('#show_kriteria').html(html);
					}
				});
			}
			<?php } ?>

			<?php if ($p == 'pertanyaan') { ?>
			tampil_pertanyaan();
			function tampil_pertanyaan() {
				pop_edt = 'data-toggle="tooltip" title="Edit Data"';
				$.ajax({
					type: "ajax",
					url: "<?= base_url('list_pertanyaan') ?>",
					async: false,
					dataType: "json",
					success: function (data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html+= '<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+data[i].kriteria+'</td>'+
							'<td>'+data[i].pertanyaan+'</td>'+
							'<td class="text-center">'+
							'<button class="btn btn-sm btn-warning m-1" onclick="edt_pertanyaan('+
							data[i].id_pertanyaan+
							');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
							'</td>'+
							'</tr>';
						}
						$('#show_pertanyaan').html(html);
					}
				});
			}
			<?php } ?>

			<?php if ($p == 'pengaturan') { ?>
			<?php $r = $detail_con->row(); ?>
			$('#note_help').summernote({
				placeholder: 'Isi..',
				toolbar: [
				 ['style', ['bold', 'italic', 'underline']],
				 ['para', ['ul', 'ol', 'paragraph']],
				 ['height', ['height']]
				],
				height: 225
			});
			$('#note_help').summernote('code','<?= $r->halaman_bantuan ?>');
			$('#simp_setting').click(function () {
				var nama_instansi = $('[name="nama_instansi"]').val();
				var alamat_instansi = $('[name="alamat_instansi"]').val();
				var deskripsi = $('[name="deskripsi"]').val();
				var nama_aplikasi = $('[name="nama_aplikasi"]').val();
				if (nama_instansi==''||nama_aplikasi==''||alamat_instansi==''||deskripsi=='') {
					swal('Lengkapi Data Terlebih Dahulu');
				} else {
					$.ajax({
						type: "POST",
						url: "<?= base_url('simpan_config') ?>",
						data: $('#form_setting').serialize(),
						success: function (data){
							notif_sukses();
						},
						error: function(data){
							notif_gagal();
						}
					});
				}
			});
			$('#simp_help').click(function () {
				$.ajax({
					type: "POST",
					url: "<?= base_url('simpan_bantuan') ?>",
					data: $('#form_help').serialize(),
					success: function (data){
						sukses_simpan_bantuan();
					},
					error: function (data) {
						swal(data);
					}
				});
			});
			$('#reset_help').click(function () {
				Swal.fire({
					title: 'Apakah anda yakin ingin mereset data ini?',
					text: 'Data yang telah diubah tidak dapat dikembalikan',
					type: 'warning',
					showCancelButton : true,
					confirmButtonText: '<i class="fas fa-eraser"></i>&nbsp;&nbsp;Ya, Reset Data !',
					cancelButtonText: '<i class="fas fa-times"></i>&nbsp;&nbsp;Batal'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							type: "POST",
							url: "<?= base_url('reset_bantuan') ?>",
							success: function (){
								sukses_reset();
								// setTimeout(' window.location = "<?= base_url('pengumuman') ?>"; ',1100);
							},
							error: function (data) {
								gagal_reset();
							}
						});
					}
				})
			});
			<?php } ?>

			<?php if ($p == 'addadmin') { ?>
			tampil_admin();
			function tampil_admin() {
				var user="<?= $this->session->userdata('admin')['username']; ?>";
				var akses="<?= $this->session->userdata('admin')['hak_akses']; ?>";
				pop_edt = 'data-toggle="tooltip" data-placement="top" title="Edit Data"';
				pop_del = 'data-toggle="tooltip" data-placement="top" title="Delete Data"';
				$.ajax({
					type: "ajax",
					url: "<?= base_url('list_admin') ?>",
					async: false,
					dataType: "json",
					success: function (data) {
						var html = '';
						var i;
						if (akses == 'sadmin') {
							for (i = 0; i < data.length; i++) {
								if (data[i].username == user) {
									html+= '<tr>'+
									'<td>'+(i+1)+'</td>'+
									'<td>'+data[i].nama+'</td>'+
									'<td>'+data[i].username+'</td>'+
									'<td>'+data[i].password.replace(/./g, '*')+'</td>'+
									'<td>'+data[i].last_login+'</td>'+
									'<td class="text-center">'+
									'<button class="btn btn-sm btn-warning m-1" onclick="edt_admin('+
									data[i].id_admin+
									');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
									'</td>'+
									'</tr>';
								} else {
									html+= '<tr>'+
									'<td>'+(i+1)+'</td>'+
									'<td>'+data[i].nama+'</td>'+
									'<td>'+data[i].username+'</td>'+
									'<td>'+data[i].password.replace(/./g, '*')+'</td>'+
									'<td>'+data[i].last_login+'</td>'+
									'<td class="text-center">'+
									'<button class="btn btn-sm btn-warning m-1" onclick="edt_admin('+
									data[i].id_admin+
									');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
									'<button class="btn btn-sm btn-danger m-1 del_addmin" onclick="del_admin('+
									data[i].id_admin+
									');" '+pop_del+'><i class="fas fa-trash"></i></button>'+
									'</td>'+
									'</tr>';
								}
							}
						} else {
							for (i = 0; i < data.length; i++) {
								if (data[i].hak_akses == 'sadmin') {
								} else if (data[i].username == user) {
									html+= '<tr>'+
									'<td>'+(i+1)+'</td>'+
									'<td>'+data[i].nama+'</td>'+
									'<td>'+data[i].username+'</td>'+
									'<td>'+data[i].password.replace(/./g, '*')+'</td>'+
									'<td>'+data[i].last_login+'</td>'+
									'<td class="text-center">'+
									'<button class="btn btn-sm btn-warning m-1" onclick="edt_admin('+
									data[i].id_admin+
									');" '+pop_edt+'><i class="fas fa-pen-square"></i></button>'+
									'</td>'+
									'</tr>';
								} else {
									html+= '<tr>'+
									'<td>'+(i+1)+'</td>'+
									'<td>'+data[i].nama+'</td>'+
									'<td>'+data[i].username+'</td>'+
									'<td>'+data[i].password.replace(/./g, '*')+'</td>'+
									'<td>'+data[i].last_login+'</td>'+
									'<td class="text-center">'+
									'</td>'+
									'</tr>';
								}
							}
						}
						$('#show_admin').html(html);
					}
				});
			}
			$('#simp_addmin').click(function () {
				var username = $('[name="username"]').val();
				var password = $('[name="password"]').val();
				var nama = $('[name="nama"]').val();
				if (username==''||password==''||nama=='') {
					swal('Lengkapi Data Terlebih Dahulu');
				} else {
					$.ajax({
						type: "POST",
						url: "<?= base_url('simpan_admin') ?>",
						data: $('#form_addmin').serialize(),
						success: function (data){
							tampil_admin();
							$('#mdl_addadmin').modal('hide');
							notif_sukses();
						},
						error: function(data){
							notif_gagal();
						}
					});
				}
			});
			$('.del_addmin').click(function () {
				setTimeout(function() { tampil_admin(); }, 5000);
			});
			<?php } ?>
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>