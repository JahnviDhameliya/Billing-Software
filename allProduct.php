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
input[type=submit] {
    width: 10%;
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
</head>
<body>
<?php include 'header5.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Product
                        <button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;"> 
                        <a href="addProduct.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">Add Product</a>
                        </button>
						
						
						
		  
					
						</h1>
                        <form action="search4.php" method="post">
  <input type="text" placeholder="Search.." name="key" style="width:95%;">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
     <?php
    
   $name=$_SESSION['username'];


        
    
        $sql = "SELECT * FROM product where user_id='$name'";
    

    

	$result = $conn->query($sql);

    ?>
    <br>
   
	<table class="table">
    <tr>
    <th >Product</th>
    <th >Opening Stock</th>
    <th >Closing Stock</th>
    <th >Delete</th>
    <th >Edit</th>
    
    <!--th>Date</th>
    <th>Reipt no</th-->
</tr>
   
  
   
    
    
    <?php
	

   
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    
        echo "<tr>\n";

          


            echo "<td>".$row["product_name"]."</td>\n";
            echo "<td>".$row["opbal"]."</td>\n";
            echo "<td>".$row["closing_stock"]."</td>\n";
            echo "<td>"."<a href='deleteProduct.php?product_name=".$row["product_name"]. "'>Delete</a></td>\n";
            echo "<td>"."<a href='editProduct.php?product_name=".$row["product_name"]. "'>Edit</a></td>\n";




        }
    }
       

	
?>
 <?php 
 

echo"


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>";