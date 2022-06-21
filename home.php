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
input[type=submit]{
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);

    color: white;
    
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
<?php include 'header.php'; 

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        
			
		<!-- /. SEARCH  -->
	  <div class= "searchBar">
		  <form action="search.php" method="post">
          <input type="text" name="key"><br>
          <input class="searchBtn" type="submit" value="SEARCH">
		  </br>
          </form>
	  </div>

		<!-- /. SEARCH  -->
				
				<br>
				<br>
				
				<!-- /. ROW  -->
              
		

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->
<?php

	
	$sql = "SELECT recipt_no,client_id,month,amount,due,fine,action,status,agent_id FROM payment order by action";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>DATE</th>\n";
    echo "    <th>EMPLOY</th>\n";
    echo "    <th>NAME</th>\n";
   
	echo "    <th>MOBILE</th>\n";
	echo "    <th>STATUS</th>\n";
    echo "    <th>UPDATE</th>\n";
	
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		
		if($row["agent_id"]== $username || "ITHub" == $username){
			echo "    <td><b>".$row["action"]."</b></td>\n";
		}else{
			
		}
		
		if($row["agent_id"]== $username || "ITHub" == $username){
			echo "    <td>".$row["client_id"]."</td>\n";
		}else{
			
		}
		
		if($row["agent_id"]== $username || "ITHub" == $username){
			echo "    <td>".$row["month"]."</td>\n";
		}else{
			
		}
		
		
		if($row["agent_id"]== $username || "ITHub" == $username){
			echo "    <td>".$row["due"]."</td>\n";
		}else{
			
		}
		
		if($row["agent_id"]== $username || "ITHub" == $username){
			echo "    <td><b>".$row["status"]."</b></td>\n";
		}else{
			
		}
		
		
		
		
		
		if($row["agent_id"]== $username || "ITHub" == $username){
			echo "<td><b>"."<a href='editPayment.php?recipt_no=".$row["recipt_no"]. "'>Edit</a>"."</b></td>\n";
		}else{
			//echo "<td><b>"."<a class=\"dis\" href='editPayment.php?recipt_no=".$row["recipt_no"]. "'>Edit</a>"."</b></td>\n";
		}
		
		
	}
	
	echo "</table>\n";
	echo "\n";
	
	} else {
    echo "0 results";
}
$conn->close();
?>


    </div>
    <!-- /. WRAPPER  -->




</body>
</html>
