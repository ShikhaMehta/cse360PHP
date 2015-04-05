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
	echo "<body>";
    while($row = mysql_fetch_array($result)) {
        $username = $row["username"];
		$password = $row["password"];
		$DoctorOrPatient = $row["DoctorOrPatient"];
        echo "<h2>Welcome Back $username</h2>";
        echo "$username $password $DoctorOrPatient<br>";
		echo "</body>"; 
		exit;
    }
}
else {
	 echo "invalid login";
	 exit;
}
echo "should not get here";
?> 