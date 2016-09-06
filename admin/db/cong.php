<?php
/*define('DB_SERVER', 'nphasis.powwebmysql.com');
define('DB_USERNAME', 'dbpdf');
define('DB_PASSWORD', 'dbpdf');
define('DB_DATABASE', 'dbpdf');
*/
//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_DATABASE', 'dbsuvbooking');

class DB_Class
{
    var $connection = null;


    function __construct()
    {
//        $connection = new mysqli('localhost', 'root','') or
//        die('Connection error -> ' . mysql_error());
//        mysqli_select_db($connection,'dbsuvbooking')
//        or die('Database error -> ' . mysql_error());


        // Create connection
        $connection = new mysqli('localhost', 'root', '');

// Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        echo "Connected successfully";
    }	
}

?>
