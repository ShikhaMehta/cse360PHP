<?php
/*------------------------------------------------
// Adam Nunez and Oluwatosin Ajayi
//
//  Extends:
//  None.
//
//  Extended by:
//  None.
//
//
//  Extended by:
//    NONE
//
//  Required by:
//    NONE
//
//  Attributes:
//    $_SESSION  // holds session information for use by other scripts
//
//
//
//
------------------------------------------------*/

Class DoctorController extends Controller
{
	function __construct() 
	{
		parent::__construct();
	}
	
	//Written by Adam Nunez
public function listOfDetails($PatientName)
	{
		//Setting the query string to all symptoms for the input patientName
		$this->setQueryString("SELECT Symptom1,Symptom2,Symptom3,Symptom4,Symptom5 FROM patient WHERE PatientName is '$PatientName'");
		$this->queryDatabase();
		
	}
}

?>