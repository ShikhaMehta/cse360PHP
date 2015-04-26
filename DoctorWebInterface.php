<?php
// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//echo "<html>";
//			echo "<title>Patient Symptoms Page</title>";
//			echo "<body>";

//			echo "<h2><CENTER> Welcome $username <br></h2>"; 
//			echo "<br><br>";
/*------------------------------------------------
//  Adam Nunez and Oluwatosin Ajayi
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

require 'DoctorController.php';
$Doccontrollerobject = new DoctorController;

// checking patient list. 

if(empty($_POST['patient_name']))//checking to see if the doctor has not clicked icon / if doc wants to see patients details then array will be populated
{
	echo "<CENTER><h3>Your patients are listed below.</h3>Click a patient to view the details of their entries.<br>"; 
	$Doccontrollerobject->querydoctordatabases($_SESSION['current_user']);//runs query on doctor to get back list of patients and calculates mean of patients most recent symptoms
	$patientsarray = $Doccontrollerobject->getPatients(); //gets array from controller class
	echo '<br><br><table><tr>';

	for($i = 1; $i<= 5; $i++) //outputs the patient name and mean score in a formatted way
	{	
	?>
		<td>
			<form action="index.php" method="post">
				<div class="patient_icon" id="<?php echo determineCSSColor($patientsarray['patient' . $i . 'mean']); ?>">
					<div class="patient_submit_div">
						<input class="patient_submit_button" type="submit" value="" />
					</div>
					<input type="hidden" name="patient_name" value="<?php echo $patientsarray['patient' . $i . 'name']; ?>" />
					<div class="patient_name"><?php echo $patientsarray['patient' . $i . 'name']; ?></div>
					<div class="patient_pain_number"><?php echo $patientsarray['patient' . $i . 'mean']; ?></div>
				</div>
			</form>
		</td>
	<?php
	}
	
	echo '</tr></table></CENTER>';
}

// checking patient details. 
else if (!empty($_POST['patient_name'])) //checks to see if the doc has clicked on a patient icon to see the patients details
{
	echo "<CENTER><h3>The symptom entries for the requested patient are listed below.</h3>Use the browser's back button to return to the overview of all your patients.<br>";  
	$Doccontrollerobject->listOfDetails($_POST['patient_name']); //queries the database to get all symptom entries from patient
	
	if (mysqli_num_rows($Doccontrollerobject->getQueryData()) > 0) //if there is more then 0 symptom entries
	{
		echo '<br><br><table class="patient_details"><tr><th colspan=6>' . $_POST['patient_name'] . '\'s Symptom Entries</th></tr>';
		echo '<tr><th>Date & Time</th><th>Pain</th><th>Drowsiness</th><th>Nausea</th><th>Anxiety</th><th>Depression</th></tr>';
		
	     while ($row = mysqli_fetch_assoc($Doccontrollerobject->getQueryData()))  //loops through each symptom entry and outputs it
		 {
			 echo '<tr>';
			 echo '<td>' . $row['TimeStamp'] . ' </td>';
	         echo '<td id="' . determineCSSColor($row['Symptom1']) . '">' . $row['Symptom1'] . '</td>';
	         echo '<td id="' . determineCSSColor($row['Symptom2']) . '">' . $row['Symptom2'] . '</td>';
	         echo '<td id="' . determineCSSColor($row['Symptom3']) . '">' . $row['Symptom3'] . '</td>';
	         echo '<td id="' . determineCSSColor($row['Symptom4']) . '">' . $row['Symptom4'] . '</td>';
	         echo '<td id="' . determineCSSColor($row['Symptom5']) . '">' . $row['Symptom5'] . '</td>';
			 echo '</tr>';
	     }	 
		 echo '</table></CENTER>';
	} else {
		echo '<br><br>' . $_POST['patient_name'] . ' has not made any entries.</CENTER>';
	}
}
// redirect to index. (log in page)
else
{
	header('Location: http://engineers-withoutborders.rhcloud.com/index.php');
}

// ------ determineCSSColor(String) --------
// by: Gene Dodge
//
// this function takes in an integer value (the mean of the patient's symptom scores)
//  and returns a string to use as the id for the HTML element in order for the CSS
//  to properly color code it
function determineCSSColor($intSeverity) {
	$returnId = "";
	
	if ($intSeverity <= 3) {
		$returnId = 'patient_green';
	} else if ($intSeverity <= 4 ) {
		$returnId = 'patient_yellow';
	} else if ($intSeverity <= 7 ) {
		$returnId = 'patient_orange';
	} else {
		$returnId = 'patient_red';
	}
	
	return $returnId;
}
?>

