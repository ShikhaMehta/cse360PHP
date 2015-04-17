<?php
/*------------------------------------------------
// Adam Nunez and Oluwatosin Ajayi
//
//  Extends:
//  Controller. 
//
//  Extended by:
//  None.
//
//
//  Requires:
//  NONE
//
//  Required by:
//  NONE
//
//  Attributes:
//    $_SESSION  // holds session information for use by other scripts
//
//
//
//
------------------------------------------------*/
require 'Controller.php';
Class DoctorController extends Controller
{
	function __construct() 
	{
		parent::__construct();
	}
	
	// created by Oluwatosin Ajayi. 
	// 
	public function querydoctordatabases($DoctorName) 
	{
		  $longquerystring; 
		//$longquerystring = ' SELECT doctor.Pat1Name 
		//$longquerystring = 'SELECT doctor.Pat1Name,doctor.Pat2Name,doctor.Pat3Name,doctor.Pat4Name,doctor.Pat5Name';
		//$longquerystring .= ' patient.Symptom1,patient.Symptom2,patient.Symptom3,patient.Symptom4,patient.Symptom5';
		//$longquerystring .= ' FROM doctor LEFT JOIN patient ON doctor.Pat1Name = patient.PatientName AND';
		//$longquerystring .= ' doctor.Pat2Name = patient.PatientName AND doctor.Pat3Name = patient.PatientName AND';
		//$longquerystring .= ' doctor.Pat4Name = patient.PatientName AND doctor.Pat5Name = patient.PatientName';
		//$longquerystring .= " WHERE doctor.DoctorName = '$DoctorName'";
		
		$longquerystring  = "SELECT * FROM doctor WHERE doctor.DoctorName = '$DoctorName'";
		$this->setQueryString($longquerystring);
		$this->queryDatabase(); 
		
	}
	public function calculatemean()
	{
		
	}
	
	//Written by Adam Nunez
	public function listOfDetails($PatientName)
	{
		//Setting the query string to all symptoms for the input patientName
		$this->setQueryString("SELECT Symptom1,Symptom2,Symptom3,Symptom4,Symptom5 FROM patient WHERE PatientName='$PatientName'");
		//$this->setQueryString("SELECT * FROM patient WHERE PatientName = '$PatientName'");
		echo $this->getQueryString();
		$this->queryDatabase();
		
	}
}

?>