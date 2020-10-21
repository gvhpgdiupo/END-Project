<?php
header("content-type:text/javascript;charset=utf-8");

$link = mysqli_connect('localhost', 'root', '', "test_project_db");


if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$User = $_GET['username'];
		

		$result = mysqli_query($link, "SELECT * FROM datauser WHERE username = '$User'");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;


			}

			echo json_encode($output);

		}

	} else echo "ไม่เข้า";
   
}


	mysqli_close($link);
?>