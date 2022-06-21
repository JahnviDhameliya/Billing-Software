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

button{
    width: 100%;
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);
    color: white;
    padding: 14px 20px;
    margin-top:10px; 
    border: none;
    border-radius: 4px;
    cursor: pointer; 
       
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
    <title>Insert into Income</title>
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
<body>
<?php include 'header5.php'; 

?>

<div id="wrapper">

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Inserted  successfully!!</h1>
                    
<?php


include 'conith.php';

        $name=$_SESSION['username'];


        $date               = $_POST["date"];
		$payment_mode       = $_POST["mode"];
		$reciept_no         = $_POST["reciept_no"];
		$p_name             = $_POST["p_name"];
		$t_amount           =(int) $_POST["t_amount"];
		$d_amount           = (int)$_POST["d_amount"];
        $remark             = $_POST["remark"];

		$total       = $t_amount+($t_amount*$d_amount/100);
		
      
        $sql = "INSERT INTO payout (date,payment_mode,reciept_no,party_name,total_amount,discount_amount,remark,user_id,total) VALUES('$date', '$payment_mode', '$reciept_no', '$p_name', '$t_amount', '$d_amount','$remark','$name','$total')";
	
       
	
	if ($conn->query($sql) === true) {
			echo "Added successfully";
            echo  "<form   method='post'>
            <input type='hidden' value='$date' name='date'>
            <input type='hidden' value='$payment_mode' name='mode'>
            <input type='hidden' value='$reciept_no' name='reciept_no'>
            <input type='hidden' value='$p_name' name='p_name'>
            <input type='hidden' value='$t_amount' name='t_amount'>
            <input type='hidden' value='$d_amount' name='d_amount'>
            <input type='hidden' value='$remark' name='remark'>
            <input type='hidden' value='$total' name='total'>
            <button  value='print'><a href='print_payout.php?reciept_no=".$reciept_no."'>Print</button><br><br>
            <button  value='download'><a href='download_payout.php?reciept_no=".$reciept_no."'>download</button>

            
            
            ";
           
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


    
?>

             </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
    



</body>
</html>