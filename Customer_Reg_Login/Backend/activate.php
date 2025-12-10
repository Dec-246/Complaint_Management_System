<?php
require 'Includes/db.connect.php';

// check if the email and code exists...
if (isset($_GET['email'], $_GET['code']) && !empty($_GET['email']) && !empty($_GET['code'])) {
	if ($stmt = $con->prepare('SELECT * FROM customer_accounts WHERE email = ? AND activation_code = ?')) {
		$stmt->bind_param('ss', $_GET['email'], $_GET['code']);
		$stmt->execute();
		// Store result, check back if account already in DB
		$stmt->store_result();

		if ($stmt->num_rows > 0) {

			// Account exists with requested email and code.
			if ($stmt = $con->prepare('UPDATE customer_accounts SET activation_code = ? WHERE email = ? AND activation_code = ?')) {

				// Set new activation code to 'activated'... lets us see if user account activated.
				$newcode = 'activated';
				$stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
				$stmt->execute();
				// Output success message

				header('Location: ../Customer_Reg_Login/Frontend/activated.php');
				//echo 'Your account is now activated! You can now <a href="login.php">login</a>!';
			}
		} else {
			header('Location: ../Customer_Reg_Login/Frontend/alreadyActivated.php');
			//echo 'The account is already activated or doesn\'t exist!';
		}
	}
} else {
	echo 'Invalid request!';
}
?>