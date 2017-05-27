<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">STATUS PEMBAYARAN</div>
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
			<form id="pembayaran" method="post" action="<?php echo base_url('pembayaran/updatePembayaran/'.$pembayaran->pembayaran_id); ?>">
				<div class="form-group">
					<label for="jumlah_bayar">Jumlah Bayar</label>
					<div class="input-group">
						<div class="input-group-addon">Rp.</div>
						<input type="text" class="form-control input-lg" name="jumlah_bayar" required>
					</div>
				</div>
				<div class="form-group">
					<label for="status">Status Pembayaran</label>
					<select class="form-control input-lg" name="status" required>
						<option value="">PILIH STATUS</option>
						<option value="0">BELUM BAYAR</option>
						<option value="1">SUDAH LUNAS</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Save</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
  $("#pembayaran").validate();
});     
</script>