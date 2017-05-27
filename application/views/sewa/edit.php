<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">TRANSAKSI SEWA</div>
		<div class="panel-body">
	    <form id="sewa" method="post" action="<?php echo base_url('sewa/updateSewa'); ?>">
			<div class="form-group">
		    	<label for="lapangan">Lapangan</label>
		    	<select class="form-control input-lg" name="lapangan_id" required>
				  <option value="">Pilih Lapangan</option>
				  <?php foreach ($lapangans as $lapangan) : ?>
				  	<option value="<?php echo $lapangan->lapangan_id; ?>"><?php echo $lapangan->nama_lapangan; ?></option>
				  <?php endforeach; ?>
				</select>
		  	</div>
			<div class="form-group">
		    	<label for="pelanggan">Pelanggan</label>
		    	<select class="form-control input-lg" name="pelanggan_id">
				  <option value="">Pilih Pelanggan</option>
				  <?php foreach ($pelanggans as $pelanggan) : ?>
				  	<option value="<?php echo $pelanggan->pelanggan_id; ?>"><?php echo $pelanggan->nama_pelanggan; ?></option>
				  <?php endforeach; ?>
				</select>
		  	</div>
		  	<div class="form-group">
		    	<label for="tanggal">Tanggal Booking</label>
		    	<input type="text" class="form-control input-lg" name="tanggal" id="tanggal" value="<?php echo $sewa->tanggal_booking; ?>" required>
		    </div>
		  	<div class="form-group">
		    	<label for="selesai">Jam Booking</label>
		    	<input type="text" class="form-control input-lg" name="jambooking" id="jambooking" value="<?php echo $sewa->jam_booking; ?>" required>
		    </div>
		    <div class="form-group">
		    	<label for="tarif">Tarif</label>
		    	<select class="form-control input-lg" name="tarif_id" required>
				  <option value="">Pilih Tarif</option>
				  <?php foreach ($tarifs as $tarif) : ?>
				  	<option value="<?php echo $tarif->tarif_id; ?>"><?php echo '(' . $tarif->mulai . ' - ' . $tarif->selesai . ') - Rp. ' . number_format($tarif->total, '0', '.', '.'); ?></option>
				  <?php endforeach; ?>
				</select>
		  	</div>
		  	<div class="form-group">
		    	<label for="uang_muka">Uang Muka</label>
		    	<div class="input-group">
		    		<div class="input-group-addon">Rp.</div>
		    		<input type="text" class="form-control input-lg" name="uangmuka" value="<?php echo $sewa->uang_muka; ?>" required>
		    	</div>
		    </div>
	  		<button type="submit" class="btn btn-primary btn-lg">Save</button>
		</form>
	    </div>
	</div>
</div>
<script>
$( function() {
	$("#sewa").validate();
	$("#tanggal").datepicker();
	$("#jambooking").timepicker();
});
</script>