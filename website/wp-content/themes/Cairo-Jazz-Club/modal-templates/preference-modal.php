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
    <h5>To finalize your registration please fill in the missing information, please remember that your information is confidential and will not be passed on to a third party.</h5>
    <br>
	<div class="form-group">
		<div class="input input--reverse">

			<div class="row footer-form-in">
				<div class="col-sm-6">
					<input type="email" name="user_fields_modal" class="form-control" id="foote_email" placeholder='Type Your Email' required value='<?php echo $FBR_User_data['email'] ?>'>
				</div>
				<div class="col-sm-6">
					<input type="tel" name="user_fields_modal" class="form-control" id="foote_phone" placeholder='Type Your Phone NO.' required value='<?php echo $FBR_User_data['phone'] ?>'>
				</div>
				<div class="col-sm-6">
					<input type="text" name="user_fields_modal" class="form-control" id="foote_address" placeholder='Type Your Address' value='<?php echo $FBR_User_data['address'] ?>'>
				</div>
				<div class="col-sm-6">
					<input type="text" name="user_fields_modal" class="form-control dob-in" data-theme="cjctheme"  data-modal="true"  id="foote_age" placeholder='Date Of Birth'  data-default-date="<?php echo $FBR_User_data['age'] ?>"  required value='<?php echo $FBR_User_data['age'] ?>'>
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
						name="pref_check_modal"
						<?php if(isset($FBR_User_data['genre_bol'][$gen->term_id])) echo 'checked' ?>
					>
					<label for="<?php echo $gen->term_id ?>" ><?php echo $gen->name ?></label>
				</p>
			</div>
			
		<?php } ?>

	</div>
    <br>
	<div class="text-center">
		<submit class="btn btn-supporting btn-wide" onclick='Forms.PrefsModal("<?php echo get_site_url() . '/wp-json/fbr/preference/user/' ?>")'>Submit</submit>
    </div>
</form>

<script>
    jQuery('.dob-in').dateDropper();
</script>

<div id="form_prefs_responce_modal">

</div>
	
	
	</div>

</div>
                
