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
<?php include 'header3.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">

        <div class="row">
                    <div class="col-md-12">
                      
						
						
		
	                    </div>
                </div>
						
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">
                      
						
						
                        <div class= "searchBar">
		  <form action="search1.php" method="post">
          <input type="text" name="key"><br>
          <input class="searchBtn" type="submit" value="SEARCH" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);
color: white;">
		  </br>
          </form>
	  </div>
     
					
				     
						   
						
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
<?php

    $p_id=$_SESSION['username'];
	$sql = "SELECT distinct name FROM client WHERE policy_id=$p_id";

	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Account Name</th>\n";
    echo "    <th>View</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {

        echo "<tr>\n";
        
        
            echo "<td>".$row["name"]."</td>\n";
            

			echo "<td>"."<a href='viewRegister.php?name=".$row["name"]. "'>View</a>"."</td>\n";
        


        /*
		
		echo "<tr>\n";
		
		if($row["agent_id"]== $username || "ahmed" == $username){
			echo "    <td>".$row["client_id"]."</td>\n";
		}else {}
		
		
		
		
		
		if($row["agent_id"]== $username || "ahmed" == $username){
			echo "<td>"."<a href='viewRegister.php?client_id=".$row["client_id"]. "'>View</a>"."</td>\n";
		}else {
			
		}*/

	}
	}
?>

            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>