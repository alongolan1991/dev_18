<?php
	//create a mySQL DB connection:
    $dbhost = "182.50.133.55";
    $dbuser = "auxstudDB7c";
    $dbpass = "auxstud7cDB1!";
    $dbname = "auxstudDB7c";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_query($connection,"SET NAMES 'utf8'") or die(mysql_error());
    
	//testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
?>
