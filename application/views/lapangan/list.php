<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA MASTER LAPANGAN</div>
		<div class="panel-body">
		<?php echo $this->session->flashdata('message'); ?>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('lapangan/add'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a><br />
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Kode Lapangan</th>
						<th>Nama Lapangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lapangans as $lapangan) : ?>
					<tr>
						<td><?php echo $lapangan->kode_lapangan; ?></td>
						<td><?php echo $lapangan->nama_lapangan; ?></td>
						<td>
							<a class="btn btn-primary btn-sm" href="<?php echo base_url('lapangan/view/'.$lapangan->lapangan_id); ?>">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url('lapangan/edit/'.$lapangan->lapangan_id); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a class="btn btn-danger btn-sm" href="<?php echo base_url('lapangan/delete/'.$lapangan->lapangan_id); ?>" onclick="return confirm('Apakah anda yakin, dihapus?');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>