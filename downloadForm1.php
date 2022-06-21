<html>
<head>
    <style>
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
 
</head>
<body>

<?php


require_once __DIR__ . '/vendor/autoload.php';

$account_name = $_POST['account_name'];
$amount = $_POST['amount'];
$remarks = $_POST['remarks'];
$date = $_POST['date'];
$recipt_no = $_POST['recipt_no'];

$mpdf = new \Mpdf\Mpdf();
$data = "";
$data .='<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	margin-left:0%;
	font-size:110%;
    border: 1px;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}


</style>';
$data .= "<h1>Your Details</h1>";
$data .="<table class='table'>";
$data .='<strong><tr><td>Account Name</strong></td><td> '. $account_name.'</td><br>';
$data .='<strong><tr><td>Amount</strong></td><td> '. $amount.'</td><br>';
$data .='<strong><tr><td>Remarks</strong></td><td> '. $remarks.'</td><br>';
$data .='<strong><tr><td>Date</strong></td><td> '. $date.'</td><br>';
$data .='<strong><tr><td>Recipt Number</strong></td><td> '. $recipt_no.'</td><br>';
$data .="</table>";


$mpdf->WriteHtml($data);
$mpdf->output("myProject.pdf",'D');
echo $data;


?>

</body>
</html>