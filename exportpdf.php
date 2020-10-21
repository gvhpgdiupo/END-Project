

<?php

require_once __DIR__ . '/vendor/autoload.php';

    $con = mysqli_connect("localhost","root","","test_project_db");
    $namedata = $_REQUEST['namedatabase'];

    $query ="SELECT * FROM $namedata";
    $result = mysqli_query($con,$query);
    $output='';

    if(mysqli_num_rows($result) > 0){
        $costtotal = 0;
        while($row = mysqli_fetch_assoc($result)){
            $total = $row['quantity']*$row['cost'];
            $Grandtotal +=$total;

            $tabalebody1 .='<tr style="border:1px solid #000;">
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['id'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['assetnumber'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['name'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['brand'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['model'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['machinenumber'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['owner'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['room'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['state'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;"><img src="'.$row['urlPicture'].'" width="100" height="100"></td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['quantity'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:center;">'.$row['cost'].'</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:right;">'.number_format($total,2).'</td>
            </tr>';
        }
            $tabalebody2 .='<tr style="border:1px solid #000;">
                            <td colspan="12" style="border-right:1px solid #000;padding:3px;text-align:center;">ราคา
                                รวม</td>
                            <td style="border-right:1px solid #000;padding:3px;text-align:right;">'.number_format($Grandtotal,2).'</td>
            </tr>';

            $tabalebody3 .='<tr style="border:0px solid #000;">
                            <td colspan="12" style="border-right:1px solid #000;padding:3px;text-align:center;">
                            <br><br>
                            ลงชื่อ(....../....../....../....../....../....../....../....../....../....../....../....../....../....../....../....../....../......)
                            </td>
            
            </tr>';
    }

    mysqli_close($con);

    $mpdf = new \Mpdf\Mpdf();
    
    $tableh ='
    <style>
        body{
            font-family: "Garuda";
        }
    </style>
    <h2 style="text-align:center">'.$namedata.'</h2>
    <h4>รายละเอียด.....</h4>
    <table width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px" >
        <tr style="border:1px solid #000;padding:4px;">
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ลำดับ</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >หมายเลขสินทรัพย์</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ชื่อ</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ยี่ห้อ</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >โมเดล</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >หมายเลขเครื่อง</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ผู้รับผิดชอบ</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >สถานที่ใช้งาน</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >สถานะ</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >รูป</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ปริมาณ</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ต้นทุนต่อหน่วย</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >ราคารวมทั้งหมด</td>
        </tr>
</thead>
    <tbody>';

    $tableend="</tbody>
</table>";
$mpdf->AddPage('L'); 

$mpdf->WriteHTML($tableh);

$mpdf->WriteHTML($tabalebody1);
$mpdf->WriteHTML($tabalebody2);
$mpdf->WriteHTML($tabalebody3);

$mpdf->WriteHTML($tableend);

$mpdf->Output();


?>