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
input[type=submit]{
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);
    color: white;  
}

</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Payment</title>
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
                        <h1 class="page-head-line">New record updated successfully
						<button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);
    color: white;" > 
                        <a href="allProduct.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);
    color: white;">Product</a>
                        </button>
						</h1>
                    

<?php 
	
include'conith.php';
	
	//$recipt_no = $client_id = $month = $amount = $due = $fine ="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$user_id       	= $_POST["user_id"];
		$product_name       	= $_POST["product_name"];
		$code           	= $_POST["code"];
		$company          	= $_POST["company"];
		$category             	= $_POST["category"];
		$opbal            	= $_POST["opbal"];
		$unit        	= $_POST["unit"];
		$charge1 			 	= $_POST["charge1"];
		$charge2 			 	= $_POST["charge2"];
		$charge3 		 	= $_POST["charge3"];
		$charge4 	 	= $_POST["charge4"];		
		$dis1 	= $_POST["dis1"];
		$dis2 			= $_POST["dis2"];
		$price 		= $_POST["price"];
	}
	
	
	
	$sql = "UPDATE product set product_name='$product_name' ,code='$code' ,company='$company' ,category='$category' ,opbal='$opbal' ,unit='$unit' ,charge1='$charge2' ,charge3='$charge3' ,charge4='$charge4' ,dis1='$dis1', dis2='$dis2', price='$price' where product_name='$product_name' and user_id='$user_id'";
		
		if ($conn->query($sql) === true) {
			echo "New record updated successfully";
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