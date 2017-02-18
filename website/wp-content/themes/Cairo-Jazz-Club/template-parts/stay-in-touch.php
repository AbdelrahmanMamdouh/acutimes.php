<?php
/**
 * Template part for displaying Stay in Touch
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */
 global $FBR_User_data;
$CJC_genres = get_terms( 'genre' );
?>

<!--<p>Integer vitae libero ac risus egestas placerat.</p>-->

<form action="/">
	<div class="form-group">
		<div class="input input--reverse">
			<!--<label for="email">Type Your Email</label>-->
			<input type="email" class="form-control" id="foote_email" placeholder='Type Your Email' value='<?php echo $FBR_User_data['email'] ?>'>
		</div>
	</div>
	<h3>Choose your genre</h3>
	<div class="row">

		<?php foreach($CJC_genres as $gen) { ?>

			<div class="col-md-4 col-sm-6" style="overflow: hidden; max-height: 2.5rem; margin: 8px 0">
				<p>
					<input type="checkbox" 
						id="<?php echo $gen->term_id ?>" 
						<?php if(isset($FBR_User_data['genre_bol'][$gen->term_id])) echo 'checked' ?>
					>
					<label for="<?php echo $gen->term_id ?>" ><?php echo $gen->name ?></label>
				</p>
			</div>
			
		<?php } ?>

	</div>

	<submit class="btn btn-supporting btn-wide">Submit</submit>
</form>