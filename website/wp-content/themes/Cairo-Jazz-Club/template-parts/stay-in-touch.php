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

<form id="form_prefs">
	<div class="form-group">
		<div class="input input--reverse">

			<div class="row footer-form-in">
				<div class="col-sm-6">
					<input type="email" name="user_fields" class="form-control" id="foote_email" placeholder='Type Your Email' required value='<?php echo $FBR_User_data['email'] ?>'>
				</div>
				<div class="col-sm-6">
					<input type="tel" name="user_fields" class="form-control" id="foote_phone" placeholder='Type Your Phone NO.' required value='<?php echo $FBR_User_data['phone'] ?>'>
				</div>
				<div class="col-sm-6">
					<input type="text" name="user_fields" class="form-control" id="foote_address" placeholder='Type Your Address' value='<?php echo $FBR_User_data['address'] ?>'>
				</div>
				<div class="col-sm-6">
					<input type="number" name="user_fields" class="form-control" id="foote_age" placeholder='Type Your Age' min=21 max=100 required value='<?php echo $FBR_User_data['age'] ?>'>
				</div>
			</div>

		</div>
	</div>
	<h3>Choose your genre</h3>
	<div class="row">

		<?php foreach($CJC_genres as $gen) { ?>

			<div class="col-md-3 col-sm-4 footer-select-in" style="overflow: hidden; max-height: 2.5rem; margin: 4px 0">
				<p>
					<input type="checkbox" 
						id="<?php echo $gen->term_id ?>" 
						name="pref_check"
						<?php if(isset($FBR_User_data['genre_bol'][$gen->term_id])) echo 'checked' ?>
					>
					<label for="<?php echo $gen->term_id ?>" ><?php echo $gen->name ?></label>
				</p>
			</div>
			
		<?php } ?>

	</div>

	<submit class="btn btn-supporting btn-wide" onclick='Forms.Prefs("<?php echo get_site_url() . '/wp-json/fbr/preference/user/' ?>")'>Submit</submit>
</form>
<div id="form_prefs_responce">

</div>