<?php

  session_start();

  if (isset($_SESSION['fb_access_token'])) { //if you have more session-vars that are needed for login, also check if they are set and refresh them as well

    $_SESSION['fb_access_token'] = $_SESSION['fb_access_token'];

  }

  echo $_SESSION['fb_access_token'];

?>