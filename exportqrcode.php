
<?php

require_once __DIR__ . '/vendor/autoload.php';

    $con = mysqli_connect("localhost","root","","test_project_db");

    $query ='SELECT * FROM qrcode';
    $result = mysqli_query($con,$query);
    $output='';

    if(mysqli_num_rows($result) > 0){
        $costtotal = 0;
        while($row = mysqli_fetch_assoc($result)){
 
            $tabalebody1 .='<tr style="border:1px solid #000;">                           
                            <td style="padding:3px;text-align:center;">'.$row['assetnumber'].'</td>
                            <td style="padding:3px;text-align:center;"><img src="gen_qrcode.php?w='.$row['assetnumber'].'" width="100" height="100"></td>
                         
            </tr>';
        }
    }

    mysqli_close($con);

    $mpdf = new \Mpdf\Mpdf();
    
    $tableh ='
    <style>
        body{
            font-family: "Garuda";
        }
    </style>
    <h2 style="text-align:center">QR CODE</h2>
    <h4>รายละเอียด.....</h4>
    <table width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px" >
        <tr style="border:1px solid #000;padding:4px;">
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >หมายเลขสินทรัพย์</td>
            <td style="border-right:1px solid #000;padding:4px;text-align:center;" >QRCODE</td>
        </tr>
</thead>
    <tbody>';

    $tableend="</tbody>
</table>";
//$mpdf->AddPage('L'); 

$mpdf->WriteHTML($tableh);

$mpdf->WriteHTML($tabalebody1);

$mpdf->WriteHTML($tableend);

$mpdf->Output();


?>