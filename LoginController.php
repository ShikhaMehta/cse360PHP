<?php 

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
	protected function publicsetQueryString($newQueryString) 
	{
		return parent::setQueryString($newQueryString);
	}
	
	//parseDatabaseReturnInfo - parses what the database returns
	protected function parseDatabaseReturnInfo() 
	{
		$result = publicgetQueryData();
		echo "debug1";
		if (mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$username = $row["username"];
				$password = $row["password"];
				$DoctorOrPatient = $row["DoctorOrPatient"];
				// Customize the html displayed here depending on if the person is a doctor or a patient
				if($DoctorOrPatient == "Doctor")
				{
					echo "<h2>Welcome Back $username</h2>";
					$_SESSION['current_user'] = $username;
					$_SESSION['user_type'] = $DoctorOrPatient;
					//echo "<form action=\"index.php\" method=\"post\">";
					// call DoctorWebInterface
					///include ('index.php');
					//echo "<h2>Welcome Back $username</h2>";
					exit;
				}//if
				else if ($DoctorOrPatient == "Patient")
				{
					echo "<h2><CENTER> Welcome $username.  Please enter your symptoms on a scale of 1 to 10 with 10 being most severe.<br></h2>";
					$_SESSION['current_user'] = $username;
					$_SESSION['user_type'] == $DoctorOrPatient;
					//echo "<form action=\"index.php\" method=\"post\">";
					//echo "<h2>Welcome Back $username</h2>";
					// call PatientWebInterface
					//include ('index.php');
					
					
				exit;
				}//else if

			}//while
		}//if

	}//protected function parseDatabaseReturnInfo()

	protected function publicqueryDatabase() 
	{
		return parent::queryDatabase();
	}
	
	protected function publicgetQueryData()
	{
		return parent::getQueryData();
	}
}

//$username = $_POST["username"];
//$password = $_POST["password"];
$test = new LoginWebInterface();

$test->publicsetQueryString("SELECT * FROM `authentication` WHERE username = '$username' and password = '$password';");
echo "debug2";
//$test->publicqueryDatabase();
echo "debug3";
//$test->parseDatabaseReturnInfo();

?> 