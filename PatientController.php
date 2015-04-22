<?php

/*------------------------------------------------
// by : Alisha Geis
//
//  Extends:
//  Controller. 
//
//  Extended by:
//  None.
//
//  Requires:
//  NONE
//
//  Required by:
//  NONE
//
//  Attributes:
//  $_SESSION  // holds session information for use by other scripts
//  $_POST	   // used to collect form data after submitting an HTML form
------------------------------------------------*/
require 'Controller.php';
Class PatientController extends Controller
{
	function __construct() 
	{
		parent::__construct();
	}
	public function submitSymptoms($patientName, $symptom1, $symptom2, $symptom3, $symptom4, $symptom5)
	{
		//query string
		$this->setQueryString("INSERT INTO patient VALUES ('$patientName', '$symptom1', '$symptom2', '$symptom3', '$symptom4', '$symptom5', NOW());");
		$this->queryDatabase();
	}
}
?>