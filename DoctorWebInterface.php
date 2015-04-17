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
$_POST['patient_name'] = 'Patient1';

// checking patient list. 
if(empty($_POST['patient_name']))
{
	$Doccontrollerobject->querydoctordatabases($_SESSION['current_user']);
	var_dump($Doccontrollerobject->getQueryData());
}
// checking patient details. 
else if (!empty($_POST['patient_name']))
{
	echo $_POST['patient_name'];
	$Doccontrollerobject->listOfDetails($_POST['patient_name']);
	var_dump($Doccontrollerobject->getQueryData());
}
// redirect to index. 
else
{
	
}
?>

