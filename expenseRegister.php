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
</head>
<body>
<?php include 'header3.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Pay OUT Register
                      
						
						
		  
				
					
				     
						   
						
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
<?php
    $p_id=$_SESSION["username"];
    if(isset($_POST["short"])){
        $s_date=$_POST["s_date"];
        $e_date=$_POST["e_date"];
    }
    else{
        $s_date="";
        $e_date="";
    }
    if($s_date=="" or $e_date==""){
        $sql = "SELECT nominee.client_id,nominee.nominee_id,nominee.name,nominee.birth_date,nominee.phone FROM nominee INNER JOIN client  WHERE nominee.phone!=0 and nominee.nid=0 and nominee.client_id=client.name and client.policy_id=$p_id order by birth_date";
    }
    else if($s_date!="" or $e_date!=""){
        $sql = "SELECT nominee.client_id,nominee.nominee_id,nominee.name,nominee.birth_date,nominee.phone FROM nominee INNER JOIN client  WHERE nominee.phone!=0 and nominee.nid=0 and nominee.client_id=client.name and client.policy_id=$p_id and nominee.birth_date BETWEEN '$s_date' and '$e_date'order by birth_date";

    }
	$result = $conn->query($sql);

    //$sql = "SELECT nominee.client_id,nominee.nominee_id,nominee.name,nominee.birth_date,nominee.phone FROM nominee INNER JOIN client  WHERE nominee.phone!=0 and nominee.nid=0 and nominee.client_id=client.client_id and client.policy_id=$p_id";
	//$result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>ACCOUNT NAME</th>";
    echo "    <th>AMOUNT</th>";
    echo "    <th>REMARKS</th>";
	echo "    <th>DATE</th>";
	echo "    <th>RECEIPT NUMBER</th>";
    echo "  </tr>";

    while($row = mysqli_fetch_array($result)){
		
		?>
        <tr>
          <td><?php echo $row['client_id']?></td>
          <td><?php echo $row['phone']?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['birth_date']?></td>
          <td><?php echo $row['nominee_id']?></td>  
        </tr>


        <?php

    }
    ?>
        <tr>
        <td colspan="5" style="text-align:center"><button><a href="print1.php">Print</a></td>       
        </tr>
        <?php
        $conn->close();
        ?>

<form method="POST" action="NexpenseRegister.php">
	From:<input type="date" name="s_date" value="from"/>
    To:<input type="date" name="e_date" value="to"/>
    
    <input type="submit" name="short" value="submit & Print">
    </form><br><br>
        


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>