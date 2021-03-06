<?php

/*------------------------------------------------
// by: Gene Dodge
//
//    THIS CLASS IS NOT IMPLEMENTED DIRECTLY
//
//  This class serves as a template for those
//    classes which inherit from it and it's
//    attributes and methods are placeholders
//    that are to be redefined by it's child
//    classes
//
//  Extends:
//    NONE
//
//  Extended by:
//    LoginController
//    PatientController
//    DoctorController
//
//  Requires:
//    NONE
//
//  Required by:
//    NONE
//
//  Attributes:
//    !$currentUser          // deprecated as it will be held in the $_SESSION array
//    $databaseQueryString  // SQL query string for querying database
//    $queryData            // holds database query results
//
//  Methods:
//   __construct()  // used to set default variables
//                  //  REQUIRES extending classes call parent::__construct();
//                  //  inside it's own __construct() method
//   !parseWebData() // deprecated as PHP handles this directly with $_POST
//   queryDatabase(String) // returns results of query to $queryData
//   !parseDatabaseReturnInfo() // deprecated as respective webInterface scripts handle parsing via getQueryData()
//
------------------------------------------------*/

// database setup for doing MySQL queries
// This redefines constants that can be used to connect
//   to the MySQL database on Openshift.com
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME', 'patientdb');

Class Controller {

	// inherited variables
	protected $databaseQueryString;
	protected $queryData;
	
	//--------- construct -------------
	// The constructor for Controller sets
	//  the variables to null to eliminate errors
	//!! REQUIRES extending classes call parent::__construct();
	//    inside it's own __construct() function
	function __construct() {
		$this->databaseQueryString = "";
		$this->queryData = NULL;
	}
	
	// ---------------- setQueryString ------------------
	// This function takes a string and sets the
	//   $databaseQueryString equal to it.
	protected function setQueryString($newQueryString) {
		$this->databaseQueryString = $newQueryString;
	}
	
	// ---------------- getQueryString ------------------
	// Returns the current value of $databaseQueryString
	protected function getQueryString() {
		return $this->databaseQueryString;
	}
	
	// ---------------- getQueryData ------------------
	// Returns the current $queryData which is a
	//   mysqli_result data structure
	public function getQueryData() {
		return $this->queryData;
	}
	
	//-----------------  queryDatabase() ---------------------------
	// This function uses $databaseQueryString (a formatted SQL
	//  query string) and queries the MySQL database with it.
	//
	// Does not return results directly, but populates $queryData
	//  with the results in the form of a mysqli_query
	//
	// Example:
	//   If we had a table with the following format and data
	//
	//   science_peoples
	//   ----------------------------------------------
	//  | first_name  |  last_name   |  phone_number   |
	//   ----------------------------------------------
	//  |  Albert     |  Einstein    |  1112223333     |
	//   ----------------------------------------------
	//  |  Isaac      |  Newton      |  4445556666     |
	//   ----------------------------------------------
	//
	//  and we called queryDatabase("SELECT * FROM science_peoples");
	//  the results stored in $queryData could be accessed by:
	//
	//  if (mysqli_num_rows($queryData) > 0) {
	//     while ($row = mysqli_fetch_assoc($queryData)) {
	//         // do stuff with the data from this row
	//         // the array would hold values for each row in
    //         //  this format:	
	//         // $row["first_name"] , $row["last_name"], $row["phone_number"]
	//         // where the first row would correspond to:
	//         // "Albert", "Einstein", 1112223333
	//     }
	//
	protected function queryDatabase() {
		// if the query string is not populated, issue warning
		//  and do not query the database
		if (empty($this->databaseQueryString)) {
			echo "!! No SQL query string defined. Please use setQueryString(<your_SQL_query_string>) prior to calling queryDatabase(). !!";
		} else {
			// open a connection to the database, failing if there is an error
			$mysqlConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, "", DB_PORT) or die("Error: " . mysqli_error($mysqlConnection));
			
			// select the current database we want, failing if there is an error
			mysqli_select_db($mysqlConnection, DB_NAME) or die("Error: " . mysqli_error($mysqlConnection));
			
			// put the results into the $queryData variable
			$this->queryData = mysqli_query($mysqlConnection, $this->databaseQueryString);

			// disconnect from the database
			mysqli_close($mysqlConnection);
	
		}
	}
}

?>