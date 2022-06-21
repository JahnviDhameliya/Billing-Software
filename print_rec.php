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
	$u_id = $_SESSION["username"];
   $acname=$_REQUEST['acname'];
   $s_date=$_REQUEST['s_date'];
   $e_date=$_REQUEST['e_date'];


   if($s_date=="" or $e_date==""){
    $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname'and user_id='$u_id' and payment_mode='credit' order by date ";
    $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname'and user_id='$u_id' and payment_mode='Bank' order by date ";

}
else if($s_date!="" or $e_date!=""){
    $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname'and user_id='$u_id' and payment_mode='credit' and date BETWEEN '$s_date' and '$e_date' order by date ";
    $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname'and user_id='$u_id' and payment_mode='Bank' and date BETWEEN '$s_date' and '$e_date' order by date ";

}

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);


$sql3 = "SELECT opbal FROM account WHERE acname='$acname' and user_id='$u_id'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) { 
    while($row3 = $result3->fetch_assoc()) { 
        $opbal=(int)$row3['opbal'];
    }}
   


	
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
 

    
        
        $conn->close();
        ?>

<table class="table">
        <tr>
    <th colspan='2'>OPENING AMOUNT</th>
    <th><?php echo $opbal ?></th>

        </tr>
    
   
    <tr>
        <td>DATE</td>
        <td>TYPE</td>
        <td>AMOUNT</td>

       
       
    

    </tr>

    <?php
	
    $sale_total=0;
    $receipt_total=0;
    $total=0;
    

 
    if ($result1->num_rows > 0 || $result2->num_rows > 0 ) {

      
        while($row1 = $result1->fetch_assoc() ) {
    
        echo "<tr>\n";
           
                echo "<td>".$row1["date"]."</td>\n";
                echo "<td>Sale</td>";
                echo "<td>".$row1["t_amount"]."</td></tr>\n";
                $sale_total = $sale_total+$row1["t_amount"];



           
        }
       
            while($row2 = $result2->fetch_assoc()) {
    
                
                    echo "
                    <tr>
                    <td>".$row2["date"]."</td>\n";
                    echo "<td>Receipt</td>";
                    echo "<td>".$row2["total"]."</td>\n";

                    echo "</r>";

                    $receipt_total = $receipt_total+$row2["total"];
              
                
                
        }
    }
       
   
	$total=$opbal+$sale_total-$receipt_total;
    echo "
    <tr>
    <td colspan='2'><b>Closing Amount</b></td>
    <td>$total</td></tr>";
    
 
?>
        


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>