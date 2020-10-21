<?php
    $con = mysqli_connect("localhost","root","","test_project_db");
    $genqrcode = 'Created';
    $queryupdate="UPDATE qrcode SET status_qr = '$genqrcode'";
    if(isset($_POST['genqrall'])){
        $completeqrall = mysqli_query($con,$queryupdate);
        echo "<script>";
        echo"alert('สร้าง QR CODE ทั้งหมด สำเร็จ');";
        echo "</script>";
        if(isset($completeqrall)){
                echo "<script>";
                echo"window.location ='qrall.php';";
                echo "</script>";
                          
        }
    }   
?>
