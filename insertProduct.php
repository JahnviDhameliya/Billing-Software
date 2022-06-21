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
                        <a href="addProduct.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">Add Product</a>
                        </button>
						</h1>
                    
                
				
				
<?php
  
		$user_id            = $_POST["user_id"];
		$name             = $_POST["name"];
		$code      = $_POST["code"];
        $company      = $_POST["company"];
        $category      = $_POST["category"];
        $opbal      = $_POST["opbal"];
        $unit      = $_POST["unit"];
		$charge1 = $_POST["charge1"];
        $charge2 = $_POST["charge2"];
        $charge3 = $_POST["charge3"];
        $charge4 = $_POST["charge4"];
        $dis1 = $_POST["dis1"];
        $dis2 = $_POST["dis2"];
        $price = $_POST["price"];
		
	$sql = "INSERT INTO product (user_id,product_name,code,company,category,opbal,unit,charge1,charge2,charge3,charge4,dis1,dis2,price) VALUES('$user_id', '$name','$code', '$company', '$category', '$opbal', '$unit','$charge1', '$charge2', '$charge3',  '$charge4', '$dis1','$dis2','$price')";
	
	if ($conn->query($sql) === true) {
			echo "New ADDED";  echo '</br>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;  echo '</br>';
		}
		
		
		

?>


			

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
