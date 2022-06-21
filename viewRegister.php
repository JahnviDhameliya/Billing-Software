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
<?php include 'header3.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Pary Register
                      
						
						
		  
					
						</h1>
                    </div>
                </div>
				
                
                <!-- /. ROW  -->
     <?php
    
    $name=$_REQUEST['name'];
    
    echo "<b>$name</b>";
    if(isset($_POST["short"])){
        $s_date=$_POST["s_date"];
        $e_date=$_POST["e_date"];
    }
    else{
        $s_date="";
        $e_date="";
    }
    if($s_date=="" or $e_date==""){
        $sql = "SELECT client_id,nid,name,birth_date,nominee_id,phone FROM nominee WHERE client_id='$name' order by birth_date ";
    }
    else if($s_date!="" or $e_date!=""){
        $sql = "SELECT client_id,nid,name,birth_date,nominee_id,phone FROM nominee WHERE client_id='$name' and birth_date BETWEEN '$s_date' and '$e_date' order by birth_date ";

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
    <form action="downloadViewRegister.php" method="post">
	<table class="table">
    <tr>
    <th >Date</th>
    <th colspan="2">Amount <br> Income/Expence</th>
    <th>Remark</th>
    <!--th>Date</th>
    <th>Reipt no</th-->
    <tr>
   
    <tr>
        <td></td>
        <td><b>Income</b></td>
        <td><b>Expense</b></td>
        <td></td>
    

    </tr>
   
    </tr>
    
    <?php
	

    $balance=0;
  //  $row = $result->fetch_assoc();
  //  $row2 = $result2->fetch_assoc();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    
        echo "<tr>\n";

          
            $balance=$balance+(int)$row['nid']-(int)$row['phone'];


            echo "<td>".$row["birth_date"]."</td>\n";
            echo "<td>".$row["nid"]."</td>\n";
            echo "<td>".$row["phone"]."</td>\n";
            echo "<td>".$row["name"]."</td>\n";
           // echo "<td>".$row["birth_date"]."</td>\n";
            //echo "<td>".$row["nominee_id"]."</td>\n";




        }
    }
       

	
?>
 <tr>    <td colspan='3'><center><b>Balance</b></center></td>
 <?php 
 
            echo "<td>".$balance."</td>\n"; ?>

</tr>
<tr>
    <!--td colspan="4" style="text-align:center;"><button  type="submit">Download</button></td-->
    <?php echo "<td>"."<a href='downloadViewRegister.php?name=".$name. "'>Download</a>"."</td>\n";?>
</tr>


            
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
  

    
	
</body>