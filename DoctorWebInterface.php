<?php
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
$_POST['patient_name'] = 'Patient2';

// checking patient list. 
if(empty($_POST['patient_name']))
{
	$Doccontrollerobject->querydoctordatabases($_SESSION['current_user']);
	var_dump($Doccontrollerobject->getQueryData());
}
// checking patient details. 
else if (!empty($_POST['patient_name']))
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

