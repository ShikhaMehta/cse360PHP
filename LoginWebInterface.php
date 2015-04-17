<?php 
//LoginWebInterface - basically spits out the HTM
echo "<html>";
echo "<title>Engineers without borders</title>";
echo "<link rel=\"stylesheet\" href=\"project.css\" />";
echo "<body>";

echo "<CENTER> Welcome.  Please login with your username and password below.<br>"; 
echo "<br><br><br><br><br><br>";
echo "<form action=\"LoginController.php\" method=\"post\">";
echo "Username: <input type=\"text\" name=\"username\"><br>";
echo "Password: <input type=\"text\" name=\"password\"><br>"; 
echo "<br><br>";
echo "<input type=\"submit\"></CENTER>";
echo "</form>";

echo "</body>";
echo "</html>";

?> 