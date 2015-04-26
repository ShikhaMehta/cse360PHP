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
echo "<h2><CENTER> Welcome " . $_SESSION['current_user'] . " <br></h2>"; 
if(empty($_POST['patient_name']))//checking to see if the doctor has not clicked icon / if doc wants to see patients details then array will be populated
{
	$Doccontrollerobject->querydoctordatabases($_SESSION['current_user']);//runs query on doctor to get back list of patients and calculates mean of patients most recent symptoms
	$patientsarray = $Doccontrollerobject->getPatients(); //gets array from controller class
	echo '<table><tr>';

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
	
	echo '</tr></table>';
}

// checking patient details. 
else if (!empty($_POST['patient_name'])) //checks to see if the doc has clicked on a patient icon to see the patients details
{
	echo $_POST['patient_name']; 
	$Doccontrollerobject->listOfDetails($_POST['patient_name']); //queries the database to get all symptom entries from patient
	
	if (mysqli_num_rows($Doccontrollerobject->getQueryData()) > 0) //if there is more then 0 symptom entries
	{
		echo '<table><tr><td>Date & Time</td><td>Pain</td><td>Drowsiness</td><td>Nausea</td><td>Anxiety</td><td>Depression</td></tr>';
		
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
		 echo '</table>';
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

