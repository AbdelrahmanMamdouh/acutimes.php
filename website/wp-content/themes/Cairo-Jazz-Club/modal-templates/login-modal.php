<?php
    require_once('../../../../wp-load.php');
?>
<div class='mfp-modal' id="login-modal" style='max-width: 550px;'>
        <div class="mfp-modal-content">
        <h3 class="modal-login-header">FaceBook</h3>
            <div>loging to face book</div>
        <a href="http://localhost/website/wp-login.php?loginFacebook=1&redirect=http://localhost/website" onclick="window.location = 'http://localhost/website/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"><img src="<?php echo get_template_directory_uri()?>/img/facebook-sign-in.png" /></a>
        </div>
</div>
