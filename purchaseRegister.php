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
<?php include 'header5.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Purchse Register
                        
						</h1>
   
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
     <?php
    
    //$u_id=$_SESSION['username'];
    
    //echo "<b>$u_id</b>";
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
        $sql = "SELECT date,pd_select,ac_name,d_amount,t_amount,pd_select,bill_type,b_amount FROM purchase WHERE user_id='$u_id' order by date,ac_name ";
    }
    else if($s_date!="" or $e_date!=""){
        $sql = "SELECT date,pd_select,ac_name,d_amount,t_amount,pd_select,bill_type,b_amount FROM purchase WHERE user_id='$u_id' and date BETWEEN '$s_date' and '$e_date' order by date,ac_name ";
    }

	$result = $conn->query($sql);
    $total=0;
    
    ?>
    <br>
    <form method="POST">
	From:<input type="date" name="s_date" value="from"/>
    To:<input type="date" name="e_date" value="to"/>
    
    <input type="submit" name="short" value="submit">
    </form>
    <br> <br> 
    <form action="search6.php" method="post">
    <input type="text" placeholder="Search.." name="key" style="width:95%">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form><br><br>

    
	<table class="table">
    <tr>
    <th>Date</th>
    <th>Account Name</th>
    <th>SGST</th>
    <th>CGST</th>
    <th>IGST</th>
    <th>Discount in Amount</th>
    <th>Total Amount</th>
</tr>
<?php
 $t_c1=0;
 $t_c2=0;
 $t_c3=0;
 $t_da=0;
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
 

    $product=$row['pd_select'];
    $b_amount=$row['b_amount'];
    $bill_type=$row['bill_type'];
    $ta=$row['t_amount'];
   

          $sql2 = "SELECT charge1,charge2,charge3 FROM product WHERE user_id='$u_id' and product_name='$product'";
            $result2 = $conn->query($sql2);
            while($rows=$result2->fetch_assoc()){
                $charge1=$rows['charge1'];
                $charge2=$rows['charge2'];
                $charge3=$rows['charge3'];
            }

            if($bill_type=='LOCAL B2B'){
                $c1=($b_amount*$charge1)/100;
                $c2=($b_amount*$charge2)/100;
                $c3=0;
      
            }
            else if($bill_type=='INTERESTED B2B'){
                $c1=0;
                $c2=0;
                $c3=($b_amount*$charge3)/100;
              
            }
            else{
                $c1=0;
                $c2=0;
                $c3=0;
           
            }
            echo "<tr>\n";
            $total=$total+$ta;
            echo "<td>".$row["date"]."</td>\n";
            echo "<td>".$row["ac_name"]."</td>\n";
            echo "<td>".$c1."</td>\n";
            echo "<td>".$c2."</td>\n";
            echo "<td>".$c3."</td>\n";
            echo "<td>".$row["d_amount"]."</td>\n";
            echo "<td>".$row["t_amount"]."</td>\n";
            $t_c1=$t_c1+$c1;
            $t_c2=$t_c2+$c2;
            $t_c3=$t_c3+$c3;
            $t_da=$t_da+$row['d_amount'];

            
        }
        echo "<tr><td colspan='2'>Total</td>
        <td>$t_c1</td>
        <td>$t_c2</td>
        <td>$t_c3</td>
        <td>$t_da</td>
        <td>$total</td></tr>";
        echo '<form method="POST">';  
    
        echo "<tr><td><a href='print_purchaseRegister.php? &s_date=".$s_date." &e_date=".$e_date."'>Print</a></td>\n";
        echo "<td><a href='download_purchaseRegister.php?&s_date=".$s_date." &e_date=".$e_date."'>Download</a></td></tr>\n";
    
    }


	


    ?>
</form>
</table>

</body>