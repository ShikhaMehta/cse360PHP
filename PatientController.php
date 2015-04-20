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
	
	public function querypatientdatabase($PatientName)
	{
		
	}
}
?>