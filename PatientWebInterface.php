<?php 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// error reporting REMOVE BEFORE FINAL COMMIT !!!++++=================================================++++!+!+!!!!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

echo "<html>";
			echo "<title>Patient Symptoms Page</title>";
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


?> 