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


</style>

</head>

<body>
<?php
$conn =mysqli_connect('localhost','root','','service');
require_once __DIR__ . '/vendor/autoload.php';
// Grab variables

$mpdf = new \Mpdf\Mpdf();

$data = '<h1>Party Register</h1>';
$name = $_REQUEST['name'];
$data .=$name.'<br><br><br>';



//$data .='<style>.table{border-collpase:collapse;text-align:center;}</style>';
//$data .='<style>.table{border-collpase:collapse;text-align:center;}</style>';
$data .='<center><table class="table"><tr><th>Date</th><th colspan="2">Amount</th><th>Remark</th><tr>';
$data .='<tr><td></td><td><b>Income</b></td><td><b>Expense</b></td><td></td></tr></tr>';

$balance=0;
//$sql = "SELECT nid,name,birth_date,phone FROM nominee  order by birth_date ";
//$result = $conn->query($sql);
$res =mysqli_query($conn,"SELECT client_id,nid,name,birth_date,nominee_id,phone FROM nominee WHERE client_id='$name' order by birth_date");
//if ($res->num_rows > 0) {
    if(mysqli_num_rows($res)>0){

    //while($row = $res->fetch_assoc()) {
        while($row=mysqli_fetch_assoc($res)){
        $data .='<tr><br>';
        $balance=$balance+(int)$row['nid']-(int)$row['phone'];
        $data .='<td>'.$row['birth_date'].'</td>';
        $data .='<td>'.$row['nid'].'</td>';
        $data .='<td>'.$row['phone'].'</td>';
        $data .='<td>'.$row['name'].'</td>';
    }
}

$data .='<tr><td colspan="3"><center><b>Balance</b></center></td>';
$data .='<td>'.$balance.'</td></br>';
$data .='</tr>';
$data .="</table></center>";

$mpdf->WriteHtml($data);
$mpdf->output("myFile.pdf",'D');

echo $data;

?>
</body>
</html>