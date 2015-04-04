<?php 
//conection: 
$link = mysqli_connect("engineers-withoutborders.rhcloud.com","adminCjp7HQy","nuL1MDKTyQkl","patientdb") or die("Error " . mysqli_error($link)); 

//consultation: 

$query = "SELECT name FROM authentication" or die("Error in the consult.." . mysqli_error($link)); 

//execute the query. 

$result = $link->query($query); 

//display information: 

while($row = mysqli_fetch_array($result)) { 
  echo $row["name"] . "<br>"; 
} 
?> 