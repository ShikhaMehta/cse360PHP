<?php
/*------------------------------------------------
// by : Adam Nunez and Oluwatosin Ajayi
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
// required to use objects within controller.php
require 'Controller.php';

Class DoctorController extends Controller
{
	function __construct() 
	{
		parent::__construct();
	}
	
	// Written by Oluwatosin Ajayi. 
	// used for storing the patient's symptom numbers for results of the mean.  
	private $patients;
	public function getPatients( )
	{
		return $this->patients;
	}
	public function querydoctordatabases($DoctorName) 
	{	
		// Getting the list of the doctor's patients. 	
		$this->setQueryString("SELECT * FROM doctor WHERE DoctorName='$DoctorName';");
		$this->queryDatabase();
		

		// When the query data is greater than zero. When there are results. 
		
		if (mysqli_num_rows($this->getQueryData()) > 0) 
		{
			// creates an associative array that saves the results.  
			$doctorresults = mysqli_fetch_assoc($this->queryData);
			
			if ($doctorresults > 0) 
			{
				for ($i = 1; $i <= 5; $i++)
				{
					$currentpatient = 'Pat' . $i . 'Name'; 
					$this->setQueryString("SELECT * FROM patient WHERE PatientName='" . $doctorresults["$currentpatient"] . "' ORDER BY TimeStamp DESC;");
				
					$this->queryDatabase(); // query for each patient's symptoms. 
					
					// if the patient has symptoms			
					if(mysqli_num_rows($this->getQueryData()) > 0)
					{
						//var_dump($this->getQueryData());
						$symptomresults = mysqli_fetch_assoc($this->getQueryData());
						$currentpatientindex = 'patient' . $i; 
						$this->patients[$currentpatientindex . 'name'] = $doctorresults["$currentpatient"];
						$this->patients[$currentpatientindex . 'mean'] = $this->calculatemean($symptomresults['Symptom1'],$symptomresults['Symptom2'],$symptomresults['Symptom3'],$symptomresults['Symptom4'],$symptomresults['Symptom5']);	

					}
					// there are no symptoms. 
					// Puts in an empty entry in the patient's array that we are building. 
					else
					{
						$currentpatientindex = 'patient' . $i; 
						$this->patients[$currentpatientindex . 'name'] = $doctorresults["$currentpatient"];
						$this->patients[$currentpatientindex . 'mean'] = 0;
					}
				}				
			}
		}
	}
	// calculates the mean number from all of the patient symptom numbers. 
	public function calculatemean($newintegervalue1, $newintegervalue2, $newintegervalue3, $newintegervalue4, $newintegervalue5)
	{
		$meaninteger = $newintegervalue1 + $newintegervalue2 + $newintegervalue3 + $newintegervalue4 + $newintegervalue5;
		$returninteger = $meaninteger/5; 
		return round ($returninteger); 
	}
	
	//Written by Adam Nunez
	public function listOfDetails($PatientName)
	{
		//Setting the query string to all symptoms for the input patientName
		$this->setQueryString("SELECT * FROM patient WHERE PatientName='$PatientName' ORDER BY TimeStamp DESC;");
		$this->queryDatabase();
	}
}

?>