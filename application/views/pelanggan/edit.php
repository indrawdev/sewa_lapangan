<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">FORM PELANGGAN</div>
		<div class="panel-body">
	    <form id="pelanggan" method="post" action="<?php echo base_url('pelanggan/updatePelanggan/'.$pelanggan->pelanggan_id); ?>">
			<div class="form-group">
		    	<label for="kode">Kode Pelanggan</label>
		    	<input type="text" class="form-control input-lg" name="kode_pelanggan" value="<?php echo $pelanggan->kode_pelanggan; ?>" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="nama">Nama Pelanggan</label>
		    	<input type="text" class="form-control input-lg" name="nama_pelanggan" value="<?php echo $pelanggan->nama_pelanggan; ?>" required>
		    </div>
		    <div class="form-group">
		    	<label for="alamat">Alamat</label>
		    	<textarea class="form-control input-lg" rows="3" name="alamat" required><?php echo $pelanggan->alamat; ?></textarea>
		    </div>
		  	<div class="form-group">
		    	<label for="telepon">Telepon</label>
		    	<input type="text" class="form-control input-lg" name="telepon" value="<?php echo $pelanggan->telepon; ?>" required>
		    </div>
	  		<button type="submit" class="btn btn-primary btn-lg">Save</button>
		</form>
	    </div>
	</div>
</div>
<script type="text/javascript">
$(function(){
  $("#pelanggan").validate();
});     
</script>