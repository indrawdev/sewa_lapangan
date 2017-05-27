<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA PEMBAYARAN</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th>Nama Lapangan</th>
						<td><?php echo $pembayaran->nama_lapangan; ?></td>
					</tr>
					<tr>
						<th>Nama Pelanggan</th>
						<td><?php echo $pembayaran->nama_pelanggan; ?></td>
					</tr>
					<tr>
						<th>Tanggal Bayar</th>
						<td><?php echo $pembayaran->tanggal_bayar; ?></td>
					</tr>
					<tr>
						<th>Sisa Pembayaran</th>
						<td><?php echo 'Rp. ' . number_format($pembayaran->sisa_bayar, '0', '.', '.');  ?></td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							<?php 
								if ($pembayaran->status == 1 || $pembayaran->sisa_bayar == '0') {
									$status = '<span class="label label-success">SUDAH LUNAS</span>';
									echo $status;
								} else {
									$status = '<span class="label label-warning">BELUM LUNAS</span>';
									echo $status;
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('pembayaran'); ?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
		</div>
	</div>
</div>