<?php
/**
 * Contact Form Template
 *
 * @package Chum
 */
?>
<?php
	if(isset($_POST['submitted'])) {
	
		if(trim($_POST['senderName']) === '') {
			$nameError = 'Your name is important, please fill it out.';
			$hasError = true;
		} else {
			   $name = trim($_POST['senderName']);
		}
	 
		if(trim($_POST['senderEmail']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['senderEmail']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['senderEmail']);
		}

		if(trim($_POST['senderSubject']) === '') {
			$subjectError = 'Please enter subject of your inquiry.';
			$hasError = true;
		} else {
			   $senderSubject = trim($_POST['senderSubject']);
		}
	 
		if(trim($_POST['senderMessage']) === '') {
			$messageError = 'Please enter a message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
			   $emailsubject = stripslashes(trim($_POST['senderMessage']));
			} else {
			   $emailsubject = trim($_POST['senderMessage']);
			}
		}
	 
		if(!isset($hasError)) {
			
			$emailTo = get_option('tz_email');
			
			if (!isset($emailTo) || ($emailTo == '') ) {
				$emailTo = get_option('admin_email');
			}

			$subject = '[WPTheme] - '.$senderSubject;
			$body = "Sender Name: $name \n\nSender Email: $email \n\nSender Message: $emailsubject";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
 
			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	}
?>

<div class="contact-form-container">
	<h2 class="entry-title">Send us your thoughts</h2>
	<?php if(isset($emailSent) && $emailSent == true) { ?>
		<div class="contactFormMessage">
			<p class="success-msg">Thanks, your email was sent successfully.</p>
		</div>
	<?php } else { ?>

		<?php if( isset( $hasError ) ) { ?>
			<div class="contactFormMessage">
				<p class="error-msg">Sorry an error has occured. Kindly check the required fields.</p>
			</div>
		<?php } ?>

		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
			<p>
				<label for="senderName">Name <i>*</i></label>
				<input type="text" name="senderName" id="senderName" value="<?php if(isset($_POST['senderName'])) echo $_POST['senderName'];?>" class="required requiredField" />
				<?php if( $nameError != '' ) { ?>
					<span class="error-msg"><?php echo $nameError; ?></span>
				<?php } ?>
			</p>

			<p>
				<label for="senderEmail">Email <i>*</i></label>
				<input type="email" name="senderEmail" id="senderEmail" value="<?php if(isset($_POST['senderEmail']))  echo $_POST['senderEmail'];?>" class="required requiredField email" />
				<?php if( $emailError != '' ) { ?>
					<span class="error-msg"><?php echo $emailError; ?></span>
				<?php } ?>
			</p>

			<p>
				<label for="senderSubject">Subject <i>*</i></label>
				<input type="text" name="senderSubject" id="senderSubject" value="<?php if(isset($_POST['senderSubject'])) echo $_POST['senderSubject'];?>" class="required requiredField" />
				<?php if( $subjectError != '' ) { ?>
					<span class="error-msg"><?php echo $subjectError; ?></span>
				<?php } ?>
			</p>

			<p>
				<label for="senderMessage">Message <i>*</i></label>
				<textarea name="senderMessage" id="senderMessage" class="required requiredField"><?php if(isset($_POST['senderMessage'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['senderMessage']); } else { echo $_POST['senderMessage']; } } ?></textarea>
				<?php if( $messageError != '' ) { ?>
					<span class="error-msg"><?php echo $messageError; ?></span>
				<?php } ?>
			</p>
			<p>
				<button type="submit">Send Message</button>
				<input type="hidden" name="submitted" id="submitted" value="true" />
			</p>
		</form>
	<?php } ?>
</div>