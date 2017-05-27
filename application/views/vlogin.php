<div class="row">
  <div class="col-sm-6 col-md-4 col-md-offset-4">
  	<div class="panel panel-primary">
  		<div class="panel-heading">LOGIN ADMIN</div>
  		<div class="panel-body">
  		<div id="response"></div>
  	    <form id="login" method="post">
  			<div class="form-group">
  		    	<label for="email">Email address</label>
  		    	<input type="email" class="form-control input-lg" name="email" placeholder="Email" required>
  		  	</div>
  		  	<div class="form-group">
  		    	<label for="password">Password</label>
  		    	<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
  		    </div>
  	  		<button type="submit" class="btn btn-primary btn-lg">Login</button>
  		  </form>
  	    </div>
  	</div>
  </div>
</div>
<script type="text/javascript">
   $(function(){
       $("#login").submit(function(event){
          event.preventDefault();
          dataString = $("#login").serialize();
          $.ajax({
           type: "POST",
           url: "<?php echo base_url('login/isLogin'); ?>",
           dataType: "json",
           data: dataString,
           success: function(data){
            if (data.response == 'failed') {
                msg = '<div class="alert alert-warning alert-dismissible" role="alert">' +
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                      '<strong>Warning! </strong>' + data.message + '</div>'
                $('#response').html(msg);
            } else {
                msg = '<div class="alert alert-success alert-dismissible" role="alert">' +
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                      '<strong>Success! </strong>' + data.message + '</div>'
                $('#response').html(msg);
                setInterval(function() {
                  uri = data.redirect;
                  self.location = uri;
                }, 1000);
            }
           }
         });
         return false;
      });
   });
</script>
<script type="text/javascript">
	$("#login").validate();
</script>