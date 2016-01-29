<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
	  		<h1>Edit existing book</h1>
		</div>

		<?php if(isset($saved)): ?>

		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  	<strong>Success!</strong> The book has been updated.
		</div>		

		<?php endif; ?>

		<div class="well">
			<form id="filters" action="<?php echo base_url("books/edit/".$id_book) ?>" method="post" onsubmit="return validate_book('edit');">
				
				<div class="form-group">
					<label for="title">* Title</label>
					<input type="text" name="title" id="title" class="form-control" maxlength="255" value="<?php echo $book->title ?>">
					<p id="title_help" class="text-danger"></p>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="id_author">* Author</label>
							<select name="id_author[]" id="id_author" class="form-control chosen-select" multiple data-placeholder="select the author(s)">
								<option value=""></option>
								<?php 

									foreach($author_list as $row):

										// select the author(s) saved
										$selected = "";
										foreach($the_authors["book_".$book->id_book] as $field){ 
											if($row->id_author==$field['id_author'])
												$selected = "selected";
										}
								?>

									<option <?php print $selected ?> value="<?php echo $row->id_author ?>"><?php echo $row->name." ".$row->lastname ?></option>

								<?php 
									endforeach; 
								?>
							</select>
							<p id="id_author_help" class="text-danger"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="publication">* Publication</label>
							<input type="text" name="publication" id="publication" class="form-control datepicker" data-date-end-date="0d" maxlength="10" value="<?php echo $book->publication ?>">
							<p id="publication_help" class="text-danger"></p>
						</div>
					</div>
				</div>		
		
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="ISBN">* ISBN</label>
							<input type="text" name="ISBN" id="ISBN" class="form-control" disabled maxlength="13" value="<?php echo $book->ISBN ?>">
							<input type="hidden" name="isbn_old" value="<?php echo $book->ISBN ?>">
							<p id="ISBN_help" class="text-danger"></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="price">* Price</label>
							<input type="text" name="price" id="price" class="form-control numeric" maxlength="11" value="<?php echo $book->price ?>">
							<p id="price_help" class="text-danger"></p>
						</div>
					</div>
				</div>			

				<div class="form-group">
					<label for="image_url">Image URL</label>
					<input type="text" name="image_url" id="image_url" class="form-control" maxlength="255" value="<?php echo $book->image_url ?>">
					<p id="image_url_help" class="text-danger"></p>
				</div>

				<div class="form-group">
					<p class="help-block">* required</p>
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

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