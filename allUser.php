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
    margin-right: 10px;
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
<?php include 'header.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">All GST USER
                      
                        <button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;"> 
                        <a href="addUser.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">ADD GST USER</a>
                        </button>	&nbsp; &nbsp;
                        <button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;"> 
                        <a href="setting.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">SETTING</a>
                        </button>	
					
				     
						   
						
						</h1>
                    </div>
                </div>

    <br>
    <br>
                <!-- /. ROW  -->

                <?php
            $agent_id = $_SESSION["username"];
            $sql = "SELECT * from user where agent_id='$agent_id' order by name";

	        $result = $conn->query($sql);
	        $policy_id = "";
	   
	        while($row = $result->fetch_assoc()) {
		        //$images = $row["image"];
        ?>				
						
            <?php
		
		        //$policy_id = $row["policy_id"];
		        //$c_id      = $row["client_id"];
		        $agent_id  = $row["agent_id"];
	        }  
			


	//$sql = "SELECT client_id,nominee_id,name,birth_date,nid FROM nominee WHERE phone=0 and nid!=0";
	//$sql = "SELECT * FROM payment where warranty='0' and agent_id='$agent_id' order by action";
    $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>USER ID</th>";
    echo "    <th>Password</th>";
    echo "    <th>NAME</th>";
    echo "    <th>MOBILE</th>";
    echo "    <th>DELETE</th>";
    echo "    <th>EDIT</th>";
    echo "  </tr>";

    while($row = mysqli_fetch_array($result)){
		
		?>
        <tr>
          <td><?php echo $row['user_id']?></td>
          <td><?php echo $row['user_password']?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['mob1']?></td> 
          <?php
          echo "<td>"."<a href='deleteUser.php?user_id=".$row["user_id"]. "'>Delete</a></td>\n";
            echo "<td>"."<a href='editUser.php?user_id=".$row["user_id"]. "'>Edit</a></td>\n"; 
        ?>

        </tr>

        <?php

    }

        $conn->close();
        ?>

		
        


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>