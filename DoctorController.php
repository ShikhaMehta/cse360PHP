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
		$longquerystring = 'SELECT doctor.Pat1Name,doctor.Pat2Name,doctor.Pat3Name,doctor.Pat4Name,doctor.Pat5Name';
		$longquerystring .= ' patient.Symptom1,patient.Symptom2,patient.Symptom3,patient.Symptom4,patient.Symptom5';
		$longquerystring .= ' FROM doctor LEFT JOIN patient ON doctor.Pat1Name = patient.PatientName AND';
		$longquerystring .= ' doctor.Pat2Name = patient.PatientName AND doctor.Pat3Name = patient.PatientName AND';
		$longquerystring .= ' doctor.Pat4Name = patient.PatientName AND doctor.Pat5Name = patient.PatientName';
		$longquerystring .= " WHERE doctor.DoctorName = '$DoctorName'";
		$this->setQueryString($longquerystring);
		$this->queryDatabase(); 
		
	}
	
	//temp function to populate patient's symptoms for testing. 
	Public function addpatientsymptoms()
	{
		$this->setQueryString("UPDATE patient SET PatientName = 'Patient2', Symptom1=3, Symptom2=5, Symptom3=1, Symptom4=3, Symptom5 = 3, TimeStamp = '2015-04-12 13:29:33';");
		$this->queryDatabase();
		
		$this->setQueryString("UPDATE patient SET PatientName = 'Patient3', Symptom1=7, Symptom2=2, Symptom3=1, Symptom4=3, Symptom5 = 4, TimeStamp = '2015-04-11 10:15:43';");
		$this->queryDatabase();
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