<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">DATA TARIF</div>
		<div class="panel-body">
	    <form id="tarif" method="post" action="<?php echo base_url('tarif/updateTarif/'. $tarif->tarif_id); ?>">
			<div class="form-group">
		    	<label for="kode">Kode</label>
		    	<input type="text" class="form-control input-lg" name="kode_tarif" value="<?php echo $tarif->kode_tarif; ?>">
		  	</div>
		  	<div class="form-group">
		    	<label for="mulai">Mulai</label>
		    	<div class="input-group">
		    		<div class="input-group-addon input-lg">
		    			<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
		    		</div>
		    		<input type="text" class="form-control input-lg" name="mulai" id="mulai" value="<?php echo $tarif->mulai; ?>">
		    	</div>
		    </div>
		  	<div class="form-group">
		    	<label for="selesai">Selesai</label>
		    	<div class="input-group">
		    		<div class="input-group-addon input-lg">
		    			<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
		    		</div>
		    		<input type="text" class="form-control input-lg" name="selesai" id="selesai" value="<?php echo $tarif->selesai; ?>">
		    	</div>
		    </div>
		  	<div class="form-group">
		    	<label for="perjam">Perjam</label>
		    	<div class="input-group">
		    		<div class="input-group-addon">Rp.</div>
		    		<input type="text" class="form-control input-lg" name="perjam" value="<?php echo $tarif->perjam; ?>">
		    	</div>
		    </div>
	  		<button type="submit" class="btn btn-primary btn-lg">Save</button>
		</form>
	    </div>
	</div>
</div>
<script>
$(function() {
	$("#mulai").timepicker();
	$("#selesai").timepicker();
});
</script>