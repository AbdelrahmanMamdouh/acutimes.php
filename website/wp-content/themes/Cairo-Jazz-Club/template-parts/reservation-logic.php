<?php
$FEUP = new FEUP_User();

//response generation function
$response = "";
//function to generate response
if (!function_exists('generate_response')) {
	function generate_response($type, $message) {
		global $response;
		if ($type == "success") {
			$response = "<div class='success'>{$message}</div>";
		} else {
			$response = "<div class='error'>{$message}</div>";
		}
	}
}
//response messages
$not_human = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$message_unsent = "Message was not sent. Try Again.";
$message_sent = "Thanks! Your message has been sent.";
// user posted variables
$attendees = filter_input(INPUT_POST, 'attendees', FILTER_SANITIZE_SPECIAL_CHARS);
if (!isset($attendees) || $attendees == NULL || !$attendees) {
	generate_response("error", $missing_content);
} else {
	if ($FEUP->Is_Logged_In()) {
		$fullName = $FEUP->Get_Field_Value('First Name') . " " . $FEUP->Get_Field_Value('Last Name');
		$userEmail = $FEUP->Get_Username();
		$eventId = filter_input(INPUT_POST, 'eventId', FILTER_SANITIZE_SPECIAL_CHARS);
		$eventTitle = get_the_title($eventId);
		$eventLink = get_permalink($eventId);
		$message = "User Full Name: {$fullName} \nUser Email: {$userEmail}\nEvent Title : {$eventTitle}\nEvent Link :{$eventLink}\nReservation # : {$attendees}";
		//var_dump($message);
//php mailer variables

		$to = array(get_option('admin_email'), "magdy.abass@gmail.com");
		$subject = "Event Reservation";
		$headers = "Reply-To: {$fullName}<{$userEmail}> ";
		$sent = wp_mail($to, $subject, $message, $headers);

		if ($sent)
			generate_response("success", $message_sent); //message sent!
		else
			generate_response("error", $message_unsent); //message wasn't sent
	}
}
?>

