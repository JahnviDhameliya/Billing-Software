<!DOCTYPE html>

<html>
<head>
<style>
input[type=text], select {
    width: 100%;
    padding: 10px 13px;
    margin: 3px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button[type=cancel] {
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
    <title>Edit Payment</title>

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
                        <h1 class="page-head-line">Update Information  
						</h1>



                    </div>
                </div>
                
                <!-- /. ROW  -->
	
<?php 
	
include'conith.php';
$sql2 = "SELECT distinct unit FROM unit order by unit";
$result2=$conn->query($sql2);

		$product_name = $_REQUEST["product_name"];
        $u_id=$_SESSION['username'];
		
	
	$sql = "SELECT * from product where product_name='$product_name' and user_id='$u_id'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updateProduct.php" method="post">';
	
	?>
	




	<?php
	
	
	while($row = $result->fetch_assoc()) {
		
	    
		
	    echo "<label for=\"fname\">Product Name</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"product_name\" value=\"$row[product_name]\">";
		echo "<br/><label for=\"fname\">Code</label>";
        echo "<input type=\"text\" recipt_no=\"fname\" name=\"code\" value=\"$row[code]\">";?>
		
<input style="display:none" type="text" recipt_no="fname" name="user_id" value="<?php echo"$row[user_id]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="product_name" value="<?php echo"$row[product_name]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="code" value="<?php echo"$row[code]"; ?>">
		<input  style="display:none" type="text" recipt_no="fname" name="company"  value="<?php echo"$row[company]"; ?>">
		<!-- echo "<label for=\"fname\">COMPANY ID</label>"; -->
		<input  style="display:none" type="text" recipt_no="fname" name="category" value="<?php echo"$row[category]"; ?>">
		<!-- echo "<label for=\"fname\">MATERIAL DETAILS</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="opbal" value="<?php echo"$row[opbal]"; ?>">
		<!-- echo "<label for=\"fname\">WARRANTY</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="unit" value="<?php echo"$row[unit]"; ?>">
		<!-- echo "<label for=\"fname\">MATERIAL AMOUNT </label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="charge1" value="<?php echo"$row[charge1]"; ?>">
		<!-- echo "<label for=\"fname\">CUSTOMER REMARK</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="charge2" value="<?php echo"$row[charge2]"; ?>">
		<!-- echo "<label for=\"fname\">PHOTO</label>";-->
		<input  style="display:none" type="file" recipt_no="fname" name="charge3" value="<?php echo"$row[charge3]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="charge4" value="<?php echo"$row[charge4]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="dis1" value="<?php echo"$row[dis1]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="dis2" value="<?php echo"$row[dis2]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="price" value="<?php echo"$row[price]"; ?>">
        
		<?php
		echo "<label for=\"fname\">Company</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"company\" value=\"$row[company]\">";
		echo "<label for=\"fname\">Category</label>";?>
		<select name="category" style="width:100%">
            <option name='category' value='Sale' >Sale</option>
            <option name='category' value='Service' >Service</option>
        </select>
<?php
		echo "<label for=\"fname\">Opening Balance</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"opbal\" value=\"$row[opbal]\">";
		echo "<label for=\"fname\">Unit</label>";?>
		<select name="unit" style="width:100%">
<?php
while($rows2=$result2->fetch_assoc()){
    $id=$rows2['unit'];
    echo"<option name='unit' value='$id' >$id</option>";
}		
?>
</select>
<?php
		echo "<label for=\"fname\">SGST</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"charge1\" value=\"$row[charge1]\">";
		echo "<label for=\"fname\">CGST</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"charge2\" value=\"$row[charge2]\">";		
		
		
		echo "<label for=\"fname\">IGST</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"charge3\" value=\"$row[charge3]\">";
		
		
		echo "<label for=\"fname\">Charge 4</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"charge4\" value=\"$row[charge4]\">";
		echo "<label for=\"fname\">Discount 1</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"dis1\" value=\"$row[dis1]\">";
		echo "<label for=\"fname\">Discount 2</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"dis2\" value=\"$row[dis2]\">";
		echo "<label for=\"fname\">Price</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"price\" value=\"$row[price]\">";
        
    }
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
	//echo "<input type=\"submit\" value=\"Final\">";
	//echo"<button type=\"cancel\" >Cancel</button>";
	echo "</form>\n";
	
	
	
	
echo "</div>\n";
echo "\n";

	
?>




            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   

	
</body>
</html>
