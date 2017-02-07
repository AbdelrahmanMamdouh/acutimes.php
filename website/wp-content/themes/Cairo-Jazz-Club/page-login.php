<?php

$events = get_page_by_title('events');

$fb = new fb_login();

try {
    $fb->getUserInfo();
} catch (Exception $exc) {
    
}
$premalink = (isset($_SESSION['return_to_url'])) ? $_SESSION['return_to_url'] : get_the_permalink($events->ID);

header("Location: {$premalink}");