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
if(empty($_POST['patient_name']))
{
	$Doccontrollerobject->querydoctordatabases($_SESSION['current_user']);
	$patientsarray = $Doccontrollerobject->getPatients(); 
	echo '<table><tr>';

	for($i = 1; $i<= 5; $i++)
	{	
	?>
		<td>
			<form action="index.php" method="post">
				<div class="patient_icon" id="patient_<?php 
				
					// php if elseif statement to determine which color patient
					//  icon should be based on the severity of their symptoms
					$severityInt = $patientsarray['patient' . $i . 'mean'];
					
					// this prints the rest of the id for the div tag
					// so that CSS can color it correctly
					if ($severityInt <= 3) {
						echo 'green';
					} else if ($severityInt <= 4 ) {
						echo 'yellow';
					} else if ($severityInt <= 7 ) {
						echo 'orange';
					} else {
						echo 'red';
					}
				
				
					?>">
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
else if (!empty($_POST['patient_name']))
{
	echo $_POST['patient_name']; 
	$Doccontrollerobject->listOfDetails($_POST['patient_name']);
	
	if (mysqli_num_rows($Doccontrollerobject->getQueryData()) > 0) 
	{
		echo '<table>';
		
	     while ($row = mysqli_fetch_assoc($Doccontrollerobject->getQueryData())) 
		 {
			 echo '<tr>';
	         echo '<td>' . $row['Symptom1'] . '</td><td>' . $row['Symptom2'] . '</td><td>' . $row['Symptom3'] . '</td><td>' . $row['Symptom4'] . '</td><td>' . $row['Symptom5'] . '</td>';
			 echo '<td>' . $row['TimeStamp'] . ' </td>';
			 echo '</tr>';
	     }	 
		 echo '</table>';
	}
}
// redirect to index. 
else
{
	header('Location: http://engineers-withoutborders.rhcloud.com/index.php');
}
?>

