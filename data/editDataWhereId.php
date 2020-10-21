<?php

$link = mysqli_connect('localhost', 'root', '', "test_project_db");



if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
			
		$codeno = $_GET['assetnumber'];		
		$statusid = $_GET['state'];
		$position = $_GET['room'];
		$urlPicture = $_GET['urlPicture'];

		
		
		
							
		$sql = "UPDATE tbl_test1 SET  roomnew = '$position' , state = '$statusid', urlPicture='$urlPicture' WHERE assetnumber = '$codeno'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Master UNG";
   
}

	mysqli_close($link);
?>