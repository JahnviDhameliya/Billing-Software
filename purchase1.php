<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
}


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Client</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header5.php'; 

$u_id=$_SESSION['username'];
$sql5 = "SELECT distinct acname FROM account WHERE user_id='$u_id'";
$result5=$conn->query($sql5); 
$sql9 = "SELECT distinct product_name FROM product WHERE user_id='$u_id' order by product_name";
$result9=$conn->query($sql9); 

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
            
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Purchase
                    
                    </h1>


<?php


    $user_id=$_SESSION['username'];
    $date=$_POST['date'];
    $pay_mode=$_POST['pay_mode'];
    $account_name=$_POST['account_name'];
    $bill_type=$_POST['bill_type'];
    $bill_number=$_POST['bill_number'];
    echo "<table><tr>
<td>User ID</td><td colspan='9'>$user_id</td></tr>
<tr><td>Date</td><td colspan='9'>$date</td></tr>
<tr><td>Payment Mode</td><td colspan='9'>$pay_mode</td></tr>
<tr><td>Account Name</td><td colspan='9'>$account_name</td></tr>
<tr><td>Bill Type</td><td colspan='9'>$bill_type</td></tr>
<tr><td>Bill Number</td><td colspan='9'>$bill_number</td></tr>
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Base Amount</th>
<th>Discount in %</th>
<th>Discount in Amount</th>
<th>SGST</th>
<th>CGST</th>
<th>IGST</th>
<th>Total Amount</th>
 
</tr>";

    for($a=0;$a<count($_POST['quantity']);$a++){
            $product=$_POST['product'][$a];
            $quantity=$_POST['quantity'][$a];
            $price=$_POST['price'][$a];
            $dis_p=$_POST['dis_p'][$a];
            
    
            $ba=$quantity*$price;
            $dis_a=($dis_p*$ba)/100;
            $ta=$ba-$dis_a;
        
            $sql7 = "SELECT charge1,charge2,charge3,charge4 FROM product WHERE product_name='$product'";
            $result7=$conn->query($sql7); 
            while($row7 = $result7->fetch_assoc()) {
            $charge1=$row7['charge1'];
            $charge2=$row7['charge2'];
            $charge3=$row7['charge3'];
            $charge4=$row7['charge4'];
            
        }
        if($bill_type=='LOCAL B2B'){
            $c1=($charge1*$ta)/100;
            $c2=($charge2*$ta)/100;
            $ta=$ta+$c1+$c2;
            $s=$c1;
            $c=$c2;
            $i=0;
        }
        else if($bill_type=='INTERESTED B2B'){
            $c3=($charge3*$ta)/100;
            $ta=$ta+$c3;
            $s=0;
            $c=0;
            $i=$c3;;

        }
        else if($bill_type=='TAX FREE'){
            $ta=$ta;
            $s=0;
            $c=0;
            $i=0;

        }
        else{
            $c1=($charge1*$ta)/100;
            $c2=($charge2*$ta)/100;
            $c3=($charge3*$ta)/100;
            $c4=($charge4*$ta)/100;
        $ta=$ta+$c1+$c2+$c3+$c4;
        $s=$c1;
        $c=$c2;
        $i=$c3;
        }


         $sql = "INSERT INTO purchase (user_id,date,payment_mode,ac_name,bill_type,bill_number,pd_select,quantity,price,discount,d_amount,b_amount,t_amount) VALUES ('$user_id','$date','$pay_mode','$account_name','$bill_type','$bill_number','$product','$quantity','$price','$dis_p','$dis_a','$ba','$ta')";
         mysqli_query($conn, $sql);

         echo"<tr>
         <td>$product</td>
         <td>$quantity</td>
         <td>$price</td>
         <td>$ba</td>
         <td>$dis_p</td>
         <td>$dis_a</td>
         <td>$s</td>
         <td>$c</td>
         <td>$i</td>
         <td>$ta</td>
          
      </tr>";

    }

     echo "
     </table>
<tbody id='tbody'>";
 
?>