<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
	  		<h1>Add a new book <small>to the catalog</small></h1>
		</div>

		<?php if(isset($saved)): ?>

		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  	<strong>Success!</strong> The new book has been added.
		</div>

		<?php endif; ?>

		<div class="well">
			<form action="<?php echo base_url("books/add") ?>" method="post" onsubmit="return validate_book();">
				
				<div class="form-group">
					<label for="title">* Title</label>
					<input type="text" name="title" id="title" class="form-control" maxlength="255">
					<p id="title_help" class="text-danger"></p>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="id_author">* Author</label>
							<select name="id_author[]" id="id_author" class="form-control chosen-select" multiple data-placeholder="select the author(s)">
								<option value=""></option>
								<?php foreach($author_list as $author): ?>
								<option value="<?php echo $author->id_author ?>"><?php echo $author->name." ".$author->lastname ?></option>
								<?php endforeach; ?>
							</select>
							<p id="id_author_help" class="text-danger"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="publication">* Publication</label>
							<input type="text" name="publication" id="publication" class="form-control datepicker" data-date-end-date="0d" maxlength="10">
							<p id="publication_help" class="text-danger"></p>
						</div>
					</div>
				</div>		
		
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ISBN">* ISBN</label>
							<input type="text" name="ISBN" id="ISBN" class="form-control" maxlength="13" onblur="Javascript:validate_isbn();">
							<p id="ISBN_help" class="text-danger"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="price">* Price</label>
							<input type="text" name="price" id="price" class="form-control numeric" maxlength="11">
							<p id="price_help" class="text-danger"></p>
						</div>
					</div>
				</div>			

				<div class="form-group">
					<label for="image_url">Image URL</label>
					<input type="text" name="image_url" id="image_url" class="form-control" maxlength="255">
					<p id="image_url_help" class="text-danger"></p>
				</div>

				<div class="form-group">
					<p class="help-block">* required</p>
				</div>

				<p id="search_animation" class="text-center"></p>

				<div class="text-center">
					<button id="btn_submit_book" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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

	        // trigger only number on input
	        $(".numeric").numeric();

	        // select multiple authors      
	        $('.chosen-select').chosen();
	        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });

		})

	}
</script>