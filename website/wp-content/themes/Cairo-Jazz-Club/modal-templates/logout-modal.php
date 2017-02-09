<?php
    require_once('../../../../wp-load.php');
?>
<style>
	.mfp-auto-cursor .mfp-content {
		max-width: 340px;
	}
</style>
<div class='mfp-modal' id="login-modal">

	<div class="mfp-modal-content">

		<?php if (has_custom_logo()): ?>
			<div class="col-md-12">
				<div style="padding:35px;">
					<a href="<?php echo site_url()?>" class="logo__link">
						<img style="width:100%" src="<?php echo Mcustomizer::getCustomLogoURL() ?>" alt="Cairo Jazz Club Logo">
					</a>
				</div>
			</div>
		<?php endif; ?>
		<div>
			<a class="btn btn-facebook" style="width:100%" href="">logout</a><br>
		</div>
	</div>

</div>