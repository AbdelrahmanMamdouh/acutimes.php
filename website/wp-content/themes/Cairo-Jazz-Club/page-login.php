<?php

$events = get_page_by_title('events');

global $FBR_User_init;

try {
    $FBR_User_init->getUserInfo();
} catch (Exception $exc) {
    
}
$premalink = (isset($_SESSION['return_to_url'])) ? $_SESSION['return_to_url'] : get_the_permalink($events->ID);

header("Location: {$premalink}");