<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">TRANSAKSI PEMBAYARAN</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nama Lapangan</th>
						<th>Nama Pelanggan</th>
						<th>Sisa Pembayaran</th>
						<th>Jumlah Bayar</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembayarans as $pembayaran) : ?>
					<tr>
						<td><?php echo $pembayaran->nama_lapangan; ?></td>
						<td><?php echo $pembayaran->nama_pelanggan; ?></td>
						<td><?php echo 'Rp. ' . number_format($pembayaran->sisa_bayar, '0', '.', '.'); ?></td>
						<td><?php echo 'Rp. ' . number_format($pembayaran->jumlah_bayar, '0', '.', '.'); ?></td>
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
						<td>
							<a class="btn btn-primary btn-sm" href="<?php echo base_url('pembayaran/view/'.$pembayaran->pembayaran_id); ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url('pembayaran/edit/'.$pembayaran->pembayaran_id); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>