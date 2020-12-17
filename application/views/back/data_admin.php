<script type="text/javascript">
	function mdl_addmin() {
		document.getElementById("mdlhead").classList.remove('bg-warning');
		document.getElementById("mdlhead").classList.add('bg-info');
		$('#headtitle').text('Tambah Data');
		$('#mdl_addadmin').modal('show');
		$('#form_addmin')[0].reset();
	}
	function edt_admin(id_admin) {
		$.ajax({
			type: "ajax",
			url: "<?= base_url('pil_admin/') ?>"+id_admin,
			async: false,
			dataType: "json",
			success: function (data) {
				document.getElementById("mdlhead").classList.remove('bg-info');
				document.getElementById("mdlhead").classList.add('bg-warning');
				$('#headtitle').text('Edit Data');
				$('#mdl_addadmin').modal('show');
				$('[name="id_admin"]').val(data.id_admin);
				$('[name="username"]').val(data.username);
				$('[name="password"]').val(data.password);
				$('[name="nama"]').val(data.nama);
			},
			error: function (data) {
				swal('Terdapat Kesalahan');
			}
		});
	}
	function del_admin(id_admin) {
		Swal.fire({
			confirmButtonClass: 'btn btn-success m-2 del_addmin',
			cancelButtonClass: 'btn btn-danger m-2',
			buttonsStyling: false,
			showCancelButton: true,
			title: 'Yakin ingin hapus ?',
			type: 'warning',
			confirmButtonText: '<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Ya !',
			cancelButtonText: '<i class="fas fa-times"></i>&nbsp;&nbsp;Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?= base_url('del_admin/') ?>"+id_admin,
					data: {'id_admin':id_admin},
					success: function (data){
						sukses_hapus();
						console.log(data);
					},
					error: function(data){
						notif_gagal();
					}
				});
			}
		})
	}
</script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h4 mb-0 text-gray-800">Data Admin</h1>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card border-bottom-info shadow mb-4">
			<div class="card-header py-3">
				<h6 class="text-center m-0 font-weight-bold text-secondary">Tambah Admin</h6>
			</div>
			<div class="card-body">
				<?php if ($this->session->userdata('admin')['hak_akses']=='sadmin') { ?>
				<button type="button" class="btn btn-info btn-icon-split btn-sm mb-4" onclick="mdl_addmin();" data-toggle="tooltip" data-placement="right" title="Tambah Data">
					<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
					<span class="text">Tambah</span>
				</button>
				<?php } ?>
				<div class="table-responsive">
					<table class="table table-hover" id="tab_admin">
						<thead class="thead-light">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Password</th>
								<th>Login Terakhir</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody id="show_admin">
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer"></div>
		</div>
	</div>
</div>