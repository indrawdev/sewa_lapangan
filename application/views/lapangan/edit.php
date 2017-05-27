<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA LAPANGAN</div>
		<div class="panel-body">
	    <form id="lapangan" method="post" action="<?php echo base_url('lapangan/updateLapangan/'.$lapangan->lapangan_id); ?>">
			<div class="form-group">
		    	<label for="kode">Kode Lapangan</label>
		    	<input type="text" class="form-control input-lg" name="kode_lapangan" value="<?php echo $lapangan->kode_lapangan; ?>" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="nama">Nama Lapangan</label>
		    	<input type="text" class="form-control input-lg" name="nama_lapangan" value="<?php echo $lapangan->nama_lapangan; ?>" required>
		    </div>
	  		<button type="submit" class="btn btn-primary btn-lg">Update</button>
		</form>
	    </div>
	</div>
</div>
<script type="text/javascript">
$(function(){
  $("#lapangan").validate();
});     
</script>