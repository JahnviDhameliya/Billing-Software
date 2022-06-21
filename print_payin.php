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

.table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	margin-left:0%;
	font-size:110%;
}
.tbl {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
	margin-left:0%;
	font-size:110%;
    border-collapse: collapse;
    border:0px solid transparent;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


.dis {
	display:none;
	
}
.searchBox{
    
    cursor: pointer;
	font-size: 85%;
	
}
body{
    border: 4px black;
}
.container{
           margin-left: auto;
           margin-right: auto;
            border-color: black;
            border: 1px solid;
            text-align: left;
            width: 80%;
            position: relative;
        }
.detail1 {
 text-align: center; 
}

        .row{
            display: flex;
            flex-wrap: wrap;
            margin-left: 10%;
            padding-left: 5%;
        }
        .col-6{
            width: 20%;
            flex: 0 0 auto;
            padding: auto;
            margin-left: 1%;
            margin-right: 1%;
        }
    hr{
        height:5px;
        width:100%;
        background-color: black;
        border-color: black;
        border-width: 4px;
    }
h5{
padding-left: 10%;
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
<body onload="window.print()">
<?php
	session_start();
	include'conith.php';
	$username = $_SESSION["username"];

	$sql = "SELECT * FROM user WHERE user_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)){
          $name=$row['name'];
          $add1=$row['add1'];
          $add2=$row['add2'];
          $phone=$row['mob1'];
        }
    
    }
    else {
	    header("Location: index.php");
   }

   $r_number=$_REQUEST['reciept_no'];

	
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
    
    
    <br>
  
<?php
 

$sql2 = "SELECT *  FROM payin  WHERE reciept_no='$r_number'";
$result2 = $conn->query($sql2);


	echo "
    <h4><center>Reciept</center></h4>

    <div class='container'>
    <div class='detail1'>
   ";
    echo "
    
   <p>$name</p>
   <p>$add1</p>
   <p>$add2</p>
   <p>$phone</p>

   
  </div>
   <hr>
  
    ";
    

    
    while($row2 = mysqli_fetch_array($result2)){
        $date=$row2['date'];
        $payment_mode=$row2['payment_mode'];
        $reciept_no=$row2['reciept_no'];
        $p_name=$row2['party_name'];
        $t_amount=$row2['total_amount'];
        $d_amount=$row2['discount_amount'];
        $remark=$row2['remark'];
        $total=$row2['total'];
    }
    echo " 
    <div class='data'>
    <div class='row'>
        <div class='col-6'>
        <p><b>Party Name:</b></p>
        </div>
        <div class='col-6'>
        <p>$p_name</p>
        </div>
        <div class='col-6'>
        <p><b>Reciept No:</b></p>
        </div>
        <div class='col-6'>
        <p>$reciept_no</p>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-6'>
        <p><b>Amount:</b></p>
        </div>
        <div class='col-6'>
        <p>$t_amount</p>
        </div>
        <div class='col-6'>
        <p><b>Discount:</b></p>
        </div>
        <div class='col-6'>
        <p>$d_amount</p>
        </div>
        <div class='col-6'>
        <p><b>Total:</b></p>
        </div>
        <div class='col-6'>
        <p>$total</p>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-6'>
        <p><b>Remark:</b></p>
        </div>
        <div class='col-6'>
        <p>$remark</p>
        </div>
    </div>
    </div>
";

    
        
        $conn->close();
        ?>

		
        


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>