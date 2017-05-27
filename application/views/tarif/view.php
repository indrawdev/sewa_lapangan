<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA TARIF</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>Kode Tarif</th>
						<td><?php echo $tarif->kode_tarif; ?></td>
					</tr>
					<tr>
						<th>Mulai</th>
						<td><?php echo $tarif->mulai; ?></td>
					</tr>
					<tr>
						<th>Selesai</th>
						<td><?php echo $tarif->selesai; ?></td>
					</tr>
					<tr>
						<th>Perjam</th>
						<td><?php echo $tarif->perjam; ?></td>
					</tr>
					<tr>
						<th>Total</th>
						<td><?php echo $tarif->total; ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('tarif'); ?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
		</div>
	</div>
</div>