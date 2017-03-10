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


<div class='mfp-hide mfp-modal' id="footer-preference-modal">
	<div class="mfp-modal-content">

		<div id="form_prefs_modal">

			<h3>Choose your genre</h3>
			<div class="row">

				<?php foreach($CJC_genres as $gen) { ?>

					<div class="col-md-3 col-sm-4 footer-select-in" style="overflow: hidden; max-height: 2.5rem; margin: 4px 0">
						<p>
							<input type="checkbox" 
								id="<?php echo $gen->term_id ?>" 
								name="pref_check_modal"
								<?php if(isset($FBR_User_data['genre_bol'][$gen->term_id])) echo 'checked' ?>
							>
							<label for="<?php echo $gen->term_id ?>" ><?php echo $gen->name ?></label>
						</p>
					</div>
					
				<?php } ?>

			</div>

		</div>
		<div id="form_prefs_responce_modal"></div>

	</div>
</div>
                
