<html>
<head>
   
</head>
<body>

<?php


require_once __DIR__ . '/vendor/autoload.php';
session_start();
	include'conith.php';
    $u_id = $_SESSION["username"];
    $acname=$_REQUEST['acname'];
    $s_date=$_REQUEST['s_date'];
    $e_date=$_REQUEST['e_date'];
 
 
    if($s_date=="" or $e_date==""){
     $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname' and payment_mode='credit' and user_id='$u_id' order by date ";
     $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname' and  payment_mode='Bank' and user_id='$u_id'  order by date ";
 
 }
 else if($s_date!="" or $e_date!=""){
     $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname' and user_id='$u_id' and payment_mode='Bank' and date BETWEEN '$s_date' and '$e_date' order by date ";
     $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname' and user_id='$u_id' and payment_mode='Bank' and date BETWEEN '$s_date' and '$e_date' order by date ";
 
 }
 
 $result1 = $conn->query($sql1);
 $result2 = $conn->query($sql2);
 
 
 $sql3 = "SELECT opbal FROM account WHERE acname='$acname' and user_id='$u_id'";
 $result3 = $conn->query($sql3);
 
 if ($result3->num_rows > 0) { 
     while($row3 = $result3->fetch_assoc()) { 
         $opbal=(int)$row3['opbal'];
     }}
    
$mpdf = new \Mpdf\Mpdf();
$data = "";
$data .='<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:100%;
	margin-left:0%;
	font-size:110%;
    border: 1px dark solid;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}


hr{
 height:2px;
 width:100%;
 background-color: black;
 border-color: black;
 border-width: 4px;
}

</style>';
    $conn->close();

    $data .= "<table class='table'>
    <tr>
<th colspan='2'>OPENING AMOUNT</th>
<th>$opbal</th>

    </tr>


<tr>
    <td>DATE</td>
    <td>TYPE</td>
    <td>AMOUNT</td>

   
   
</tr>
";
$sale_total=0;
$receipt_total=0;
$total=0;

if ($result1->num_rows > 0 || $result2->num_rows > 0 ) {


  
    while($row1 = $result1->fetch_assoc() ) {

    $data .="<tr><td>".$row1["date"]."</td>\n
         <td>Sale</td>
         <td>".$row1["t_amount"]."</td></tr>\n";

         $sale_total = $sale_total+$row1["t_amount"];

    }
    while($row2 = $result2->fetch_assoc()) {
 $data .="<tr>
    <td>".$row2["date"]."</td>\n
    <td>Receipt</td>
    <td>".$row2["total"]."</td>\n
    </tr>";
                  
     $receipt_total = $receipt_total+$row2["total"];
 
    } 
}        
$total=$opbal+$sale_total-$receipt_total;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

$data .="<tr>
<td colspan='2'><b>Closing Amount</b></td>
<td>$total</td></tr></table>";
$mpdf->WriteHtml($data);
$mpdf->output("data.pdf",'D');
echo $data;




?>

</body>
</html>