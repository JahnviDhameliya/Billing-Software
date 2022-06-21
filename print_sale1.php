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
    text-align: center;
    padding: 8px;
}
td[ac_data]{
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
   $bill_num=$_REQUEST['bill_num'];

   $sql = "SELECT * FROM user WHERE user_id='$u_id'";
   $result = $conn->query($sql);
   
               
     if ($result->num_rows > 0) { 
         while($row = $result->fetch_assoc()) { 
             $u_name=$row['name'];
             $u_add1=$row['add1'];
             $u_add2=$row['add2'];
             $u_mob=$row['mob1'];
             $u_reg_no=$row['regnum'];
            
                           }}

                           
   $sql2 = "SELECT * FROM sales WHERE user_id='$u_id' and ac_name='$acname' and bill_number='$bill_num'";
   $result2 = $conn->query($sql2);
   
               
     if ($result2->num_rows > 0) { 
         while($row2 = $result2->fetch_assoc()) { 
            $bill_date=$row2['date'];
            $bill_type=$row2['bill_type'];
            
                           }}

$sql3 = "SELECT * FROM account WHERE acname='$acname' and user_id='$u_id'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) { 
    while($row3 = $result3->fetch_assoc()) { 
           //$p_name=$row['acname'];
           $p_add1=$row3['add1'];
           $p_add2=$row3['add2'];
           $p_mob=$row3['mob'];
           $p_reg_no=$row3['regnum'];
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
  


<table class="table">
        <tr>
    <td colspan='9'><b><?php echo $u_name; ?></br>
    <?php echo $u_add1; ?><br>
    <?php echo $u_add2; ?><br>
    <?php echo $u_mob; ?><br>
    <?php echo $u_reg_no; ?><br></b></td>
        </tr>
        <tr>
    <td colspan='5' name='ac_data'><b>
    <?php echo $acname; ?></br>
    <?php echo $p_add1; ?><br>
    <?php echo $p_add2; ?><br>
    <?php echo $p_mob; ?><br>
    <?php echo $p_reg_no; ?><br></b></td>

    <td colspan='4'  name='ac_data'><b>
    <?php echo $bill_num; ?></br>
    <?php echo $bill_date; ?><br>
    <?php echo $bill_type; ?><br>
    </b></td>
        </tr>

        <?php if($bill_type=='LOCAL B2B'){ ?>
        <tr>
            <td>NO.</td>
            <td>Product</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Discount Amount</td>
            <td>Base Amount</td>
            <td>SGDT</td>
            <td>CGST</td>
            <td>TOTAL</td>
        </tr>
        <?php
         $sql2 = "SELECT * FROM sales WHERE user_id='$u_id' and ac_name='$acname' and bill_number='$bill_num'";
         $result2 = $conn->query($sql2);
        $i=1;
        $total=0;
        if ($result2->num_rows > 0) { 
         while($row2 = $result2->fetch_assoc()) { 
             $product=$row2['pd_select'];
             $quantity=$row2['quantity'];
             $price=$row2['price'];
             $dic_p=$row2['discount'];
             $b_amount=$quantity*$price;
             $d_amount=($dic_p*$b_amount)/100;
             $ta=$b_amount-$d_amount;


             $sql7 = "SELECT charge1,charge2,charge3,charge4 FROM product WHERE product_name='$product'";
             $result7=$conn->query($sql7); 
             while($row7 = $result7->fetch_assoc()) {
             $charge1=$row7['charge1'];
             $charge2=$row7['charge2'];
             $charge3=$row7['charge3'];
             $charge4=$row7['charge4'];
             
         }
         $c1=($charge1*$ta)/100;
            $c2=($charge2*$ta)/100;
            $ta=$ta+$c1+$c2;

            echo "<tr>
            <td> $i</td>
            <td>$product </td>
            <td>$quantity </td>
            <td> $price</td>
            <td> $d_amount</td>
            <td> $b_amount</td>
            <td> $charge1</td>
            <td> $charge2</td>
            <td> $ta</td>


        </tr>
            ";
            $i++;
            $total=$total+$ta;
                           }
                           echo "<tr>
                    <td colspan='7'>TOTAL</td>
                    <td>$total</td>
                    </tr>";
                        }
        }
    
         else if($bill_type=='INTERESTED B2B'){ ?>
            <tr>
                <td>NO.</td>
                <td>Product</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Discount Amount</td>
                <td>Base Amount</td>
                <td>IGDT</td>
                <td>TOTAL</td>
            </tr>
            <?php
             $sql2 = "SELECT * FROM sales WHERE user_id='$u_id' and ac_name='$acname' and bill_number='$bill_num'";
             $result2 = $conn->query($sql2);
            $i=1;
            $total=0;
            if ($result2->num_rows > 0) { 
             while($row2 = $result2->fetch_assoc()) { 
                 $product=$row2['pd_select'];
                 $quantity=$row2['quantity'];
                 $price=$row2['price'];
                 $dic_p=$row2['discount'];
                 $b_amount=$quantity*$price;
                 $d_amount=($dic_p*$b_amount)/100;
                 $ta=$b_amount-$d_amount;
    
    
                 $sql7 = "SELECT charge1,charge2,charge3,charge4 FROM product WHERE product_name='$product'";
                 $result7=$conn->query($sql7); 
                 while($row7 = $result7->fetch_assoc()) {
                 $charge1=$row7['charge1'];
                 $charge2=$row7['charge2'];
                 $charge3=$row7['charge3'];
                 $charge4=$row7['charge4'];
                 
             }
             $c3=($charge3*$ta)/100;
             $ta=$ta+$c3;
    
                echo "<tr>
                <td> $i</td>
                <td>$product </td>
                <td>$quantity </td>
                <td> $price</td>
                <td> $d_amount</td>
                <td> $b_amount</td>
                <td> $charge3</td>
                <td> $ta</td>
    
    
            </tr>
                ";
                $i++;
                $total=$total+$ta;

                               }
                               echo "<tr>
                               <td colspan='7'>TOTAL</td>
                               <td>$total</td>
                               </tr>";
                            }
            }

            else if($bill_type=='TAX FREE'){ ?>
                <tr>
                    <td>NO.</td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Discount Amount</td>
                    <td>Base Amount</td>
                    <td>TOTAL</td>
                </tr>
                <?php
                 $sql2 = "SELECT * FROM sales WHERE user_id='$u_id' and ac_name='$acname' and bill_number='$bill_num'";
                 $result2 = $conn->query($sql2);
                $i=1;
                $total=0;
                if ($result2->num_rows > 0) { 
                 while($row2 = $result2->fetch_assoc()) { 
                     $product=$row2['pd_select'];
                     $quantity=$row2['quantity'];
                     $price=$row2['price'];
                     $dic_p=$row2['discount'];
                     $b_amount=$quantity*$price;
                     $d_amount=($dic_p*$b_amount)/100;
                     $ta=$b_amount-$d_amount;
        
        
                     $sql7 = "SELECT charge1,charge2,charge3,charge4 FROM product WHERE product_name='$product'";
                     $result7=$conn->query($sql7); 
                     while($row7 = $result7->fetch_assoc()) {
                     $charge1=$row7['charge1'];
                     $charge2=$row7['charge2'];
                     $charge3=$row7['charge3'];
                     $charge4=$row7['charge4'];
                     
                 }
               
        
                    echo "<tr>
                    <td> $i</td>
                    <td>$product </td>
                    <td>$quantity </td>
                    <td> $price</td>
                    <td> $d_amount</td>
                    <td> $b_amount</td>
                    <td colspan='2'> $ta</td>
        
        
                </tr>
                
                    ";
                    $i++;
                    $total=$total+$ta;

                                   }

                    echo "<tr>
                    <td colspan='6'>TOTAL</td>
                    <td>$total</td>
                    </tr>";
                                }
                }
            
            
            
        
             $conn->close();

?>
        


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>

</html>