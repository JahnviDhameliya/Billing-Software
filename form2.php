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
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);
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
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert</title>
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
<div id="wrapper">

		



<?php include 'header3.php'; 
$uniqueId = time().'_'.mt_rand();
if(isset($_GET["name"])){
$name       = $_GET["name"];
}else{ $name="";
}

$p_id=$_SESSION['username'];
$sql = "SELECT distinct name FROM client WHERE policy_id=$p_id";$result=$conn->query($sql); 
?>




        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		
        <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Pay OUT
                      
						
	
						</h1>
                    </div>
                </div>
            
                
						
                    
                

<form action="insertExpense.php" method="post">

<!--input style="display:none" type="text" name="recipt_no" value="" required-->
Account Name:<select name="account_name">
<?php

while($rows=$result->fetch_assoc()){
    $id=$rows['name'];
    echo"<option name='account_name' value='$id'>$id</option>";
}
?>
</select>
Amount : <br><input type="number" name="amount"  required><br>
Remarks:         <br><input type="text" name="remarks"><br>
Date:       <br> <input type="date" name="date" required><br>
 <br>          <input type="hidden" name="recipt_no" required value="<?php echo"$uniqueId"; ?> "><br>

      
<input type="submit" value="Save">
</form>
				

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->


</body>
</html>