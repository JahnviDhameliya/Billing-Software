<html>
<head>
   
</head>
<body>

<?php


require_once __DIR__ . '/vendor/autoload.php';
session_start();
	include'conith.php';
	$username = $_SESSION["username"];

	$sql = "SELECT * FROM user WHERE user_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)){
          $name=$row['name'];
          $add1=$row['add1'];
          $add2=$row['add2'];
          $phone=$row['mob1'];
        }}
    else {
	    header("Location: index.php");
   }

$r_number=$_REQUEST['reciept_no'];
$sql2 = "SELECT *  FROM payout  WHERE reciept_no='$r_number'";
$result2 = $conn->query($sql2);


$mpdf = new \Mpdf\Mpdf();
$data = "";
$data .='<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:auto;
	margin-left:0%;
	font-size:110%;
    border: 1px;
    
}


.container{
    margin-left: auto;
    margin-right: auto;
     border-color: black;
     border: 1px solid;
     text-align: left;
     width: 100%;
     position: relative;
 }
.detail1 {
text-align: center; 
}

p{

    margin: left 10px;
    margin: top 10px;
    padding: 5px;
}
hr{
 height:2px;
 width:100%;
 background-color: black;
 border-color: black;
 border-width: 4px;
}
h5{
padding-left: 10%;
}

</style>';
$data .= " <h4><center>Payment</center></h4>
    <div class='container'>
    <div class='detail1'>
    <p>$name</p>
   <p>$add1</p>
   <p>$add2</p>
   <p>$phone</p>

   
  </div>
   <hr>";

   while($row2 = mysqli_fetch_array($result2)){
    $date=$row2['date'];
    $payment_mode=$row2['payment_mode'];
    $reciept_no=$row2['reciept_no'];
    $p_name=$row2['party_name'];
    $t_amount=$row2['total_amount'];
    $d_amount=$row2['discount_amount'];
    $remark=$row2['remark'];
    $total=$row2['total'];
}

$data .="
   <div class='data'>

    <p> <b>Party Name: </b> $p_name   &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <b> Reciept No: </b>$reciept_no</p> 
    <p> <b>Amount: </b> $t_amount   &nbsp;&nbsp;&nbsp;  <b> Discount: </b>$d_amount</p> 
    <p> <b> Toatl: </b>$total</p> 
    <p> <b>Remark: </b> $remark </p> 
  
    </div>";

    $conn->close();

$mpdf->WriteHtml($data);
$mpdf->output("data.pdf",'D');
echo $data;

$conn->close();

?>

</body>
</html>