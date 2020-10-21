<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('localhost', 'root', '', "test_project_db");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$codeno = $_GET['assetnumber'];
		$iduser = $_GET['owner'];
        $date = $_GET['date'];
        $urlPicture = $_GET['urlPicture'];
							
		$sql = "INSERT INTO `checkdurable`(`assetnumber`, `owner`, `date`, `urlPicture`) VALUES ('$codeno','$iduser','$date','$urlPicture')";

		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome";
   
}
	mysqli_close($link);
?>