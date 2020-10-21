<?php 
    require_once('connection.php');

    if (isset($_REQUEST['delete_id'])) {

        $id = $_REQUEST['delete_id'];
        $select_stmt = $db->prepare("SELECT * FROM tbl_test1 WHERE id = :id");
        $select_stmtqr = $db->prepare("SELECT * FROM qrcode WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmtqr->bindParam(':id', $id);
        $select_stmt->execute();
        $select_stmtqr->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        $rowqr = $select_stmtqr->fetch(PDO::FETCH_ASSOC);

        $delete_stmt = $db->prepare('DELETE FROM tbl_test1 WHERE id = :id');
        $delete_stmtqr = $db->prepare('DELETE FROM qrcode WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmtqr->bindParam(':id', $id);
        $delete_stmt->execute();
        $delete_stmtqr->execute();

        header('Location:work.php');
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
    <title>จัดการข้อมูล</title>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <script src="https://kit.fontawesome.com/3e64f925aa.js" crossorigin="anonymous"></script>

    
    
    <style>
        td {
            text-align:center;
        }
        th{
            text-overflow: ellipsis;
        }
    </style>

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
                                <i class="fas fa-book"></i>หน้าต่างสรุปผล</a>
                        </li>                            
                    </ul>                         
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
                    <div class="container w3-padding-large">
                        <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">จัดการข้อมูลครุภัณฑ์</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue" onclick="openandclose()">
                                        <i class="zmdi zmdi-plus"></i>เพิ่มข้อมูล</button>
                                </div>
                        </div>                    
                        <form action="add.php" method="post" class="card-header pull-right mb-4" id="myDIV" style="display: none;" enctype="multipart/form-data">
                            <div class="input-group mb-3">                           
                                <div class="input-group-prepend">
                                    <button class="btn btn-info" type="submit" id="submit" name="import">บันทึก</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="file" accept=".xls,.xlsx">
                                    <label class="custom-file-label" for="file">เลือกไฟล์</label>
                                </div>
                            </div>
                        </form>
                        
                            <div class="card-body">
                                <table class="table table-hover mt-3 " id="datatable">
                                    <thead class="thead-dark">
                                        <tr>    
                                            <th>ลำดับ</th>                 
                                            <th><abbr title="หมายเลขสินทรัพย์">รหัส</abbr></th>
                                            <th>ชื่อ</th>
                                            <th>ปริมาณ</th>
                                            <th><abbr title="ต้นทุนต่อหน่วย">ราคา</abbr></th>               
                                            <th>ยี่ห้อ</th>
                                            <th>โมเดล</th>
                                            <th><abbr title="หมายเลขเครื่อง">ลค</abbr></th>
                                            <th><abbr title="ผู้ดูแล">ผดล</abbr></th>
                                            <th>ห้อง</th>
                                            <th>แก้ไข</th>
                                            <th>ลบข้อมูล</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                
                                            $con = mysqli_connect("localhost","root","","test_project_db");
                                            $sqlSelect = "SELECT * FROM tbl_test1";
                                            $result = mysqli_query($con, $sqlSelect);

                                            while($row = mysqli_fetch_array($result)){               
                                        ?> 
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["assetnumber"]; ?></td>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["quantity"]; ?></td>
                                                <td><?php echo $row["cost"]; ?></td>
                                                <td><?php echo $row["brand"]; ?></td>
                                                <td><?php echo $row["model"]; ?></td>
                                                <td><?php echo $row["machinenumber"]; ?></td>
                                                <td><?php echo $row["owner"]; ?></td>
                                                <td><?php echo $row["room"]; ?></td>
                                                <td><a href="edit.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-warning">แก้ไข</a></td>
                                                <td><a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger">ลบข้อมูล</a></td>
                                            </tr>

                                            <?php } 
                                                mysqli_close($con);
                                            ?>
                                    </tbody>
                                </table>                                                               
                            </div>
                                <div class="user-data__footer">                        
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mediumModal">
                                     <i class="fa fa-star"></i>&nbsp; เริ่มการตรวจนับ</button>
                                </div>                                    
                        </div>  
                    </div>
                </div>
            </div>
            <!-- โมเดล -->
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">เลือกระยะเวลาการตรวจนับ</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form action="add.php" method="post">
						    <div class="modal-body">

                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-2 col-form-label">ชื่อการตรวจนับ</label>
                                    <div class="col-10">
                                        <input class="form-control" name="namework">
                                    </div>
                                </div>   
                                
                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-2 col-form-label">ตรวจนับถึงวันที่</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" id="example-datetime-local-input" name="date">
                                    </div>
                                </div>   
                        
                                <p class="text-center p-3 mb-2 bg-dark text-white rounded">การตรวจนับจะเริ่มนับตั้งแต่วันที่กดปุ่ม <mark class="rounded">เริ่มการตรวจนับ</mark></p>
                            
						    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" name="datebt" class="btn btn-primary">ตกลง</button>
                                </div>
                        </form>
					</div>
				</div>
			</div> 
            <!--จบโมเดล -->
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

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script> 

    <script>
        function openandclose() {
        var hide = document.getElementById("myDIV");
        if (hide.style.display === "none") {
            hide.style.display = "block";
        } else {
            hide.style.display = "none";
        }
        }
    </script>

    <?php
        //เวลา
        $con = mysqli_connect("localhost","root","","test_project_db");
        $datework = mysqli_query($con,"SELECT * FROM countdown_timer");
        $resultdate = mysqli_fetch_array($datework);

        $conclude = mysqli_query($con,"SELECT * FROM conclusion_table");
        $resultconclude = mysqli_num_rows($conclude);
    ?>

    <!-- เวลาซ่อนเวลาหาย โชว์สรุป-->
    <script type = "text/javascript">
        (() => {
            function hidetimecd() {
                var id = "<?php echo $resultdate['id']?>";
                var date = "<?php echo $resultdate['date']?>";
                var cdtimeworking = document.getElementById("cdtime");
                if (id != "" &  date != "" ) {
                    cdtimeworking.style.display = "block";
                } else {
                    cdtimeworking.style.display = "none";
                }
            }       
            hidetimecd(); 
        })();
    </script> 

    <!-- โชว์สรุป -->
    <!-- <script>
        function showconcloude(){
                var conclude =  "</?php echo $resultconclude?>";
                if(conclude>0){
                    document.getElementById("concludebtn").href="conclude.php";
                }else{
                    document.getElementById("concludebtn").href="#";
                }
            }
    </script> -->
    
    <!-- เปลี่ยนหน้าตรวจนับ -->
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
