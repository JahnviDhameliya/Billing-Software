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

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	margin-left:0%;
	font-size:110%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.dis {
	display:none;
	
}
.searchBox{
    
    cursor: pointer;
	font-size: 85%;
	
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
.searchBar {
	float: auto;
	cursor: pointer;
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}
</style>


</head>
<body>
<?php include 'header5.php';
$u_id=$_SESSION['username'];
 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">

        <div class="row">
                    <div class="col-md-12">
       </div>
                </div>
						
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">STOCK

						</h1>
                    </div>
                </div>
                <form action="search7.php" method="post">
    <input type="text" placeholder="Search.." name="key" style="width:95%">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form><br><br>
                <table class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Opening Stock</th>
                        <th>Purchase Quantity</th>
                        <th>Sale Quantity</th>
                        <th>Closing Stock</th>
</tr>
<?php

    $u_id=$_SESSION['username'];
	$sql = "SELECT distinct product_name FROM product WHERE user_id='$u_id' and category='Sale'";
    $result=$conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $product_name=$row['product_name'];  
        
        $sql2 = "SELECT opbal FROM product WHERE user_id='$u_id' and product_name='$product_name'";
        $result2=$conn->query($sql2); 
        while($row2 = $result2->fetch_assoc()) {
            $opbal=$row2['opbal'];  
        }
        $sql3 = "SELECT quantity FROM purchase WHERE user_id='$u_id' and pd_select='$product_name'";
        $result3=$conn->query($sql3);
        $q1=0;
        while($row3 = $result3->fetch_assoc()) {
            $q1=$q1+$row3['quantity'];  

        }
        $sql4 = "SELECT quantity FROM sales WHERE user_id='$u_id' and pd_select='$product_name'";
        $result4=$conn->query($sql4);
        $q2=0;
        while($row4 = $result4->fetch_assoc()) {
            $q2=$q2+$row4['quantity'];  
        }
        $cs=$opbal+$q1-$q2;

        $sql5 = "UPDATE product set closing_stock=$cs WHERE user_id='$u_id' and product_name='$product_name'";
        $result5=$conn->query($sql5);



        echo "<tr>\n";
            //echo "<td>".$row["product_name"]."</td>\n";
            echo "<td>".$product_name."</td>\n";
            echo "<td>".$opbal."</td>\n";
            echo "<td>".$q1."</td>\n";
            echo "<td>".$q2."</td>\n";
            echo "<td>".$cs."</td>\n";

        }
	

?>
    </div>
</body>

</html>