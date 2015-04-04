<?php 
//conection: 
$OPENSHIFT_MYSQL_DB_HOST = getenv('OPENSHIFT_MYSQL_DB_HOST');
$OPENSHIFT_MYSQL_DB_PORT = getenv('OPENSHIFT_MYSQL_DB_PORT');
$link = mysqli_connect("mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/","adminCjp7HQy","nuL1MDKTyQkl","patientdb") or die("Error " . mysqli_error($link)); 

//consultation: 

$query = "SELECT name FROM authentication" or die("Error in the consult.." . mysqli_error($link)); 

//execute the query. 

$result = $link->query($query); 

//display information: 

while($row = mysqli_fetch_array($result)) { 
  echo $row["name"] . "<br>"; 
} 
?> 