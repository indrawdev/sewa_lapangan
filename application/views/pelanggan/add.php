<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">FORM PELANGGAN</div>
		<div class="panel-body">
	    <form id="pelanggan" method="post" action="<?php echo base_url('pelanggan/createPelanggan'); ?>">
			<div class="form-group">
		    	<label for="kode">Kode Pelanggan</label>
		    	<input type="text" class="form-control input-lg" name="kode_pelanggan" value="<?php echo strtoupper('PL' . uniqid()); ?>" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="nama">Nama Pelanggan</label>
		    	<input type="text" class="form-control input-lg" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
		    </div>
		    <div class="form-group">
		    	<label for="alamat">Alamat</label>
		    	<textarea name="alamat" class="form-control input-lg" rows="3" required></textarea>
		    </div>
		  	<div class="form-group">
		    	<label for="telepon">Telepon</label>
		    	<input type="text" class="form-control input-lg" name="telepon" placeholder="Telepon" required>
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