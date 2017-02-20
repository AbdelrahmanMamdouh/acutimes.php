<?php
/**
 * Template part for displaying Stay in Touch
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */
include('../../../../wp-load.php');
global $FBR_User_data;
$CJC_genres = get_terms( 'genre' );
?>


<div class='mfp-hide mfp-modal' id="preference-modal" style="display : block !important">

	<div class="mfp-modal-content">

	<form id="form_prefs_modal">
	<div class="form-group">
		<div class="input input--reverse">
			<!--<label for="email">Type Your Email</label>-->
			<input type="email" class="form-control" id="foote_email" placeholder='Type Your Email' required value='<?php echo $FBR_User_data['email'] ?>'>
		</div>
	</div>
<h3>Choose your genre</h3>
	<div class="row">

		<?php foreach($CJC_genres as $gen) { ?>

			<div class="col-md-4 col-sm-6" style="overflow: hidden; max-height: 2.5rem; margin: 8px 0">
				<p>
					<input type="checkbox" 
						id="<?php echo $gen->term_id ?>" 
						name="pref_check_modal"
					>
					<label for="<?php echo $gen->term_id ?>" ><?php echo $gen->name ?></label>
				</p>
			</div>
			
		<?php } ?>

	</div>

	<submit class="btn btn-supporting btn-wide" onclick='Forms.PrefsModal("<?php echo get_site_url() . '/wp-json/fbr/preference/user/'.$FBR_User_data['id'] ?>")'>Submit</submit>
</form>
<div id="form_prefs_responce_modal">

</div>
	
	
	</div>

</div>