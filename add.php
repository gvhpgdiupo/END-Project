<?php
$con = mysqli_connect("localhost","root","","test_project_db") or die(mysqli_connect_error());
require_once('php-excel-reader/excel_reader2.php');
require_once('php-excel-reader/SpreadsheetReader.php');

if(isset($_POST["import"])){
    $FileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$FileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],$targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++){
            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row){
                $id ="";
                if(isset($Row[0])){
                  $id = mysqli_real_escape_string($con,$Row[0]);
                }

                $assetnumber ="";
                if(isset($Row[1])){
                  $assetnumber = mysqli_real_escape_string($con,$Row[1]);
                }

                $name ="";
                if(isset($Row[2])){
                   $name = mysqli_real_escape_string($con,$Row[2]);
                }

                $quantity ="";
                if(isset($Row[3])){
                   $quantity = mysqli_real_escape_string($con,$Row[3]);
                }

                $cost ="";
                if(isset($Row[4])){
                   $cost = mysqli_real_escape_string($con,$Row[4]);
                }

                $brand ="";
                if(isset($Row[5])){
                   $brand = mysqli_real_escape_string($con,$Row[5]);
                }

                $model ="";
                if(isset($Row[6])){
                   $model = mysqli_real_escape_string($con,$Row[6]);
                }

                $machinenumber ="";
                if(isset($Row[7])){
                   $machinenumber = mysqli_real_escape_string($con,$Row[7]);
                }

                $owner ="";
                if(isset($Row[8])){
                   $owner = mysqli_real_escape_string($con,$Row[8]);
                }

                $room ="";
                if(isset($Row[9])){
                   $room = mysqli_real_escape_string($con,$Row[9]);
                }

                if(!empty($id)||               
                !empty($assetnumber)||
                !empty($name)||
                !empty($quantity)||
                !empty($cost)||
                !empty($brand)||
                !empty($model)||
                !empty($machinenumber)||
                !empty($owner)||
                !empty($room)){

                  $query = "insert into tbl_test1
                        (id,assetnumber,name,quantity,cost,brand,model,machinenumber,owner,room) 
                        values('".$id."','".$assetnumber."','".$name."','".$quantity."','".$cost."','".$brand."','".$model."','".$machinenumber."','".$owner."','".$room."')";
                  $queryqr = "insert into qrcode (id,assetnumber,name) values ('".$id."','".$assetnumber."','".$name."')";
                  $result = mysqli_query($con, $query);
                  mysqli_query($con, $queryqr);

                    if (isset($result)) {                        
                        $type = "success";
                        $message = "เพิ่มข้อมูลสำเร็จ";
                        echo "<script>";
                        echo"alert('เพิ่มข้อมูลสำเร็จ');";
                        echo"window.location ='work.php';";
                        echo "</script>";
                          
  
                      }else {
                        $type = "error";
                        $message = "ล้มเหลวในการเพิ่มข้อมูล";
                        echo "<script>";
                        echo"alert('ล้มเหลวในการเพิ่มข้อมูล');";
                        echo"window.location ='work.php';";
                        echo "</script>";
                    }
                }
            }
        }

    }else
    { 
          $type = "error";
          $message = "โปรดตรวจสอบประเภทไฟล์อีกรอบ";
          echo "<script>";
          echo"alert('โปรดตรวจสอบประเภทไฟล์อีกรอบ');";
          echo"window.location ='work.php';";
          echo "</script>";
    }

}

$data_excel=mysqli_query($con,"SELECT * FROM `tbl_test1`");
$data_excel_numrow = mysqli_num_rows($data_excel);

if(isset($_POST["datebt"])){
  if($data_excel_numrow > 0){
    if(!empty($_POST["date"]) and !empty($_POST['namework'])){
          $notfound = 'ยังไม่ได้ตรวจนับ';
          mysqli_query($con,"UPDATE `tbl_test1` SET state = '$notfound'");
          $date=$_POST['date'];       
          $add_db="INSERT INTO `countdown_timer`(`date`) VALUES ('".$date."')";
          $namework=$_POST['namework'];
          mysqli_query($con,"INSERT INTO `name_working`(`name`) VALUES ('".$namework."')");
          mysqli_query($con,$add_db);
          mysqli_query($con,"DELETE FROM conclusion_table");
          echo "<script>";
          echo"window.location ='working.php';";
          echo "</script>";

      }else{
          echo "<script>";
          echo"alert('กรุณากรอกข้อมูลให้ครบ');";
          echo"window.location ='work.php';";
          echo "</script>";
      }
  }else{
    echo "<script>";
    echo"alert('ไม่มีข้อมูลให้ตรวจนับ');";
    echo"window.location ='work.php';";
    echo "</script>";
  }
}
  
  if(isset($_POST["datebt_edit"])){
    if(!empty($_POST["date_edit"])){
      $date_edit=$_POST['date_edit'];       
      $edit_db="UPDATE countdown_timer SET date = '$date_edit'";   
      mysqli_query($con,$edit_db);
      echo "<script>";
      echo "alert('อัพเดทสำเร็จ');";
      echo "window.location ='working.php';";
      echo "</script>";

  }else{
      echo "<script>";
      echo"alert('กรุณาเลือกวันที่ก่อน');";
      echo"window.location ='working.php';";
      echo "</script>";
  }
}
  if(isset($_POST['showfinish'])){
    $delete_time = "DELETE FROM countdown_timer";
    mysqli_query($con,$delete_time);

    mysqli_query($con,"INSERT INTO `name_working_database`(counting_cycle,name_work_database) SELECT * FROM name_working ORDER BY id DESC LIMIT 1 ");
    $nameworkdatabase = mysqli_query($con,"SELECT name_work_database FROM name_working_database ORDER BY id DESC LIMIT 1 ");
    $nameworkdatabases = mysqli_fetch_array($nameworkdatabase);
    $newStr = preg_replace('/[[:space:]]+/', '', trim($nameworkdatabases['name_work_database']));
    
    $sql_createtable = "CREATE TABLE $newStr (
      id int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      assetnumber varchar(50) NOT NULL,
      name varchar(50) NOT NULL,
      quantity text NOT NULL,
      cost text NOT NULL,
      brand varchar(50) NOT NULL,
      model varchar(50) NOT NULL,
      machinenumber varchar(50) NOT NULL,
      owner varchar(50) NOT NULL,
      room text NOT NULL,
      roomnew varchar(20) NOT NULL,
      state text NOT NULL,
      urlPicture varchar(200) NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8";

    $conok=mysqli_query($con,$sql_createtable);
    
    $conclusion_database_thai ="INSERT INTO $newStr SELECT * FROM tbl_test1";
    $conclusion_database_thaiok = mysqli_query($con,$conclusion_database_thai);

    $conclusionall = "INSERT INTO conclusion_table SELECT * FROM tbl_test1";
    $conclusionallok = mysqli_query($con,$conclusionall);

    if(isset($conclusionallok) and isset($conclusion_database_thaiok)){
      mysqli_query($con,"DELETE FROM tbl_test1");
      echo "<script>";
      echo"window.location ='conclude.php';";
      echo "</script>";
    }
  }

mysqli_close($con);
?>