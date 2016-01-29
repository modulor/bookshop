<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
	  		<h1>Add a new author</h1>
		</div>

		<?php if(isset($saved)): ?>

		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  	<strong>Success!</strong> The new author has been added.
		</div>

		<?php endif; ?>

		<div class="well">
			<form action="<?php echo base_url("authors/add") ?>" method="post" onsubmit="return validate_author();">
				
				<div class="form-group">
					<label for="name">* Name</label>
					<input type="text" name="name" id="name" class="form-control" maxlength="255">
					<p id="name_help" class="text-danger"></p>
				</div>				

				<div class="form-group">
					<label for="lastname">* Lastname</label>
					<input type="text" name="lastname" id="lastname" class="form-control" maxlength="255">
					<p id="lastname_help" class="text-danger"></p>
				</div>

				<div class="form-group">
					<label for="birthday">Birthday</label>
					<input type="text" name="birthday" id="birthday" class="form-control datepicker" data-date-end-date="0d" maxlength="10">
					<p id="birthday_help" class="text-danger"></p>
				</div>

				<div class="form-group">
					<p class="help-block">* required</p>
				</div>

				<p id="search_animation" class="text-center"></p>

				<div class="text-center">
					<button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<img>

<script>
	window.onload = function () { 

		$(function(){

			// trigger datepicker
			$('.datepicker').datepicker({
	            language: 'es',
	            format: 'yyyy-mm-dd'
	        });
		})

	}
</script>