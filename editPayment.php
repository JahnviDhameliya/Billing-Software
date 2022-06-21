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
<?php include 'header.php'; 
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
	
	
	$id = "";
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$recipt_no = $_GET["recipt_no"];
	}
		
	
	$sql = "SELECT recipt_no, client_id, month, amount, due, fine, agent_id, email, work, remark, requirements, materialdetails, warranty, materialamt, servicecharge, customerremark, photo, status, action from payment where recipt_no='$recipt_no'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updatePayment.php" method="post">';
	
	?>
	




	<?php
	
	
	while($row = $result->fetch_assoc()) {
		
	    
		
	    echo "<label for=\"fname\">Date</label>";
		echo "<input type=\"date\" recipt_no=\"fname\" name=\"action\" value=\"$row[action]\">";
		echo "<br/><label for=\"fname\">CLIENT NAME</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"month\" value=\"$row[month]\">";
		
		
?>

		<input style="display:none" type="text" recipt_no="fname" name="month" value="<?php echo"$row[month]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="recipt_no" value="<?php echo"$row[recipt_no]"; ?>">
		<input  style="display:none" type="text" recipt_no="fname" name="client_id"  value="<?php echo"$row[client_id]"; ?>">
		<!-- echo "<label for=\"fname\">COMPANY ID</label>"; -->
		<input  style="display:none" type="text" recipt_no="fname" name="agent_id" value="<?php echo"$row[agent_id]"; ?>">
		<!-- echo "<label for=\"fname\">MATERIAL DETAILS</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="materialdetails" value="<?php echo"$row[materialdetails]"; ?>">
		<!-- echo "<label for=\"fname\">WARRANTY</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="warranty" value="<?php echo"$row[warranty]"; ?>">
		<!-- echo "<label for=\"fname\">MATERIAL AMOUNT </label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="materialamt" value="<?php echo"$row[materialamt]"; ?>">
		<!-- echo "<label for=\"fname\">CUSTOMER REMARK</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="customerremark" value="<?php echo"$row[customerremark]"; ?>">
		<!-- echo "<label for=\"fname\">PHOTO</label>";-->
		<input  style="display:none" type="file" recipt_no="fname" name="photo" value="<?php echo"$row[photo]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="fine" value="<?php echo"$row[fine]"; ?>">
		
		
		
		<?php
		echo "<label for=\"fname\">ADDRESS</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"amount\" value=\"$row[amount]\">";
		echo "<label for=\"fname\">MOBILE</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"due\" value=\"$row[due]\">";
		
		echo "<label for=\"fname\">EMAIL</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"email\" value=\"$row[email]\">";
		echo "<label for=\"fname\">WORK</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"work\" value=\"$row[work]\">";
		echo "<label for=\"fname\">REMARK</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"remark\" value=\"$row[remark]\">";
		echo "<label for=\"fname\">REQUIREMENTS</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"requirements\" value=\"$row[requirements]\">";		
		
		
		echo "<label for=\"fname\">Amount</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"servicecharge\" value=\"$row[servicecharge]\">";
		
		
		echo "<label for=\"fname\">STATUS</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"status\" value=\"$row[status]\">";
		
		
		
    
  
		
		
    }
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
	//echo "<input type=\"submit\" value=\"Final\">";
	//echo"<button type=\"cancel\" >Cancel</button>";
	echo "</form>\n";
	
	echo "<a href='deletePayment.php?recipt_no=".$recipt_no."'>Delete Record</a>";
	
	
	
echo "</div>\n";
echo "\n";

	
?>




            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   

	
</body>
</html>
