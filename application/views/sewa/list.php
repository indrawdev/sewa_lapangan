<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">SEWA LAPANGAN</div>
		<div class="panel-body">
		<?php echo $this->session->flashdata('message'); ?>
			<a class="btn btn-primary btn-lg" href="<?php echo base_url('sewa/add'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Lapangan</th>
						<th>Pelanggan</th>
						<th>Tarif</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Uang Muka</th>
						<th>Biaya</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sewas as $sewa) : ?>
					<tr>
						<td><?php echo $sewa->nama_lapangan; ?></td>
						<td><?php echo $sewa->nama_pelanggan; ?></td>
						<td><?php echo $sewa->mulai . ' - ' . $sewa->selesai; ?></td>
						<td><?php echo $sewa->tanggal_booking; ?></td>
						<td><?php echo $sewa->jam_booking; ?></td>
						<td><?php echo 'Rp. ' . number_format($sewa->uang_muka, '0', '.', '.'); ?></td>
						<td><?php echo 'Rp. ' . number_format($sewa->biaya_sewa, '0', '.', '.'); ?></td>
						<td>
							<a class="btn btn-primary btn-sm" href="<?php echo base_url('sewa/view/'.$sewa->sewa_id);?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
							<a class="btn btn-success btn-sm" href="<?php echo base_url('sewa/edit/'.$sewa->sewa_id);?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a class="btn btn-danger btn-sm" href="<?php echo base_url('sewa/delete/'.$sewa->sewa_id);?>" onclick="return confirm('Apakah anda yakin, dihapus?');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>