<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA MASTER PELANGGAN</div>
		<div class="panel-body">
		<?php echo $this->session->flashdata('message'); ?>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('pelanggan/add'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			<br />
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pelanggans as $pelanggan) : ?>
					<tr>
						<td><?php echo $pelanggan->kode_pelanggan; ?></td>
						<td><?php echo $pelanggan->nama_pelanggan; ?></td>
						<td><?php echo $pelanggan->alamat; ?></td>
						<td><?php echo $pelanggan->telepon; ?></td>
						<td>
							<a class="btn btn-primary btn-sm" href="<?php echo base_url('pelanggan/view/'.$pelanggan->pelanggan_id); ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url('pelanggan/edit/'.$pelanggan->pelanggan_id); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a class="btn btn-danger btn-sm" href="<?php echo base_url('pelanggan/delete/'.$pelanggan->pelanggan_id); ?>" onclick="return confirm('Apakah anda yakin, dihapus?');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>