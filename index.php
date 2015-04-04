<?php 
// these variables need to be used since openshift probably has a firewall that doesn't allow
// external access to their mysql database, access is only through phpmyadmin or ssh to the actual server
$OPENSHIFT_MYSQL_DB_HOST = getenv('OPENSHIFT_MYSQL_DB_HOST');
$OPENSHIFT_MYSQL_DB_PORT = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbname = "patientdb";

$link = mysql_connect("$OPENSHIFT_MYSQL_DB_HOST","adminCjp7HQy","nuL1MDKTyQkl") or die("Error: Cannot connect to database.\n"); 
mysql_select_db($dbname);

//define the query

$query = "SELECT * FROM authentication"; 

//execute the query

$result = mysql_query($query); 

//display information: 

echo "<html><title>Engineers Without Borders</title>\n";
echo "<body>"
echo "<h2>Welcome</h2>Please login with your username and password.<p>";

if ($result) {
    while($row = mysql_fetch_array($result)) {
        $username = $row["username"];
		$password = $row["password"];
		$DoctorOrPatient = $row["DoctorOrPatient"];
        echo "$username<br>\n";
		echo "$password<br>\n";
		echo "$DoctorOrPatient<br>\n";
    }
}
echo "</body></html>\n"; 
?> 