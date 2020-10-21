<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('localhost', 'root', '', "test_project_db");
if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}
	$namee = $_GET['name'];
	$result = mysqli_query($link, "SELECT * FROM tbl_test1 WHERE owner ='$namee' ");
   
	while($row=mysqli_fetch_assoc($result)){
	$output[]= $row;
}

	echo json_encode($output);

	mysqli_close($link);
?>