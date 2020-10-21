<?php
    require_once('connection.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM tbl_test1 WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        
        $assetnumber_up = $_REQUEST['txt_assetnumber'];
        $name_up = $_REQUEST['txt_name'];
        $quantity_up = $_REQUEST['txt_quantity'];
        $cost_up = $_REQUEST['txt_cost'];
        $brand_up = $_REQUEST['txt_brand'];
        $model_up = $_REQUEST['txt_model'];
        $machinenumber_up = $_REQUEST['txt_machinenumber'];
        $owner_up = $_REQUEST['txt_owner'];
        $room_up = $_REQUEST['txt_room'];

        if (!empty($id_up)) {
            $errorMsg = "ID ไม่สามารถว่างได้";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE tbl_test1 SET  assetnumber = :assetnumber_up, 
                    name = :name_up, quantity =:quantity_up, cost =:cost_up, brand =:brand_up ,model =:model_up, 
                    machinenumber =:machinenumber_up, owner =:owner_up, room =:room_up WHERE id = :id");
                    
                    $update_stmt->bindParam(':id', $id);
                    $update_stmt->bindParam(':assetnumber_up', $assetnumber_up);
                    $update_stmt->bindParam(':name_up', $name_up);
                    $update_stmt->bindParam(':quantity_up', $quantity_up);
                    $update_stmt->bindParam(':cost_up', $cost_up);
                    $update_stmt->bindParam(':brand_up', $brand_up);
                    $update_stmt->bindParam(':model_up', $model_up);
                    $update_stmt->bindParam(':machinenumber_up', $machinenumber_up);
                    $update_stmt->bindParam(':owner_up', $owner_up);
                    $update_stmt->bindParam(':room_up', $room_up);                

                    if ($update_stmt->execute()) {
                        $updateMsg = "ข้อมูลสำเร็จ";
                        header("refresh:1;work.php");
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>แก้ไขข้อมูล</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <script src="https://kit.fontawesome.com/3e64f925aa.js" crossorigin="anonymous"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h4>ระบบจัดการครุภัณฑ์</h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="home.php">
                                <i class="fas fa-home"></i>หน้าหลัก</a>
                        </li>
                        <li class="active">
                            <a href="work.php" id ="wrkingnow" onclick="workingnow()">
                                <i class="fas fa-eye"></i>การตรวจนับ</a>
                        </li>
                        <li>
                            <a href="qrcode.php">
                                <i class="far fas fa-qrcode"></i>QRCODE</a>
                        </li>
                        <li>
                            <a href="conclude.php" id="concludebtn" onclick="showconcloude()">
                                <i class="fas fa-table"></i>หน้าต่างสรุปผล</a>
                        </li>                          
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header"></form>
                            <div class="header-button">                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">                                       
                                        <div class="content">                                         
                                            <a class="js-acc-btn" href="#">JOB</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>บัญชี</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>ตั้งค่า</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>ออกจากระบบ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">                    
                        <div class="card">
                                    <div class="card-header">
                                        แก้ไข
                                        <strong>ข้อมูล</strong>
                                    </div>
                                <div class="card-body card-block">
                                    <?php 
                                        if(isset($errorMsg)){
                                    ?>
                                        <div class="alert alert-danger">
                                            <strong>ผิดพลาด <?php echo $errorMsg;?></strong>
                                        </div>
                                    <?php } ?>

                                    <?php 
                                    if (isset($updateMsg)) {
                                    ?>
                                    <div class="alert alert-success">
                                        <strong>แก้ไข <?php echo $updateMsg; ?></strong>
                                    </div>
                                    <?php } ?>

                                    <form method="post" class="form-horizontal mt-5">                                       
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="id" class="col-sm-3 control-label">ลำดับ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_name" class="form-control" value="<?php echo $id; ?>"  readonly>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="assetnumber" class="col-sm-3 control-label">หมายเลขสินทรัพย์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_assetnumber" class="form-control" value="<?php echo $assetnumber; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="name" class="col-sm-3 control-label">ชื่อ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_name" class="form-control" value="<?php echo $name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="quantity" class="col-sm-3 control-label">ปริมาณ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_quantity" class="form-control" value="<?php echo $quantity; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="cost" class="col-sm-3 control-label">ต้นทุนต่อหน่วย</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_cost" class="form-control" value="<?php echo $cost; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="brand" class="col-sm-3 control-label">ยี่ห้อ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_brand" class="form-control" value="<?php echo $brand; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="model" class="col-sm-3 control-label">โมเดล</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_model" class="form-control" value="<?php echo $model; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="machinenumber" class="col-sm-3 control-label">หมายเลขเครื่อง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_machinenumber" class="form-control" value="<?php echo $machinenumber; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="owner" class="col-sm-3 control-label">ผู้ดูแล</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_owner" class="form-control" value="<?php echo $owner; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="row">
                                                <label for="room" class="col-sm-3 control-label">ห้อง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="txt_room" class="form-control" value="<?php echo $room; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_update" class="btn btn-success" value="บันทึก">
                                                <a href="work.php" class="btn btn-danger">ยกเลิก</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="vendor/jquery-3.2.1.min.js"></script>

    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <script src="js/main.js"></script>
    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <?php
        //เวลา
        $con = mysqli_connect("localhost","root","","test_project_db");
        $datework = mysqli_query($con,"SELECT * FROM countdown_timer");
        $resultdate = mysqli_fetch_array($datework);

    ?>


    <!-- คลิกช่องตรวจนับเมื่อตรวจนับ -->
    <script>
        function workingnow(){
            var id = "<?php echo $resultdate['id']?>";
            var date = "<?php echo $resultdate['date']?>";
            if( id != "" &  date != "" ){
                document.getElementById("wrkingnow").href="working.php";
            }else{
                document.getElementById("wrkingnow").href="work.php";
            }
        }
    </script>

    <?php
        mysqli_close($con);
    ?>
</body>

</html>
