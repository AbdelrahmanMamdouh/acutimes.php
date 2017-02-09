<?php

global $init;

$init->fbLogout();

$premalink = site_url();

header("Location: {$premalink}");