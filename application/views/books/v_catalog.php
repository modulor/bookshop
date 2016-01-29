<div class="row">
	<div class="col-md-3">
		<!-- filters -->
		<div class="well">
			<form name="filters_form" action="<?php echo base_url("books/catalog") ?>" method="post">
				<div class="form-group">
					<label for="title"><i class="fa fa-book"></i> Title</label>
					<input type="text" name="title" class="form-control" value="<?php echo $form['title'] ?>" maxlength="255">
				</div>

				<div class="form-group">
					<label for="author"><i class="fa fa-user"></i> Author</label>
					<input type="text" name="author" id="author" class="form-control" value="<?php echo $form['author'] ?>" maxlength="255">
					<span id="author_help" class="text-danger"></span>
				</div>

				<div class="form-group">
					<label for="publication"><i class="fa fa-calendar"></i> Publication</label>
					<input type="text" name="publication" class="form-control datepicker" value="<?php echo $form['publication'] ?>" data-date-end-date="0d">
					<label class="radio-inline">
                        <input type="radio" name="publication_range" value="before" checked> Before
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="publication_range" value="after" <?php if($form['publication_range']=="after"){ print "checked"; } ?>> After
                    </label>
				</div>

				<div class="form-group">
					<label for="price"><i class="fa fa-dollar"></i> Price</label>
					<input type="text" name="price" id="price" class="form-control" value="<?php echo $form['price'] ?>" maxlength="11">
					<span class="text-danger" id="price_help"></span>
					<label class="radio-inline">
                        <input type="radio" name="price_range" value="less" checked> Less than
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="price_range" value="greater"> Greater than
                    </label>
				</div>

				<button class="btn btn-primary btn-block" id="filters_btn"><i class="fa fa-search"></i> Search</button>
			</form>
		</div>
		<!-- /filters -->
	</div>
	<div class="col-md-9">
		<?php 
			if(count($book_list)>0):
				foreach($book_list as $book):
		?>
		<div class="book_row">
			<div class="row">		
				<div class="col-md-2">
					<img src="<?php if($book->image_url!=""){ echo $book->image_url; }else{ echo base_url("assets/img/no-picture.png"); } ?>" class="img-responsive">
				</div>
				<div class="col-md-7">
					<h3 class="media-heading"><?php echo $book->title ?></h3>
					
					<?php
						// display author(s)
						foreach($authors['book_'.$book->id_book] as $author): 
							echo "<p><strong>".$author['fullname']."</strong></p>";
						endforeach;
					?>

					<p class="muted">Price: $<?php echo $book->price ?></p>
					<a href="<?php print base_url("books/edit/".$book->id_book) ?>" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>	
				</div>
			</div>
		</div>
		<?php 
				endforeach;
			else:
				echo "<h2 class='text-center'>:( Sorry, we didn't find any book with your criteria...</h2>";
			endif;
		?>
	</div>
</div>

<script>
	window.onload = function () { 

		$('.datepicker').datepicker({
            language: 'es',
            format: 'yyyy-mm-dd'
        });

	}
</script>