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
$DoctorControllerobject = new DoctorController;

$DoctorControllerobject->addpatientsymptoms();
// checking patient list. 
if(empty($_POST['patient_name']))
{
	
}
// checking patient details. 
else if (!empty($_POST ['patient_name']))
{
	
}
// redirect to index. 
else
{
	
}
?>

