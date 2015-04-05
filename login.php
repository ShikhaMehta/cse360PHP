<?php 
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

$username = $_POST["username"];
$password = $_POST["password"];

// define SQL query 

$query = "SELECT * FROM `authentication` WHERE username = '$username' and password = '$password';"; 

//execute the query. 

$result = mysql_query($query); 

//display information: 
if ($result) {
    while($row = mysql_fetch_array($result)) {
        $username = $row["username"];
		$password = $row["password"];
		$DoctorOrPatient = $row["DoctorOrPatient"];
		// add logic here to customize the html displayed here depending on if the person is a doctor or a patient
		if($DoctorOrPatient == "Doctor")
		{
			echo "<h2>Welcome Back $username</h2>";
			echo "This page is under construction <br>";
			exit;
		}
		else if ($DoctorOrPatient == "Patient")
		{
			echo "<html>";
			echo "<title>Patient Symptoms Page</title>";
			echo "<body>";

			echo "<CENTER> Welcome $username.  Please enter your symptoms on a scale of 1 to 10 with 10 being most severe.<br>"; 
			echo "<br><br><br><br>";
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