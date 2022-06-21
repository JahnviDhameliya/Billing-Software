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
    <title>Insert Payment</title>
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
<?php include 'header3.php'; 

?>
<div id="wrapper">

		
		 
		
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Inserted as Expense Successfully!!</h1>
                    
<?php

include 'conith.php';
        $recipt_no          = $_POST["recipt_no"];
	    $account_name       = $_POST["account_name"];
		$amount             = $_POST["amount"];
		$remarks            = $_POST["remarks"];
		$date               = $_POST["date"];
		
				
	$sql = "INSERT INTO nominee (nominee_id, client_id, phone, name, birth_date) VALUES('$recipt_no', '$account_name', '$amount', '$remarks', '$date')";
	
	if ($conn->query($sql) === true) {
			echo "Success";
            echo  "<form action='downloadForm1.php' method='post'>
            <input type='hidden' value='$recipt_no' name='recipt_no'>
            <input type='hidden' value='$account_name' name='account_name'>
            <input type='hidden' value='$amount' name='amount'>
            <input type='hidden' value='$remarks' name='remarks'>
            <input type='hidden' value='$date' name='date'>

            <input type='submit' value='Download data'name='submit' action='downloadForm1.php'></form>";
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