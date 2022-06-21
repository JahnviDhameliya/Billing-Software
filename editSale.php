<!DOCTYPE html>

<html>
<head>
<style>
input[type=text], select {
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number]{
    width:100%;
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

.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
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
}</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Payment</title>

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
                        <h1 class="page-head-line">Update Information  
						</h1><br>



                    </div>
                </div>
                
                <!-- /. ROW  -->
	
<?php 
	
include'conith.php';


		$ac_name = $_REQUEST["ac_name"];
        $user_id = $_REQUEST["user_id"];
		$date = $_REQUEST["date"];
        $bill_number=$_REQUEST["bill_number"];
	
        $sql = "SELECT * from sales where ac_name='$ac_name' and user_id='$user_id' and date='$date' and bill_number='$bill_number'";
	$result = $conn->query($sql);
	$sql2 = "SELECT distinct product_name FROM product where user_id='$user_id'  order by product_name";
$result2=$conn->query($sql2);

$sql10 = "SELECT distinct type_name FROM bill order by type_name";
$result10=$conn->query($sql10); 

	echo "<div>\n";
	
	  echo '<form method="POST" action="updateSale.php" name="f1">';

      echo "
      <input type='hidden' name='user_id' value='$user_id'>
      <input type='hidden' name='acccount_name' value='$ac_name'>
     ";
      

	?>
	




	<?php
	
    if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
        
        echo "<label for=\"fname\">Date:</label> &nbsp";
		echo "<input type=\"date\" recipt_no=\"fname\" name=\"date\" value=\"$row[date]\">&nbsp";
		echo "<label for=\"fname\">Payment Mode:</label>&nbsp";
        echo"  <input list='pm' type='text' name='pay_mode' class='list' autocomplete='off' value='$row[payment_mode]'>";
        ?>
        <datalist name="pay_mode" id="pm" >
            <option name='pay_mode' value='Cash' >Cash</option>
            <option name='pay_mode' value='Credit' >Credit</option>
    </datalist>&nbsp

        <?php


echo "<label for=\"fname\">Bill Type:</label>&nbsp";
echo"  <input list='bt' type='text' name='bill_type' class='list' autocomplete='off' value='$row[bill_type]'>";

echo "<datalist name='bill_type' id='bt'>";

while($rows=$result10->fetch_assoc()){
    $id=$rows['type_name'];
    echo"<option name='bill_type' value='$id' style='width:100%''>$id</option>";
}
echo "</datalist>&nbsp<br>";
echo "<label for=\"fname\">Bill Number:</label>&nbsp";
echo "<input type=\"text\" recipt_no=\"fname\" name=\"bill_number\" value=\"$row[bill_number]\">&nbsp";
echo "<label for=\"fname\">Sale Type:</label>&nbsp";
echo"  <input list='st' type='text' name='sale_type' class='list' autocomplete='off' value='$row[sale_type]'>";
        ?>
        <datalist name="sale_type" id="st" >
            <option name='sale_type' value='Inclusive' >Inclusive</option>
            <option name='sale_type' value='Exclusive' >Exclusive</option>
    </datalist>&nbsp<br>

        <?php
        echo "<label for=\"fname\">Account Name:</label>&nbsp";
echo "<input type=\"text\" recipt_no=\"fname\" name=\"account_name\" value=\"$row[ac_name]\" style='width:100%'>";

echo '
<br><br><br>

    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount in %</th>

            <th>Discount in Amount</th>
            <th>Base Amount</th>

        </tr>
';

$sql = "SELECT * from sales where ac_name='$ac_name' and user_id='$user_id' and date='$date' and bill_number='$bill_number'";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

    echo "<tr><td><input type='text' name='product[]' value='$row[pd_select]' readonly></td>
    <td><input type='number' name='quantity[]' value='$row[quantity]'></td>
    <td><input type='number' name='price[]' value='$row[price]'></td>
    <td><input type='number' name='dis_p[]' value='$row[discount]'></td>
    <td><input type='number' name='dis_a[]' value='$row[d_amount]'></td>
    <td><input type='number' name='ba[]' value='$row[b_amount]'></td>
    </tr>";
    }
}          

    }

}

/**<td><input type='text' name='fixedAssets[]' value='$fixedAssets'></td>
        <td><input type='number' name='amount[]' value='$amount'></td>
        <td><input type='number' name='percentage[]' value='$percentage'></td>
        <td><input type='number' name='d_value[]' value='$d_value'></td>
        <td><input type='number' name='value[]' value='$value'></td> */
            ?>
<tbody id='tbody'></tbody>
</table><button type='button' onclick='addItem();'>Add Item</button>
<input type='submit' name='submit' value='Save'>
</form>
            
<script>
    function addItem() {
        var html = "<tr>";
            html+="<select name='product[]'>";
            <?php
                while($rows2=$result2->fetch_assoc()){
            ?>
                    html+= "<option name='product' id='4'  onchange='cal();'><?php echo $rows2['product_name'];?></option>";
                <?php
                }
                ?>
            html += "</select>";
            html += "<td><input type='number' name='quantity[]' value='0' id='1' onchange='cal();'></td>";
            html += "<td><input type='number' name='price[]' value='0' id='2' onchange='cal();'></td>";
            html += "<td><input type='number' name='dis_p[]' value='0' id='3' onchange='cal();'></td>";
            //html += "<td><input type='number' name='charge[]' value='0' id='5' onchange='cal();'></td>";
            html += "<td><input type='number' name='dis_a[]' value='0' id='d'></td>";
            html += "<td><input type='number' name='ba[]' value='0' id='b'></td>";
            //html += "<td><input type='number' name='ta[]' value='0' id='t'></td>";
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    
    }
    
    function cal(){

var quantity=document.getElementById('1').value;
var price=document.getElementById('2').value;
var dis_p=document.getElementById('3').value;
var product=document.getElementById('4').value;



var ba=quantity*price;
var dis_a=(dis_p*ba)/100;
var ba=ba-dis_a;
//var ta=ba;

//var c=(charge*ta)/100;
//ta=ta+c;


document.getElementById('d').value=dis_a;
document.getElementById('b').value=ba;
//document.getElementById('t').value=ta;
}
</script>
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   

	
</body>
</html>
