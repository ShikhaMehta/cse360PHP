<?php 
// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require 'Controller.php';
class LoginWebInterface extends Controller
{
	protected function parseDatabaseReturnInfo() 
	{
		;
	}
	
	public function testfun()
	{
		echo "hello world";
	}
	public function publicqueryDatabase() 
	{
			queryDatabase();
	}
}

$username = $_POST["username"];
$password = $_POST["password"];
$test = new LoginWebInterface();

$test->setQueryString("SELECT * FROM `authentication` WHERE username = '$username' and password = '$password';");
$test->publicqueryDatabase();


// these variables need to be used since openshift probably has a firewall that doesn't allow
// external access to their mysql database, access is only through phpmyadmin or ssh to the actual server
$OPENSHIFT_MYSQL_DB_HOST = getenv('OPENSHIFT_MYSQL_DB_HOST');
$OPENSHIFT_MYSQL_DB_PORT = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbname = "patientdb";

// debug
//echo $OPENSHIFT_MYSQL_DB_HOST . "\n";
//echo $OPENSHIFT_MYSQL_DB_PORT . "\n";

$link = mysql_connect("$OPENSHIFT_MYSQL_DB_HOST","adminCjp7HQy","nuL1MDKTyQkl") or die("Error: Cannot connect to database.\n"); 
mysql_select_db($dbname);

//$username = $_POST["username"];
//$password = $_POST["password"];

// define SQL query 

//$query = "SELECT * FROM `authentication` WHERE username = '$username' and password = '$password';"; 

//execute the query. 

//$result = mysql_query($query); 
$result = $test->getQueryData();

//display information: 
//if ($result) {
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result)) {
        $username = $row["username"];
		$password = $row["password"];
		$DoctorOrPatient = $row["DoctorOrPatient"];
		// add logic here to customize the html displayed here depending on if the person is a doctor or a patient
		if($DoctorOrPatient == "Doctor")
		{
			echo "<h2>Welcome Back $username</h2>";
			echo "This page is under construction <br>";
			$test->testfun();
			exit;
		}
		else if ($DoctorOrPatient == "Patient")
		{
			echo "<html>";
			echo "<title>Patient Symptoms Page</title>";
			echo "<link rel=\"stylesheet\" href=\"project.css\" />";
			echo "<body>";

			echo "<h2><CENTER> Welcome $username.  Please enter your symptoms on a scale of 1 to 10 with 10 being most severe.<br></h2>"; 
			echo "<br><br>";
			echo "<form action=\"patient.php\" method=\"post\">";
			echo " <h2>Are you experiencing any pain?</h2>";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_1\"> 1 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_2\"> 2 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_3\"> 3 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_4\"> 4 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_5\"> 5 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_6\"> 6 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_7\"> 7 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_8\"> 8 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_9\"> 9 ";
			echo "<input type=\"radio\" name=\"pain\" value=\"pain_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Are you drowsy?</h2>";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_1\"> 1 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_2\"> 2 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_3\"> 3 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_4\"> 4 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_5\"> 5 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_6\"> 6 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_7\"> 7 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_8\"> 8 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_9\"> 9 ";
			echo "<input type=\"radio\" name=\"drowsy\" value=\"drowsy_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Do you have feelings of Nausea?</h2>";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_1\"> 1 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_2\"> 2 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_3\"> 3 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_4\"> 4 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_5\"> 5 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_6\"> 6 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_7\"> 7 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_8\"> 8 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_9\"> 9 ";
			echo "<input type=\"radio\" name=\"nausea\" value=\"nausea_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Do you feel anxious?</h2>";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_1\"> 1 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_2\"> 2 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_3\"> 3 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_4\"> 4 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_5\"> 5 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_6\"> 6 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_7\"> 7 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_8\"> 8 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_9\"> 9 ";
			echo "<input type=\"radio\" name=\"anxious\" value=\"anxious_10\"> 10 ";
			
			echo "<br><br>";
			echo " <h2>Do you feel depressed?</h2>";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_1\"> 1 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_2\"> 2 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_3\"> 3 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_4\"> 4 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_5\"> 5 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_6\"> 6 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_7\"> 7 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_8\"> 8 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_9\"> 9 ";
			echo "<input type=\"radio\" name=\"depressed\" value=\"depressed_10\"> 10 ";
			
			echo "<br><br>";
			echo "<input type=\"submit\"></CENTER>";
			echo "</form>";
			echo "</body>";
			echo "</html>";


			//echo "<h2>Welcome Back $username</h2>";
			//echo " Shikha is going to work on this page shortly <br>";
			exit;
		}
		else
		{
			echo "$username $password $DoctorOrPatient<br>";
			echo "there seems to be an error <br>. Please check entry in the database";
			exit;
		}
        //echo "<h2>Welcome Back $username</h2>";
       // echo "$username $password $DoctorOrPatient<br>";
		exit;
    }
}
header("Location: http://engineers-withoutborders.rhcloud.com/login_error.html");
?> 