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

$sql = $wpdb->prepare( "SELECT * FROM `cjc_term_taxonomy` LEFT JOIN cjc_terms ON cjc_term_taxonomy.term_id = cjc_terms.term_id WHERE cjc_term_taxonomy.taxonomy = 'genre' AND cjc_term_taxonomy.description != 'Genres parent container'" );
$results = $wpdb->get_results( $sql );
?>


<div class='mfp-hide mfp-modal' id="footer-preference-modal">
	<div class="mfp-modal-content">

		<div id="form_prefs">

			<h3>Choose your genre</h3>
			<div class="row">

				<?php foreach($results as $res) { ?>

					<div class="col-md-3 col-sm-4 footer-select-in" style="overflow: hidden; max-height: 2.5rem; margin: 4px 0">
						<p>
							<input type="checkbox" 
								id="<?php echo $res->term_id ?>" 
								name="pref_check"
								<?php if(isset($FBR_User_data['genre_bol'][$res->term_id])) echo 'checked' ?>
							>
							<label for="<?php echo $res->term_id ?>" ><?php echo $res->name ?></label>
						</p>
					</div>
					
				<?php } ?>

			</div>

		</div>
		</div>
                
