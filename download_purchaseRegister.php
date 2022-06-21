<html>
<head>
   
</head>
<body>

<?php


require_once __DIR__ . '/vendor/autoload.php';
session_start();
	include'conith.php';
    $u_id = $_SESSION["username"];
   
    $s_date=$_REQUEST['s_date'];
    $e_date=$_REQUEST['e_date'];
    $total=0;
 
 
    if($s_date=="" or $e_date==""){
    $sql = "SELECT date,pd_select,ac_name,d_amount,t_amount,pd_select,bill_type,b_amount FROM purchase WHERE user_id='$u_id' order by date ";
 }
 else if($s_date!="" or $e_date!=""){
    $sql = "SELECT date,pd_select,ac_name,d_amount,t_amount,pd_select,bill_type,b_amount FROM purchase WHERE user_id='$u_id' and date BETWEEN '$s_date' and '$e_date' order by date ";
 }
 
 $result = $conn->query($sql);

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
   

    $data .= "<table class='table'>
 


<tr>
    <th>Date</th>
    <th>Account Name</th>
    <th>SGST</th>
    <th>SGST</th>
    <th>IGST</th>
    <th>Discount in Amount</th>
    <th>Total Amount</th>
   
</tr>
";

$total=0;

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc() ) {

        $product=$row['pd_select'];
        $b_amount=$row['b_amount'];
        $bill_type=$row['bill_type'];
        $ta=$row['t_amount'];
                 
        $sql2 = "SELECT charge1,charge2,charge3 FROM product WHERE user_id='$u_id' and product_name='$product'";
                $result2 = $conn->query($sql2);
                while($rows=$result2->fetch_assoc()){
                    $charge1=$rows['charge1'];
                    $charge2=$rows['charge2'];
                    $charge3=$rows['charge3'];
                }
    
                if($bill_type=='LOCAL B2B'){
                    $c1=($b_amount*$charge1)/100;
                    $c2=($b_amount*$charge2)/100;
                    $c3=0;
          
                }
                else if($bill_type=='INTERESTED B2B'){
                    $c1=0;
                    $c2=0;
                    $c3=($b_amount*$charge3)/100;
                  
                }
                else{
                    $c1=0;
                    $c2=0;
                    $c3=0;
               
                }
                $total=$total+$ta;

                $data .="<tr><td>".$row["date"]."</td>
                            <td>".$row["ac_name"]."</td>
                            <td>".$c1."</td>
                            <td>".$c2."</td>
                            <td>".$c3."</td>
                            <td>".$row["d_amount"]."</td>
                            <td>".$row["t_amount"]."</td></tr>\n";
       
                          
            }
}


$data .="<tr>
<td colspan='6'><b>Total</b></td>
<td>$total</td></tr></table>";
$mpdf->WriteHtml($data);
$mpdf->output("data.pdf",'D');
//echo $data;



$conn->close();
?>

</body>
</html>