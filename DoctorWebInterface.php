<?php
// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$username = $_SESSION['current_user'];

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
if(!empty($_POST['patient_name']))
{
	echo "<h2><CENTER> Welcome $username.  P.<br></h2>"; 
	$Doccontrollerobject->querydoctordatabases($_SESSION['current_user']);
	$patientsarray = $Doccontrollerobject->patients; 
	echo '<table>';
	for($i = 1; $i<= 5; $i++)
	{	
		echo '<tr>';
	    echo '<td>' . $patientsarray['patient' . $i . 'name'] . '</td> <td>' . $patientsarray['patient' . $i . 'mean'] . ' </td>';
		echo '</tr>';	 
	}
	
	echo '</table>';
	
}
// checking patient details. 
else if (empty($_POST['patient_name']))
{
	$Doccontrollerobject->listOfDetails($_POST['patient_name']);
	
	if (mysqli_num_rows($Doccontrollerobject->getQueryData()) > 0) 
	{
		
		echo '<table>';
		
	     while ($row = mysqli_fetch_assoc($Doccontrollerobject->getQueryData())) 
		 {
			 echo '<tr>';
	          echo '<td>' . $row['Symptom1'] . '</td><td>' . $row['Symptom2'] . '</td><td>' . $row['Symptom3'] . '</td><td>' . $row['Symptom4'] . '</td><td>' . $row['Symptom5'] . '</td>';
			 echo '</tr>';
	     }
		 
		 echo '</table>';
		 
		 
		 
	}
}
// redirect to index. 
else
{
	
}
?>

