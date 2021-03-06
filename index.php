<?php
/*------------------------------------------------
// by: Gene Dodge
//
//  This script contains all of the HTML for the 
//    user interface side of things. It serves as
//    a templated HTML page and calls the proper
//    php functions based on what the user is doing.
//
//  Extends:
//    NONE
//
//  Extended by:
//    NONE
//
//  Requires:
//   LoginWebInterface.php
//   PatientWebInterface.php
//   DoctorWebInterface.php
//
//  Required by:
//    NONE
//
//  Attributes:
//    $_SESSION  // holds session information for use by other scripts
//
//  Methods:
//    callInterface(string)  // calls appropriate interface script
//                           //  based on what the user is doing
------------------------------------------------*/

// --------- Session ---------
// start a session for the user if one does not exist
//
//  NOTE: These 3 lines of code need to be at the top of this
//    php script as well as the following BEFORE any other code:
//    LoginWebInterface.php
//    PatientWebInterface.php
//    DoctorWebInterface.php
//
//  The $_SESSION array is used to keep track of who is logged in
//  within the functionality of login, doctor, or patient
//  various $_SESSION indices may be set and used.
//
//  $_SESSION['user_type'] is checked within the main body
//  of index.php to determine which of the following functions
//  to call. (see the if else statement in the body section)
//
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


// if the user clicked the logout button,
//   log them out and refresh the page
if (! empty($_POST['logout'])) {
	$_SESSION['current_user'] = NULL;
	$_SESSION['user_type'] = NULL;
	header('Location: http://engineers-withoutborders.rhcloud.com/index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		EWoB : Connecting People to the Care They Deserve
	</title>
	<link rel="stylesheet" href="project.css" />
</head>
<body>
	<div class="top_menu">
		<?php
		if (! empty($_SESSION['current_user'])) {
		?>		
		<div class="welcome_user">
			Welcome: <?php echo " " . $_SESSION['current_user']; ?>
			<form action="index.php" method="post">
				<input type="hidden" name="logout" value="1" />
				<input class="logout_button" type="submit" value="logout" />
			</form>
		</div>
		<?php
		} // close of if statement for when the user is logged in.
		?>
	</div>
	<?php
		// based on whether or not the user has logged in
		//  and what type of user it is, do the appropriate
		//  action (show appropriate html page)
		
		if (empty($_SESSION['user_type'])) {
			// if there is not yet a user, call the login script
			//------Shikha's Code - to get to LoginWebInterface----------
			echo "<CENTER><form action=\"LoginWebInterface.php\" method=\"post\">";
			echo "<br><br>Welcome! Please login to begin.<br>";
			echo "<input type=\"submit\" value=\"Login\">";
			echo "</form></CENTER>";
			//--------------------End Shikha's Code ----------------------
			//include 'LoginWebInterface.php';
		} else {
			if ($_SESSION['user_type'] == 'DOCTOR') {
			// if the user has logged in and it is a Doctor,
			//   call the doctor interface function
				include 'DoctorWebInterface.php';
			} else if ($_SESSION['user_type'] == 'PATIENT') {
			// if the user has logged in and it is a patient,
			//   call the patient interface function
				include 'PatientWebInterface.php';
			} else {
				// if the session has user_type stored as something else,
				//   let the user know there was an error and attempt to reset
				//   by asking them to log out
				
				echo "We're sorry, there was an error. Please close this page and try again.<br /> You may need to enable cookies for this site to work.";
			}
		}
	?>
</body>
</html>