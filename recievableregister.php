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
                        <h1 class="page-head-line">Receivable Register
                      
						
						
		  
					
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
     <?php
    $u_id=$_SESSION['username'];
    $acname=$_REQUEST['name'];
    
    echo "<b>$acname</b>";
    
    if(isset($_POST["short"])){
        $s_date=$_POST["s_date"];
        $e_date=$_POST["e_date"];
    }
    else{
        $s_date="";
        $e_date="";
    }
   
    if($s_date=="" or $e_date==""){
        $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname' and user_id='$u_id' and payment_mode='credit' order by date ";
        $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname'and user_id='$u_id'   order by date ";
    }
    else if($s_date!="" or $e_date!=""){
        $sql1 = "SELECT date,t_amount FROM sales WHERE ac_name='$acname'and user_id='$u_id' and payment_mode='credit' and date BETWEEN '$s_date' and '$e_date' order by date ";
        $sql2 = "SELECT date,total FROM payin WHERE party_name='$acname' and user_id='$u_id' and date BETWEEN '$s_date' and '$e_date' order by date ";

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
    <br>
    <form method="POST">
	From:<input type="date" name="s_date" value="from"/>
    To:<input type="date" name="e_date" value="to"/>
    
    <input type="submit" name="short" value="submit">
    </form>
    <br> <br> 
   
	<table class="table">
        <tr>
    <th colspan='2'>OPENING AMOUNT</th>
    <th><?php echo $opbal; ?></th>

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
       
    else{
        echo"data not found";
        }
       
	$total=$opbal+$sale_total-$receipt_total;
    echo "
    <tr>
    <td colspan='2'><b>Closing Amount</b></td>
    <td>$total</td></tr>";
    

    echo '<form method="POST">';  
     
    echo "<tr><td>"."<a href='print_rec.php?acname=".$acname." &s_date=".$s_date." &e_date=".$e_date."'>Print</a>"."</td>\n";
    echo "<td>"."<a href='download_rec.php?acname=".$acname." &s_date=".$s_date." &e_date=".$e_date."'>Download</a>"."</td></tr>\n";

    ?>
</form>


   
    
    
   


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>