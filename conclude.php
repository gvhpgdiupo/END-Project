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
    <title>สรุป</title>

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
        .countdown.show .running {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-flow: wrap;
            flex-flow: wrap;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        }

        .countdown.show .running timer {
        font-size: 55px;
        font-weight: 600;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        line-height: 1;
        color: #8c0734;
        }

        .countdown.show .running timer .days,
        .countdown.show .running timer .hours,
        .countdown.show .running timer .minutes,
        .countdown.show .running timer .seconds{
        width: 70px;
        text-align: left;
        margin: 0 7px;
        }

        @media (max-width: 480px) {
        .countdown.show .running timer  {
            font-size: 40px;
        }
        .countdown.show .running timer .days,
        .countdown.show .running timer .hours,
        .countdown.show .running timer .minutes,
        .countdown.show .running timer .seconds {
            width: 49px;
        }
        }

        .countdown.show .running .labels{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-size: 14px;
        }

        .countdown.show .running .labels span{
        width: 97px;
        text-align: center;
        margin: 0px 2px;
        }

        @media (max-width: 480px) {
        .countdown.show .running .labels span{
            width: 69px;
        }
        }

        .countdown.show .running .text{
        font-size: 20px;
        margin-top: 12px;
        font-weight: 600;
        }

        .countdown.show .running button{
        border: none;
        background-color: black;
        color: white;
        border-radius: 25px;
        padding: 10px 20px;
        margin: 10px;
        }

        .countdown.show .running .break{
        -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
        height: 0;
        }

        .countdown.show .ended{
        display: none;
        -ms-flex-flow: wrap;
            flex-flow: wrap;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        }

        .countdown.show .ended .text{
        font-size: 20px;
        }

        .countdown.show .ended button {
        border: none;
        background-color: #5a0000;
        color: white;
        border-radius: 25px;
        padding: 10px 20px;
        margin: 10px;
        }

        .countdown.show .ended .break{
        -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
        height: 0;
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
                        <li>
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
                                <?php
                                    //   $con = mysqli_connect("localhost","root","","test_project_db");
                                    //   $resultname= mysqli_query($con,"SELECT * FROM name_working ORDER BY id DESC LIMIT 1");
                                    //   $namework =  mysqli_fetch_array($resultname);
                                ?>
                                <div class="overview-wrap">
                                    <!-- <h2 class="title-1"></?php echo $namework['name']?></h2> -->
                                </div>
                                <?php 
                                    // mysqli_close($con);
                                ?>     
                                              
                        </div> 

                            <?php    
                                $con = mysqli_connect("localhost","root","","test_project_db");
                                $conclude_name= mysqli_query($con,"SELECT * FROM name_working_database ORDER BY id asc");
                            ?>
                            <!-- เลือกสรุปที่จะแสดง -->
                            <form method="post">
                               <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <h4 for="select" class=" form-control-label">เลือกสรุปการตรวจนับ</h4>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="select_show_finish" class="form-control"  require>
                                                        <option value="">เลือกดูสรุป</option>
                                                        <?php foreach($conclude_name as $conclude_names){?>
                                                        <option value="<?php echo $conclude_names["name_work_database"];?>">
                                                            <?php echo $conclude_names["name_work_database"]?>
                                                        </option>
                                                        <?php }?>
                                                    </select>  

                                                    <div class="pull-right mt-3">                                              
                                                        <input type="submit" name="btn_showfinish" class="btn btn-outline-primary btn-lg" value="เรียกดู">
                                                    </div>                                          
                                                </div>
                                </div>
                            </form>
                                <!-- จบเลือกสรุป -->
                            
                    <!-- กล่องบอกสถานะ -->
                    <?php
                        if (isset($_REQUEST['btn_showfinish'])) {
                            $con = mysqli_connect("localhost","root","","test_project_db");
                            $show_finish = $_POST['select_show_finish'];
                            $new_showfinish = preg_replace('/[[:space:]]+/', '', trim($show_finish));

                            $conclude_pdf_room= mysqli_query($con,"SELECT DISTINCT room FROM $new_showfinish");
                            $conclude_pdf_owner= mysqli_query($con,"SELECT DISTINCT owner FROM $new_showfinish");
                            $conclude_pdf_state= mysqli_query($con,"SELECT DISTINCT state FROM $new_showfinish");

                            $conclude_sqluse = mysqli_query($con,"SELECT * FROM $new_showfinish WHERE state = 'ใช้งาน'");
                            $conclude_numrow = mysqli_num_rows($conclude_sqluse);
                    ?>
                        <h3><mark><?php echo $show_finish?></mark></h3>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-business-time"></i>
                                            </div>
                                            <div class="text">                   
                                                <h2><?php echo $conclude_numrow?></h2>
                                                <span>ใช้งาน</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <?php
                                $conclude_sqlcrash= mysqli_query($con,"SELECT * FROM $new_showfinish WHERE state = 'ชำรุด'");
                                $conclude_numrowcrash = mysqli_num_rows($conclude_sqlcrash);
                            ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-wrench"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $conclude_numrowcrash?></h2>
                                                <span>ชำรุด</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                $conclude_sqldeteriorate= mysqli_query($con,"SELECT * FROM $new_showfinish WHERE state = 'เสื่อมสภาพ'");
                                $conclude_numrowdeteriorate = mysqli_num_rows($conclude_sqldeteriorate);
                            ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-refresh-sync-off"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $conclude_numrowdeteriorate?></h2>
                                                <span>เสื่อมสภาพ</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                $conclude_sqlnoneed= mysqli_query($con,"SELECT * FROM $new_showfinish WHERE state = 'หมดความจำเป็น'");
                                $conclude_numrownoneed = mysqli_num_rows($conclude_sqlnoneed);
                            ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-block"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $conclude_numrownoneed?></h2>
                                                <span>หมดความจำเป็น</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- จบกล่องบอกสถานะ -->

                        <!-- ชาร์ต -->
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">ชาร์ตสถานะ</h3>
                                        <canvas id="pieChart1"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">ชาร์ตการตรวจนับ</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>ตรวจนับแล้ว</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>ตรวจไม่พบ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart1"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>             
                        <!-- จบชาร์ต -->

                            <!-- ปุ่ม excel pdf -->
                            <div class="card-body">                             
                                    <a class="btn btn-success" href="exportexcel.php?namedatabase=<?php echo $new_showfinish?>" role="button" name="export"><i class="fas fa-file-excel"></i>  EXCEL</a>
                                    <a class="btn btn-danger" href="exportpdf.php?namedatabase=<?php echo $new_showfinish?>" role="button" target ="_blank"><i class="fas fa-file-pdf"></i>  PDF</a>

                                    <div class="row form-group pull-right">
                                                <div class="col-12 col-sm-4">
                                                    <select name="select_show_finish" class="form-control"  require>
                                                        <option value="">ห้อง</option>
                                                        <?php foreach($conclude_pdf_room as $conclude_pdf_rooms){?>
                                                        <option value="<?php echo $conclude_pdf_rooms["room"];?>">
                                                            <?php echo $conclude_pdf_rooms["room"]?>
                                                        </option>
                                                        <?php }?>
                                                    </select>  
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <select name="select_show_finish" class="form-control"  require>
                                                        <option value="">ผู้ดูแล</option>
                                                        <?php foreach($conclude_pdf_owner as $conclude_pdf_owners){?>
                                                        <option value="<?php echo $conclude_pdf_owners["owner"];?>">
                                                            <?php echo $conclude_pdf_owners["owner"]?>
                                                        </option>
                                                        <?php }?>
                                                    </select>  
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <select name="select_show_finish" class="form-control"  require>
                                                        <option value="">สถานะ</option>
                                                        <?php foreach($conclude_pdf_state as $conclude_pdf_states){?>
                                                        <option value="<?php echo $conclude_pdf_states["state"];?>">
                                                            <?php echo $conclude_pdf_states["state"]?>
                                                        </option>
                                                        <?php }?>
                                                    </select>  
                                                </div>
                                    </div>
                                    <div class="mr-3 pull-right">
                                        <button class="btn btn-primary">ปริ้นตามหมวดหมู่</button>
                                    </div>
                            </div>
                            
                             <!-- จบปุ่ม excel pdf -->
                             
                    <?php 
                        mysqli_close($con);
                        }
                    ?>
                                      
                            <!-- ตาราง -->
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
                                            <th><abbr title="หมายเลขเครื่อง">เลขเครื่อง</abbr></th>
                                            <th>ผู้ดูแล</th>
                                            <th>ห้อง</th>
                                            <th><abbr title="สถานะการตรวจนับ">สถานะ</abbr></th>
                                            <th>รูป</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php      
                                    if (isset($_REQUEST['btn_showfinish'])) {
                                        $show_finish = $_POST['select_show_finish'];
                                        if($show_finish === ""){
                                            echo "<script>";
                                            echo"alert('กรุณาเลือกสรุปที่จะดู');";
                                            echo"window.location ='conclude.php';";
                                            echo "</script>";
                                        }else{
                                            $con = mysqli_connect("localhost","root","","test_project_db");
                                            
                                            $new_showfinish = preg_replace('/[[:space:]]+/', '', trim($show_finish));
                                            
                                            $sqlSelect = "SELECT * FROM $new_showfinish";
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
                                                <td><?php echo $row["state"]; ?></td>
                                                <td><a class="example-image-link" href="<?php echo $row['urlPicture'];?>" data-lightbox="image-1"><?php echo '<img  src="'.$row['urlPicture'].'" width="50" height="50">'?></a></td>
                                            </tr>

                                            <?php } 
                                                mysqli_close($con);
                                            }
                                        }                                             
                                            ?>
                                    </tbody>
                                </table>                                                               
                            </div>
                            <!-- จบตาราง -->                                 
                        </div>  
                    </div>
                     <!-- โมเดล -->
                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">แก้ไขระยะเวลาการตรวจนับ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="add.php" method="post">
                                <div class="modal-body">

                                    <div class="form-group row">
                                        <label for="example-datetime-local-input" class="col-2 col-form-label">แก้ไขวันที่</label>
                                        <div class="col-10">
                                            <input class="form-control" type="date" id="example-datetime-local-input" name="date_edit">
                                        </div>
                                    </div>   
                                
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                        <button type="submit" name="datebt_edit" class="btn btn-primary">ตกลง</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div> 
                <!-- จบโมเดล -->

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
    
    <script src="js/multi-countdown.js"></script>
    
    <!-- ตารางสวยงาม -->
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>

    <?php
        if (isset($_REQUEST['btn_showfinish'])) {
            $con = mysqli_connect("localhost","root","","test_project_db");
            $show_finish = $_POST['select_show_finish'];
            $new_showfinish = preg_replace('/[[:space:]]+/', '', trim($show_finish));

            $conclude = mysqli_query($con,"SELECT * FROM $new_showfinish ");
            $resultconclude = mysqli_num_rows($conclude);

            $datework = mysqli_query($con,"SELECT * FROM countdown_timer");
            $resultdate = mysqli_fetch_array($datework);

            $datanum_notcheck= mysqli_query($con,"SELECT * FROM $new_showfinish  WHERE state ='ตรวจไม่พบ'");
            $datanum_check= mysqli_query($con,"SELECT * FROM $new_showfinish  WHERE state !='ตรวจไม่พบ'");

            $result_datanum_notcheck = mysqli_num_rows($datanum_notcheck);
            $result_datanum_check = mysqli_num_rows($datanum_check); 

            $datanum_use= mysqli_query($con,"SELECT * FROM $new_showfinish  WHERE state ='ใช้งาน'");
            $datanum_crash= mysqli_query($con,"SELECT * FROM $new_showfinish  WHERE state ='ชำรุด'");  
            $datanum_deteriorate= mysqli_query($con,"SELECT * FROM $new_showfinish  WHERE state ='เสื่อมสภาพ'");
            $datanum_noneed= mysqli_query($con,"SELECT * FROM $new_showfinish  WHERE state ='หมดความจำเป็น'"); 

            $result_datanum_use = mysqli_num_rows($datanum_use);
            $result_datanum_crash = mysqli_num_rows($datanum_crash); 
            $result_datanum_deteriorate = mysqli_num_rows($datanum_deteriorate);
            $result_datanum_noneed = mysqli_num_rows($datanum_noneed);  
        }
    ?>

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


    <!-- ห้ามกลับ -->
    <script type="text/javascript" >
        history.pushState(null, null, '');
        window.addEventListener('popstate', function(event) {
        history.pushState(null, null, '');
        });
    </script>

    <!-- ชาร์ต -->
    <script>
        var ctx = document.getElementById("percent-chart1");
        if (ctx) {
        ctx.height = 280;
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            datasets: [
                {
                label: "My First dataset",
                data: [<?php echo $result_datanum_check?>, <?php echo $result_datanum_notcheck?>],
                backgroundColor: [
                    '#00b5e9',
                    '#fa4251'
                    
                ],
                hoverBackgroundColor: [
                    '#00b5e9',
                    '#fa4251'
                ],
                borderWidth: [
                    0, 0
                ],
                hoverBorderColor: [
                    'transparent',
                    'transparent'
                ]
                }
            ],
            labels: [
                'ตรวจนับแล้ว', 
                'ตรวจไม่พบ'                 
            ]
            },
            options: {
            maintainAspectRatio: false,
            responsive: true,
            cutoutPercentage: 55,
            animation: {
                animateScale: true,
                animateRotate: true
            },
            legend: {
                display: false
            },
            tooltips: {
                titleFontFamily: "Poppins",
                xPadding: 15,
                yPadding: 10,
                caretPadding: 0,
                bodyFontSize: 16
            }
            }
        });
        }

        var ctx = document.getElementById("pieChart1");
        if (ctx) {
        ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
            datasets: [{
                data: [<?php echo $result_datanum_use?>, <?php echo $result_datanum_crash?>, <?php echo $result_datanum_deteriorate?>, <?php echo $result_datanum_noneed?>],
                backgroundColor: [
                    "#FF6384",
                    "#4BC0C0",
                    "#FFCE56",
                    "#36A2EB"
                    
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#4BC0C0",
                    "#FFCE56",
                    "#36A2EB"
                ]

            }],
            labels: [
                "ใข้งาน",
                "ชำรุด",
                "เสื่อมสภาพ",
                "หมดความจำเป็น"
            ]
            },
            options: {
            legend: {
                position: 'top',
                labels: {
                fontFamily: 'Poppins'
                }

            },
            responsive: true
            }
        });
        }

    </script>

    <?php
        mysqli_close($con);
    ?>

</body>

</html>
