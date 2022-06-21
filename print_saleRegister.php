<!DOCTYPE html>
<html>
<head>
<style>
.button {
    background-color: #0b4afd;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left:2%;
	display:block;
	float: center;
}
.btn{
	background-color: #0b4afd;
	float: right;
	color:white;
	text-decoration:none;	
}

.table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	margin-left:0%;
	font-size:110%;
}
.tbl {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	margin-left:0%;
	font-size:110%;
    border-collapse: collapse;
    border:0px solid transparent;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


.dis {
	display:none;
	
}
.searchBox{
    
    cursor: pointer;
	font-size: 85%;
	
}
body{
    border: 4px black;
}
.container{
           margin-left: auto;
           margin-right: auto;
            border-color: black;
            border: 1px solid;
            text-align: left;
            width: 80%;
            position: relative;
        }
.detail1 {
 text-align: center; 
}

        .row{
            display: flex;
            flex-wrap: wrap;
            margin-left: 10%;
            padding-left: 5%;
        }
        .col-6{
            width: 20%;
            flex: 0 0 auto;
            padding: auto;
            margin-left: 1%;
            margin-right: 1%;
        }
    hr{
        height:5px;
        width:100%;
        background-color: black;
        border-color: black;
        border-width: 4px;
    }
h5{
padding-left: 10%;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clients</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
	   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body onload="window.print()">
<?php
	session_start();
	include'conith.php';
	$u_id = $_SESSION["username"];
    $total=0;
  
   $s_date=$_REQUEST['s_date'];
   $e_date=$_REQUEST['e_date'];


   if($s_date=="" or $e_date==""){
    $sql = "SELECT date,pd_select,ac_name,d_amount,t_amount,pd_select,bill_type,b_amount FROM sales WHERE user_id='$u_id' order by date ";

}
else if($s_date!="" or $e_date!=""){
    $sql = "SELECT date,pd_select,ac_name,d_amount,t_amount,pd_select,bill_type,b_amount FROM sales WHERE user_id='$u_id' and date BETWEEN '$s_date' and '$e_date' order by date ";
}

$result = $conn->query($sql);
?><table class="table">
    <tr>
    <th>Date</th>
    <th>Account Name</th>
    <th>SGST</th>
    <th>CGST</th>
    <th>IGST</th>
    <th>Discount in Amount</th>
    <th>Total Amount</th>
</tr>
	
<?php
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
 

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
            echo "<tr>\n";

            echo "<td>".$row["date"]."</td>\n";
            echo "<td>".$row["ac_name"]."</td>\n";
            echo "<td>".$c1."</td>\n";
            echo "<td>".$c2."</td>\n";
            echo "<td>".$c3."</td>\n";
            echo "<td>".$row["d_amount"]."</td>\n";
            echo "<td>".$row["t_amount"]."</td>\n";
            $total=$total+$ta;
        }
        echo "<tr><td colspan='6'>Total</td>
        <td>$total</td></tr>";
    }


	
?>
 
</table>

    <?php
	

    ?>
    
	
</body>