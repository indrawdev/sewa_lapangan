<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA PELANGGAN</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>Kode Pelanggan</th>
						<td><?php echo $pelanggan->kode_pelanggan; ?></td>
					</tr>
					<tr>
						<th>Nama Pelanggan</th>
						<td><?php echo $pelanggan->nama_pelanggan; ?></td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td><?php echo $pelanggan->alamat; ?></td>
					</tr>
					<tr>
						<th>Telepon</th>
						<td><?php echo $pelanggan->telepon; ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('pelanggan'); ?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
		</div>
	</div>
</div>