<div class='mfp-hide mfp-modal' id="login-modal" style="max-width: 340px !important">

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
			<a class="btn btn-facebook" style="width:100%" href="<?php echo htmlspecialchars($init->getLoginURl(get_the_permalink())) ?>">Sign in with facebook</a><br>
		</div>
		<div>
			<small> 
				<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
				We don't post anything to facebook 
			</small>
		</div>
	</div>

</div>