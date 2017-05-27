<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA SEWA</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>Nama Lapangan</th>
						<td><?php echo $sewa->nama_lapangan; ?></td>
					</tr>
					<tr>
						<th>Nama Pelanggan</th>
						<td><?php echo $sewa->nama_pelanggan; ?></td>
					</tr>
					<tr>
						<th>Tarif</th>
						<td><?php echo 'Rp. ' . number_format($sewa->total, '0', '.', '.'); ?></td>
					</tr>
					<tr>
						<th>Tanggal Booking</th>
						<td><?php echo $sewa->tanggal_booking; ?></td>
					</tr>
					<tr>
						<th>Jam Booking</th>
						<td><?php echo $sewa->jam_booking; ?></td>
					</tr>
					<tr>
						<th>Uang Muka</th>
						<td><?php echo 'Rp. ' . number_format($sewa->uang_muka, '0', '.', '.');  ?></td>
					</tr>
					<tr>
						<th>Biaya Sewa</th>
						<td><?php echo 'Rp. ' . number_format($sewa->biaya_sewa, '0', '.', '.'); ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('sewa'); ?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
		</div>
	</div>
</div>