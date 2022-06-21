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
$sql2 = "SELECT distinct type_name FROM type order by type_name";
$result2=$conn->query($sql2);

		$name = $_REQUEST["acname"];
  		$u_id=$_SESSION['username'];
		
	
	$sql = "SELECT * from account where acname='$name' and user_id='$u_id'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updateAccount.php" method="post">';
	
	?>
	




	<?php
	
	
	while($row = $result->fetch_assoc()) {
		
	    
		
	    echo "<label for=\"fname\">Name</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"acname\" value=\"$row[acname]\">";
		echo "<br/><label for=\"fname\">Type</label>";?>
		<select name="type_name" style="width:100%">
<?php
while($rows2=$result2->fetch_assoc()){
    $id=$rows2['type_name'];
    echo"<option name='type_name' value='$id' >$id</option>";
}		
?>
</select>
<input style="display:none" type="text" recipt_no="fname" name="user_id" value="<?php echo"$row[user_id]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="acname" value="<?php echo"$row[acname]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="type" value="<?php echo"$row[type]"; ?>">
		<input  style="display:none" type="text" recipt_no="fname" name="add1"  value="<?php echo"$row[add1]"; ?>">
		<!-- echo "<label for=\"fname\">COMPANY ID</label>"; -->
		<input  style="display:none" type="text" recipt_no="fname" name="add2" value="<?php echo"$row[add2]"; ?>">
		<!-- echo "<label for=\"fname\">MATERIAL DETAILS</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="city" value="<?php echo"$row[city]"; ?>">
		<!-- echo "<label for=\"fname\">WARRANTY</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="state" value="<?php echo"$row[state]"; ?>">
		<!-- echo "<label for=\"fname\">MATERIAL AMOUNT </label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="statecode" value="<?php echo"$row[statecode]"; ?>">
		<!-- echo "<label for=\"fname\">CUSTOMER REMARK</label>";-->
		<input  style="display:none" type="text" recipt_no="fname" name="mob" value="<?php echo"$row[mob]"; ?>">
		<!-- echo "<label for=\"fname\">PHOTO</label>";-->
		<input  style="display:none" type="file" recipt_no="fname" name="email" value="<?php echo"$row[email]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="regnum" value="<?php echo"$row[regnum]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="opbal" value="<?php echo"$row[opbal]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="bankdetail" value="<?php echo"$row[bankdetail]"; ?>">
		<input style="display:none" type="text" recipt_no="fname" name="info1" value="<?php echo"$row[info1]"; ?>">
        <input style="display:none" type="text" recipt_no="fname" name="info2" value="<?php echo"$row[info2]"; ?>">
        <input style="display:none" type="text" recipt_no="fname" name="acid" value="<?php echo"$row[acid]"; ?>">
        <input style="display:none" type="text" recipt_no="fname" name="a_password" value="<?php echo"$row[a_password]"; ?>">



		<?php
		echo "<label for=\"fname\">ADDRESS 1</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"add1\" value=\"$row[add1]\">";
		echo "<label for=\"fname\">ADDRESS 2</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"add2\" value=\"$row[add2]\">";
		
		echo "<label for=\"fname\">CITY</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"city\" value=\"$row[city]\">";
		echo "<label for=\"fname\">STATE</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"state\" value=\"$row[state]\">";
		echo "<label for=\"fname\">STATE CODE</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"statecode\" value=\"$row[statecode]\">";
		echo "<label for=\"fname\">MOBILE NUMBER</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"mob\" value=\"$row[mob]\" pattern=\"^[0-9]{10}$\">";		
		
		
		echo "<label for=\"fname\">EMAIL ID</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"email\" value=\"$row[email]\">";
		
		
		echo "<label for=\"fname\">REGNUM</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"regnum\" value=\"$row[regnum]\">";
		echo "<label for=\"fname\">OPENING BALANCE</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"opbal\" value=\"$row[opbal]\">";
		echo "<label for=\"fname\">BANK DETAIL</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"bankdetail\" value=\"$row[bankdetail]\">";
		echo "<label for=\"fname\">INFORMATION 1</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"info1\" value=\"$row[info1]\">";
        echo "<label for=\"fname\">INFORMATION 2</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"info2\" value=\"$row[info2]\">";
        echo "<label for=\"fname\">ACCOUNT ID</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"acid\" value=\"$row[acid]\">";
		echo "<label for=\"fname\">ACCOUNT PASSWORD</label>";
		echo "<input type=\"text\" recipt_no=\"fname\" name=\"a_password\" value=\"$row[a_password]\">";
		
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
