<?php 
    //                    host ip    username  pw  name of db 
	$db = mysqli_connect('127.0.0.1','root',   '', 'clothEcommerce');
	if (mysqli_connect_errno()) {
		echo "Data base connection failed with following errors: ".mysqli_connect_error();
		die();
	}
 
//  Constant in PHP should be all upper case.
//     Constant       assigning to 
 define('BASEURL', '/clothEcommerce/'); // In online world we need to use (__FILE__) instead of /clothEcommerce/