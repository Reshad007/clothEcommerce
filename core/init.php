<?php 
    //                    host ip    username  pw  name of db 
	$db = mysqli_connect('127.0.0.1','root',   '', 'clothEcommerce');
	if (mysqli_connect_errno()) {
		echo "Data base connection failed with following errors: ".mysqli_connect_error();
		die();
	}
 ?>