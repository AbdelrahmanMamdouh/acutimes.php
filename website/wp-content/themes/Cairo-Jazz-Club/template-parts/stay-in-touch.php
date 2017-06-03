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

<h2 class="rounded">
	<?php if ($FBR_User_data['is_loged'] ){ ?> 
		Update your info
	<?php } else { ?>
		Stay in touch
	<?php } ?>
</h2>
<p class="MessageResponse"></p>

<form id="form_prefs">
	<div class="form-group">
		<div class="input input--reverse">

			<div class="row footer-form-in">
				<div class="col-sm-12">
					<input type="email" name="user_fields" class="form-control" id="foote_email" placeholder='Type Your Email' required value='<?php echo $FBR_User_data['email'] ?>'>
				</div>
				<div class="col-sm-12">
					<input type="text" name="user_fields" class="form-control" id="foote_address" placeholder='Type Your Address' value='<?php echo $FBR_User_data['address'] ?>'>
				</div>
				<div class="col-sm-12">
					<input type="tel" name="user_fields" class="form-control" id="foote_phone" placeholder='Type Your Phone NO.' required value='<?php echo $FBR_User_data['phone'] ?>'>
				</div>
				<div class="col-sm-12">
					<input type="text" name="user_fields" class="form-control dob-in" data-theme="cjctheme"  data-modal="true"   id="foote_age" placeholder='Date Of Birth' data-default-date="<?php echo $FBR_User_data['age'] ?>" required value='<?php echo $FBR_User_data['age'] ?>'>
				</div>
				<div class="col-sm-12">
					<a class="modal-link-inline chyourg" href="#footer-preference-modal">Choose your genre</a>
				</div>
			</div>

		</div>
	</div>

	<submit class="btn btn-supporting btn-wide" onclick='Forms.Prefs("<?php echo get_site_url() . '/wp-json/fbr/preference/user/' ?>")'>
    
		<?php if ($FBR_User_data['is_loged'] ) { ?> 
			Update
		<?php } else { ?>
			Submit
		<?php } ?>
    
    </submit>

    <?php require_once(locate_template('modal-templates/footer-preference-modal.php')); ?>
</form>
<div id="form_prefs_responce">

</div>