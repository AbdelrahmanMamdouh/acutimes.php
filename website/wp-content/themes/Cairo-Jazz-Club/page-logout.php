<?php

FBR_FBhandler::Init()->fbLogout();

$premalink = site_url();

header("Location: {$premalink}");