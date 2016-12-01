



<?php 
    //                    host ip    username  pw  name of db 
	/*$db = mysqli_connect('127.0.0.1','root',   '', 'clothEcommerce');*/
	$host_name  = "db658757653.db.1and1.com";
    $database   = "db658757653";
    $user_name  = "dbo658757653";
    $password   = "Ufobed88ufobed88:";

    $db = mysqli_connect($host_name, $user_name, $password, $database);

	if (mysqli_connect_errno()) {
		echo "Data base connection failed with following errors: ".mysqli_connect_error();
		die();
	}
 ?>