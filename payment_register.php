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
    <title>GST panel</title>

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
                        <h1 class="page-head-line">Payment Register
                        <button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;"> 
                        <a href="payment.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">Add Pay In</a>
                        </button>
						
						
		  
					
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
     <?php
    
    
$u_id=$_SESSION['username'];
   
    if(isset($_POST["short"])){
        $s_date=$_POST["s_date"];
        $e_date=$_POST["e_date"];
    }
    else{
        $s_date="";
        $e_date="";
    }
    if($s_date=="" or $e_date==""){
        $sql = "SELECT * FROM payout WHERE user_id='$u_id' order by date ";

    }
    else if($s_date!="" or $e_date!=""){
        $sql = "SELECT * FROM payout WHERE user_id='$u_id' and date BETWEEN '$s_date' and '$e_date' order by date ";

    }

    $result = $conn->query($sql);


    
       
    ?>
    <br>
    <form method="POST">
	From:<input type="date" name="s_date" value="from"/>
    To:<input type="date" name="e_date" value="to"/>
    
    <input type="submit" name="short" value="submit">
    </form>
    <br> <br> 
   
	<table class="table">
       
   
    <tr>
        <td>DATE</td>
        <td>MODE</td>
        <td>RECEIPT NO</td>
        <td>PARTY NAME</td>
        <td>AMOUNT</td>
        <td>DISCOUNT</td>
        <td>REMARK</td>
        <td>TOTAL</td>
    </tr>

    <?php
	 if ($result->num_rows > 0) {


      
        while($row = $result->fetch_assoc() ) {
    
        echo "<tr>
        <td>".$row['date']."</td>
        <td>".$row['payment_mode']."</td>
        <td>".$row['reciept_no']."</td>
        <td>".$row['party_name']."</td>
        <td>".$row['total_amount']."</td>
        <td>".$row['discount_amount']."</td>
        <td>".$row['remark']."</td>
        <td>".$row['total']."</td>
        ";
        
    
    }}
     
    
    
   
?>

            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>