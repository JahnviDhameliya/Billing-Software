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
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">

        <div class="row">
                    <div class="col-md-12">
                      
						
						
		
	                    </div>
                </div>
						
            
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="page-head-line">Recieveable
                      
						
                  
                   
                         
                      
                      </h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
<?php

    $u_id=$_SESSION['username'];
	$sql = "SELECT  * FROM account WHERE user_id='$u_id' and type='Sale' order by acname";

	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Account Name</th>\n";
    echo "    <th>Mobile Number</th>\n";
    echo "    <th>Cosing Amount</th>\n";
    echo "    <th>Ledger</th>\n";    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {

        echo "<tr>\n";
        
        $acname=$row["acname"];
            echo "<td>".$row["acname"]."</td>\n";
            echo "<td><b>"."<a href='tel:".$row["mob"]. "'>".$row["mob"]. "</a>"."</b></td>\n";

            $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname' and payment_mode='credit' and user_id='$u_id' order by date ";
            $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname' and  payment_mode='Bank' and user_id='$u_id'  order by date ";
        
            $result1 = $conn->query($sql1);
            $result2 = $conn->query($sql2);
            $sql3 = "SELECT opbal FROM account WHERE acname='$acname' and user_id='$u_id'";
            $result3 = $conn->query($sql3);
        
            if ($result3->num_rows > 0) { 
                while($row3 = $result3->fetch_assoc()) { 
                    $opbal=(int)$row3['opbal'];
                }}
                $sale_total=0;
                $receipt_total=0;

                if ($result1->num_rows > 0 || $result2->num_rows > 0 ) {

      
                    while($row1 = $result1->fetch_assoc() ) {
                
                       
                            
                            $sale_total = $sale_total+$row1["t_amount"];
            
            
            
                       
                    }
                   
                        while($row2 = $result2->fetch_assoc()) {
                
                            
                             
            
                                $receipt_total = $receipt_total+$row2["total"];
                          
                            
                            
                    }
                }
                   
               
                $total=$opbal+$sale_total-$receipt_total;
                
                echo "<td>".$total."</td>\n";


			echo "<td>"."<a href='recievableregister.php?name=".$row["acname"]. "'>Ledger</a>"."</td>\n";
        



	}
	}
?>

            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>