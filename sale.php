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
}
</style>
    <script src="jquery-3.5.0.min.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Client</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script LANGUAGE="JavaScript">

        
        
    </script>
</head>
<?php include 'header5.php'; 

$u_id=$_SESSION['username'];
$sql5 = "SELECT distinct acname FROM account WHERE user_id='$u_id' and type='sale'";
$result5=$conn->query($sql5); 
$sql9 = "SELECT distinct product_name FROM product WHERE user_id='$u_id' order by product_name";
$result9=$conn->query($sql9); 
$sql10 = "SELECT distinct type_name FROM bill order by type_name";
$result10=$conn->query($sql10); 

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Sale</h1>
<form method="POST" action="sale1.php" name="f1">

<input style="display:none" type="text" name="user_id" value="<?php echo $_SESSION["username"]; ?>" required><br>

Date:              <input type="date" name="date"required >
Payment Mode:     <select name="pay_mode">
                    <option name='pay_mode' value='cash'>Cash</option>
                    <option name='pay_mode' value='credit'>Credit</option>
                </select>
                Bill Type :          <select name="bill_type">
<?php
while($rows=$result10->fetch_assoc()){
    $id=$rows['type_name'];
    echo"<option name='bill_type' value='$id' style='width:100%''>$id</option>";
}
?>

</select>
Bill Number :          <input type="text" name="bill_number"><br>
Sale Type:     <select name="sale_type">
                    <option name='sale_type' value='Inclusive'>Inclusive</option>
                    <option name='sale_type' value='Exclusive'>Exclusive</option>
</select>

Account Name:<input list='name' type='text' name='account_name' class='list' autocomplete="off" style="width:70%;">
<datalist id='name' style="width:70%;">
<?php

while($rows=$result5->fetch_assoc()){
    $id=$rows['acname'];
    echo"<option name='account_name' value='$id' style='width:100%'>$id</option>";
}
?>

</datalist>



<br><br><br>

    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount in %</th>
          
        </tr>
        <tbody id="tbody"></tbody>
    </table>
 
    <button type="button" onclick="addItem();">Add Item</button>
    <input type="submit" name="submit" value="Save">
</form>

<script>
    function addItem() {
        var html = "<tr>";
            html+="<select name='product[]'>";
            <?php
                while($rows=$result9->fetch_assoc()){
            ?>
                    html+= "<option name='product' id='4'><?php echo $rows['product_name'];?></option>";
                <?php
                }
                ?>
            html += "</select>";
            html += "<td><input type='number' name='quantity[]' value='0' id='1' ></td>";
            html += "<td><input type='number' name='price[]' value='0' id='2' ></td>";
            html += "<td><input type='number' name='dis_p[]' value='0' id='3'></td>";
          
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
       
    }
    
    function cal(){

var quantity=document.getElementById('1').value;
var price=document.getElementById('2').value;
var dis_p=document.getElementById('3').value;
var product=document.getElementById('4').value;
//var charge=document.getElementById('5').value;


var ba=quantity*price;
var dis_a=(dis_p*ba)/100;
var ba=ba-dis_a;
//var ta=ba;

//var c=(charge*ta)/100;
//ta=ta-c;


document.getElementById('d').value=dis_a;
document.getElementById('b').value=ba;
document.getElementById('t').value=ta;
}

</script>