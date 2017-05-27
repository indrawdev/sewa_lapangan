<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA TARIF LAPANGAN</div>
		<div class="panel-body">
		<?php echo $this->session->flashdata('message'); ?>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('tarif/add'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Mulai</th>
						<th>Selesai</th>
						<th>Perjam</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tarifs as $tarif) : ?>
					<tr>
						<td><?php echo $tarif->kode_tarif; ?></td>
						<td><?php echo $tarif->mulai; ?></td>
						<td><?php echo $tarif->selesai; ?></td>
						<td><?php echo 'Rp. ' . number_format($tarif->perjam, '0', '.', '.'); ?></td>
						<td><?php echo 'Rp. ' . number_format($tarif->total, '0', '.', '.'); ?></td>
						<td>
							<a class="btn btn-primary btn-sm" href="<?php echo base_url('tarif/view/'.$tarif->tarif_id); ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url('tarif/edit/'.$tarif->tarif_id); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a class="btn btn-danger btn-sm" href="<?php echo base_url('tarif/delete/'.$tarif->tarif_id); ?>" onclick="return confirm('Apakah anda yakin, dihapus?');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>