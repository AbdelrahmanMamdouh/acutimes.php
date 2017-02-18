<?php

FBR_User::ActiveUser()->fbLogout();

$premalink = site_url();

header("Location: {$premalink}");