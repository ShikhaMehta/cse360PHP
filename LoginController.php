<?php 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

// LoginController.php extends the Controller class. It gets the username and password from LoginWebInterface and 
// then checks patientdb to see if the username and password match. If either username or password does not match
// or both do not match it gives directs them to the error page, else if the username matches the username for a doctor
// it directs them to the DoctorWebInterface or if it is a patient it directs the user to SymptomsWebInterface
 
require 'Controller.php';

// Global Variables
$username = $_POST["username"];
$password = $_POST["password"];

class LoginWebInterface extends Controller
{
	// publicsetQueryString - sets query string to query database
	public function publicsetQueryString($newQueryString) 
	{
		return parent::setQueryString($newQueryString);
	}
	
	//parseDatabaseReturnInfo - parses what the database returns
	public function parseDatabaseReturnInfo() 
	{
		$result = $this->publicgetQueryData();
		if (mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$username = $row["username"];
				$password = $row["password"];
				$DoctorOrPatient = $row["DoctorOrPatient"];
				
				// Customize the html displayed here depending on if the person is a doctor or a patient
				$_SESSION['current_user'] = $username;
				
				if($DoctorOrPatient == "Doctor")
				{
					$_SESSION['user_type'] = 'DOCTOR';
					include 'index.php';
					exit;
				}
				else if ($DoctorOrPatient == "Patient")
				{
					$_SESSION['user_type'] = 'PATIENT';
					include 'index.php';
					exit;
				}
			else
			{
				echo "$username $password $DoctorOrPatient<br>";
				echo "there seems to be an error <br>. Please check entry in the database";
				exit;
			}
			exit;
		}
	}
	header("Location: http://engineers-withoutborders.rhcloud.com/login_error.html");
 }

	public function publicqueryDatabase() 
	{
		return parent::queryDatabase();
	}
	
	public function publicgetQueryData()
	{
		return parent::getQueryData();
	}
}

//$username = $_POST["username"];
//$password = $_POST["password"];
$test = new LoginWebInterface();

$test->publicsetQueryString("SELECT * FROM `authentication` WHERE username = '$username' and password = '$password';");
$test->publicqueryDatabase();
$test->parseDatabaseReturnInfo();


?> 