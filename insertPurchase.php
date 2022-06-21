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
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Insert
						<button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;"> 
                        <a href="purchase.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">Purchase</a>
                        </button>
						</h1>
                    
                
				
				
<?php
    if(isset($_POST["submit"]))
    {

    
   $user_id=$_POST['user_id'];
   $bill=$_POST['bill'];
   $date=$_POST['date'];
   $pay_mode=$_POST['pay_mode'];
   $account_name=$_POST['account_name'];
   $bill_type=$_POST['bill_type'];
   $bill_number=$_POST['bill_number'];
   /*$p_name=$_POST['p_name'];
   $qnty=$_POST['qnty'];
   $price=$_POST['price'];
   $dis_p=$_POST['dis_p'];
   $dis_a=$_POST['dis_a'];
  
	   
		
	$ba=$qnty*$price;
    $dis_a=($dis_p*$price)/100;
    $ta=$ba-$dis_a;	*/
    
	$sql = "INSERT INTO purchase (user_id,bill,date,payment_mode,ac_name,bill_type,bill_number)VALUES('$user_id','$bill','$date', '$pay_mode', '$account_name', '$bill_type', '$bill_number')";
	$result=$conn->query($sql);

    for($a=0;$a<count($_POST["product"]);$a++)
    {
        $sql="INSERT INTO purchase(pd_select,quantity,price,discount,d_amount) values('".$_POST["$product"][$a]."','".$_POST["$quantity"][$a]."','".$_POST["$price"][$a]."','".$_POST["$dis_p"][$a]."','".$_POST["$dis_a"][$a]."')";
        $result=$conn->query($sql);
    }
}


	
?>


			

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
