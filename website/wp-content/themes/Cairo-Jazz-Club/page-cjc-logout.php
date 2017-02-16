<?php

global $FBR_User_init;

$FBR_User_init->fbLogout();

$premalink = site_url();

header("Location: {$premalink}");