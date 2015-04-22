<?php

/*------------------------------------------------
//  by: Shikha Mehta and Alisha Geis
//
//  Extends:
//  None.
//
//  Extended by:
//  None.
//
//
//  Extended by:
//  None.
//
//  Required by:
//  None.
//
//  Attributes:
//  $_SESSION.  // holds session information for use by other scripts.
//
//
------------------------------------------------*/ 

	/*---OLD TEMPLATE CODE:	
	if ($_POST['symptom1'])
	{
		PatientController -> submitSymptoms()
		if (submit_success)
		{
			//symptoms submitted
			//OKAY button
			$_SESSION['user_type'] = "";
		}
		else
		{
			//there was an error
			//TRY AGAIN button
		}
	}
	
	<form method = POST action = index.php>
	//all symptom stuff
	</form>	
	---END TEMPLATE*/

// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);



if (empty($_POST['Symptom1']))
{
?>
	<h2><CENTER> Welcome <?php echo $_SESSION['current_user']; ?>.  Please enter your symptoms on a scale of 1 to 10 with 10 being most severe.<br></h2>
	<br><br>
	<form action="index.php" method="post">
	<h2>Are you experiencing any pain?</h2>
	<input type="radio" name="Symptom1" value="1"> 1 </input>
	<input type="radio" name="Symptom1" value="2"> 2 </input>
	<input type="radio" name="Symptom1" value="3"> 3 </input>
	<input type="radio" name="Symptom1" value="4"> 4 </input>
	<input type="radio" name="Symptom1" value="5"> 5 </input>
	<input type="radio" name="Symptom1" value="6"> 6 </input>
	<input type="radio" name="Symptom1" value="7"> 7 </input>
	<input type="radio" name="Symptom1" value="8"> 8 </input>
	<input type="radio" name="Symptom1" value="9"> 9 </input>
	<input type="radio" name="Symptom1" value="10"> 10 </input>

	<br><br>
	<h2>Are you drowsy?</h2>
	<input type="radio" name="Symptom2" value="1"> 1 </input>
	<input type="radio" name="Symptom2" value="2"> 2 </input>
	<input type="radio" name="Symptom2" value="3"> 3 </input>
	<input type="radio" name="Symptom2" value="4"> 4 </input>
	<input type="radio" name="Symptom2" value="5"> 5 </input>
	<input type="radio" name="Symptom2" value="6"> 6 </input>
	<input type="radio" name="Symptom2" value="7"> 7 </input>
	<input type="radio" name="Symptom2" value="8"> 8 </input>
	<input type="radio" name="Symptom2" value="9"> 9 </input>
	<input type="radio" name="Symptom2" value="10"> 10 </input>
	
	<br><br>
	<h2>Do you have feelings of nausea?</h2>
	<input type="radio" name="Symptom3" value="1"> 1 </input>
	<input type="radio" name="Symptom3" value="2"> 2 </input>
	<input type="radio" name="Symptom3" value="3"> 3 </input>
	<input type="radio" name="Symptom3" value="4"> 4 </input>
	<input type="radio" name="Symptom3" value="5"> 5 </input>
	<input type="radio" name="Symptom3" value="6"> 6 </input>
	<input type="radio" name="Symptom3" value="7"> 7 </input>
	<input type="radio" name="Symptom3" value="8"> 8 </input>
	<input type="radio" name="Symptom3" value="9"> 9 </input>
	<input type="radio" name="Symptom3" value="10"> 10 </input>
	
	<br><br>
	<h2>Do you feel anxious?</h2>
	<input type="radio" name="Symptom4" value="1"> 1 </input>
	<input type="radio" name="Symptom4" value="2"> 2 </input>
	<input type="radio" name="Symptom4" value="3"> 3 </input>
	<input type="radio" name="Symptom4" value="4"> 4 </input>
	<input type="radio" name="Symptom4" value="5"> 5 </input>
	<input type="radio" name="Symptom4" value="6"> 6 </input>
	<input type="radio" name="Symptom4" value="7"> 7 </input>
	<input type="radio" name="Symptom4" value="8"> 8 </input>
	<input type="radio" name="Symptom4" value="9"> 9 </input>
	<input type="radio" name="Symptom4" value="10"> 10 </input>
	
	<br><br>
	<h2>Do you feel depressed?</h2>
	<input type="radio" name="Symptom5" value="1"> 1 </input>
	<input type="radio" name="Symptom5" value="2"> 2 </input>
	<input type="radio" name="Symptom5" value="3"> 3 </input>
	<input type="radio" name="Symptom5" value="4"> 4 </input>
	<input type="radio" name="Symptom5" value="5"> 5 </input>
	<input type="radio" name="Symptom5" value="6"> 6 </input>
	<input type="radio" name="Symptom5" value="7"> 7 </input>
	<input type="radio" name="Symptom5" value="8"> 8 </input>
	<input type="radio" name="Symptom5" value="9"> 9 </input>
	<input type="radio" name="Symptom5" value="10"> 10 </input>
	
	<br><br>
	<input type="submit">
	</CENTER>
	</form>
<?php
}
else
{
	require 'PatientController.php';
	$Patcontrollerobject = new PatientController;
	$Patcontrollerobject->submitSymptoms($_SESSION['current_user'], $_POST['Symptom1'], $_POST['Symptom2'], $_POST['Symptom3'], $_POST['Symptom4'], $_POST['Symptom5']);
	var_dump($Patcontrollerobject->getQueryData());
}

?> 