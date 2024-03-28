<?php
$email_to = 'parasgrover932@gmail.com'; // web admin address - emails sent to this address
$sent_from = 'noreply@mail-ruddy-six.vercel.app'; // must be the domain where the webpage/form is hosted.
$email_subject = 'New Enquiry'; // set email subject
$thankyou_page = '/thank-you.php'; // redirect users to thank you page after submitting the form
if (isset($_POST['submit'])) {
	$name = $_POST['name']; // Name input by user in the form
	$email = $_POST['email']; // Email input by user in the form
	$message = $_POST['message']; // Message input by user in the form
	$phone = $_POST['phone']; // Phone no. input by user in the form

	// Creating the message for sending mail
	$msg = "Message : 
  Name : " . $name . "
  Email : " . $email . "
  Phone no. : " . $phone . "
  Message : " . $message;

	$headers = "from: " . $sent_from . "\n" . //creating headers
		"reply-to: " . $email . "\n" . //creating headers
		"X-Priority: 1\n" . //headers for priority
		"Priority: Urgent\n" . //headers for priority
		"Importance: high"; //set importance

	if (mail($email_to, $email_subject, $msg, $headers)) {  // sending the email
		echo "<script>alert('Mail sent!');</script>"; // Show success alert
		echo '<script>javascript:location.href="' . $thankyou_page . '"</script>';  //Send the people to thank-you page.
	} else {
		echo "<script>alert('Mail was not sent. Please try again later');</script>"; // Show error 
	}
	;
}
?>