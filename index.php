<?php 
//conection: 
$OPENSHIFT_MYSQL_DB_HOST = getenv('OPENSHIFT_MYSQL_DB_HOST');
$OPENSHIFT_MYSQL_DB_PORT = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbname = "patientdb";

// debug
echo $OPENSHIFT_MYSQL_DB_HOST . "\n";
echo $OPENSHIFT_MYSQL_DB_PORT . "\n";

$link = mysql_connect("$OPENSHIFT_MYSQL_DB_HOST","adminCjp7HQy","nuL1MDKTyQkl") or die("Error: Cannot connect to database.\n"); 
mysql_select_db($dbname);

//consultation: 

$query = "SELECT * FROM authentication"; 

//execute the query. 

$result = mysql_query($query); 

//display information: 

if ($result) {
    while($row = mysql_fetch_array($result)) {
        $username = $row["username"];
		$password = $row["password"];
		$DoctorOrPatient = $row["DoctorOrPatient"];
        echo "<h2>some data</h2>";
        echo "$username<br>";
    }
} 
?> 