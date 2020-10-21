<?php
    // $con = mysqli_connect("localhost","root","","test_project_db");
    // $sql = "SELECT * FROM conclusion_table";
    // $res = mysqli_query($con,$sql);
    // $html='<table class="table" borderd="1"><tr><td>ลำดับ</td><td>หมายเลขสินทรัพย์</td><td>ชื่อ</td><td>ปริมาณ</td><td>ต้นทุนต่อหน่วย</td><td>ยี่ห้อ</td><td>โมเดล</td><td>หมายเลขเครื่อง</td><td>ผู้ดูแล</td><td>ห้อง</td><td>สถานะการตรวจนับ</td></tr></table>';
    // while($row =mysqli_fetch_assoc($res)){
    //     $html.='<tr><td>'.$row['id'].'</td><td>'.$row['assetnumber'].'</td><td>'.$row['name'].'</td><td>'.$row['quantity'].'</td><td>'.$row['cost'].'</td><td>'.$row['brand'].'</td><td>'.$row['model'].'</td><td>'.$row['machinenumber'].'</td><td>'.$row['owner'].'</td><td>'.$row['room'].'</td><td>'.$row['state'].'</td></tr>';
    // }
    // $html.='</table>';
    // header('Content-Type:application/xls');
    // header('Content-Disposition:attachment;filename=report.xls');
    // echo $html;
?>
<?php
    $namedata = $_REQUEST['namedatabase'];
    $con = mysqli_connect("localhost","root","","test_project_db");
    $output='';

        $query ="SELECT * FROM $namedata";
        $result = mysqli_query($con,$query);

            $output .=
            '<table class="table" borderd="1">
                <tr>
                    <th>ลำดับ</th>                 
                    <th>หมายเลขสินทรัพย์</th>
                    <th>ชื่อ</th>
                    <th>ปริมาณ</th>
                    <th>ต้นทุนต่อหน่วย</th>               
                    <th>ยี่ห้อ</th>
                    <th>โมเดล</th>
                    <th>หมายเลขเครื่อง</th>
                    <th>ผู้ดูแล</th>
                    <th>ห้อง</th>
                    <th>สถานะการตรวจนับ</th>
                </tr>';
                while($row=mysqli_fetch_array($result))
                {
                    $output .=
                    '<tr>
                        <td>'.$row["id"].'</td>
                        <td>'.$row["assetnumber"].'</td>
                        <td>'.$row["name"].'</td>
                        <td>'.$row["quantity"].'</td>
                        <td>'.$row["cost"].'</td>
                        <td>'.$row["brand"].'</td>
                        <td>'.$row["model"].'</td>
                        <td>'.$row["machinenumber"].'</td>
                        <td>'.$row["owner"].'</td>
                        <td>'.$row["room"].'</td>
                        <td>'.$row["state"].'</td>
                    </tr>';
                }
                $output .= '</table>';
                header('Content-Type: application/xls');
                header('Content-Disposition:attachment; filename='.$namedata.'.xls');

                echo $output;
        
    
?>
