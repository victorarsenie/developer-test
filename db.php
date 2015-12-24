<?php 

$host = "mysql.hostinger.co.uk"; /*localhost*/                     /*mysql.hostinger.co.uk*/
$mysql_username = "u946440136_vic"; /*root*/                     /*u946440136_vic*/
$mysql_password = "Developer1"; /*empty*/                        /*Developer1*/
$db_name = "u946440136_dev"; /*dev_test*/  				   /*u946440136_dev*/

$connection = mysqli_connect($host, $mysql_username, $mysql_password, $db_name);

if(mysqli_connect_errno()) {
	die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
}

?>