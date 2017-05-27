<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA LAPANGAN</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>Kode Lapangan</th>
						<td><?php echo $lapangan->kode_lapangan; ?></td>
					</tr>
					<tr>
						<th>Nama Lapangan</th>
						<td><?php echo $lapangan->nama_lapangan; ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('lapangan'); ?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
		</div>
	</div>
</div>