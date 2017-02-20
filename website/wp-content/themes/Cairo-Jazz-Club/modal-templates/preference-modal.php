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


<div class=' mfp-modal' id="preference-modal">

	<div class='modal-head'>
		<img src='<?php echo get_template_directory_uri() ?>/img/modal-head.png' alt='' class='modal-image'>

		<div class='modal-head__content'>
			<div class='media-box'>
					<div class='media-box__img'>
						<div class='circle circle--sm'>

				            <div class='circle__content'>


				                <img src='<?php echo $FBR_User_data['img'] ?>' alt=''>
							
				            </div>
				            
				        </div>
					</div>

					<div class='media-box__content'>
						<h1 class='modal-head__title'><?php echo $FBR_User_data['name'] ?></h1>
					</div>
                        </div>
                </div>

				
        </div>
	<div class="mfp-modal-content">

	<form id="form_prefs_modal">
	<div class="form-group">
		<div class="input input--reverse">
			<!--<label for="email">Type Your Email</label>-->
			<div class="row footer-form-in">
            	<div class="col-sm-6">
					<input type="email" class="form-control" id="foote_email" placeholder='Type Your Email' required value='<?php echo $FBR_User_data['email'] ?>'>
            	</div>
                <div class="col-sm-6">
					<input type="email" class="form-control" id="foote_email" placeholder='Type Your Phone NO.' required value='<?php echo $FBR_User_data['email'] ?>'>
            	</div>
                <div class="col-sm-6">
					<input type="email" class="form-control" id="foote_email" placeholder='Type Your Address' required value='<?php echo $FBR_User_data['email'] ?>'>
            	</div>
                <div class="col-sm-6">
					<input type="email" class="form-control" id="foote_email" placeholder='Type Your Age' required value='<?php echo $FBR_User_data['email'] ?>'>
            	</div>
            </div>
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
                