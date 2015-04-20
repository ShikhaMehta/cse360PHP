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
	
	/*---TEMPLATE CODE: PatientWebInterface.php
	
	if ($_POST['symptom1'])
	{
		PatientController -> submitSymptoms()
		if (submit_success)
		{
			//symptoms submitted
			//OKAY button
			$_SESSION['user_type'] = "";
		}
		else
		{
			//there was an error
			//TRY AGAIN button
		}
	}
	
	<form method = POST action = index.php>
	//all symptom stuff
	</form>
	
	---END TEMPLATE*/
	
	public function querypatientdatabase($PatientName)
	{
		
	}
}
?>