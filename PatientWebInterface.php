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

	/*---TEMPLATE CODE: PatientWebInterface.php
	
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

require 'PatientController.php';
$Patcontrollerobject = new PatientController;

if (empty($_POST ['Symptom1']))
{
?>
			<h2><CENTER> Welcome <?php echo $_SESSION['current_user']; ?>.  Please enter your symptoms on a scale of 1 to 10 with 10 being most severe.<br></h2>
			<br><br>
			<form action="index.php" method="post">
			<h2>Are you experiencing any pain?</h2>
			<input type="radio" name="Symptom1" value="1"> 1 </input>
			<input type="radio" name="Symptom1" value="1"> 2 </input>
			<input type="radio" name="Symptom1" value="1"> 3 </input>
			<input type="radio" name="Symptom1" value="1"> 4 </input>
			<input type="radio" name="Symptom1" value="1"> 5 </input>
			<input type="radio" name="Symptom1" value="1"> 6 </input>
			<input type="radio" name="Symptom1" value="1"> 7 </input>
			<input type="radio" name="Symptom1" value="1"> 8 </input>
			<input type="radio" name="Symptom1" value="1"> 9 </input>
			<input type="radio" name="Symptom1" value="1"> 10 </input>
			<?php
			
			/*echo "<br><br>";
			echo " <h2>Are you drowsy?</h2>";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_1\"> 1 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_2\"> 2 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_3\"> 3 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_4\"> 4 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_5\"> 5 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_6\"> 6 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_7\"> 7 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_8\"> 8 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_9\"> 9 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Do you have feelings of Nausea?</h2>";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_1\"> 1 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_2\"> 2 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_3\"> 3 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_4\"> 4 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_5\"> 5 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_6\"> 6 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_7\"> 7 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_8\"> 8 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_9\"> 9 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Do you feel anxious?</h2>";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_1\"> 1 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_2\"> 2 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_3\"> 3 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_4\"> 4 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_5\"> 5 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_6\"> 6 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_7\"> 7 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_8\"> 8 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_9\"> 9 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Do you feel depressed?</h2>";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_1\"> 1 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_2\"> 2 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_3\"> 3 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_4\"> 4 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_5\"> 5 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_6\"> 6 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_7\"> 7 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_8\"> 8 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_9\"> 9 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_10\"> 10 ";
			
			echo "<br><br>";
			echo "<input type=\"submit\"></CENTER>";
			echo "</form>";
			echo "</body>";
			echo "</html>";
			</form>
			*/
}
else
{	
	require 'PatientController.php';
	echo "DO SUBMISSION";
}

?> 