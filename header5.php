<?php
	session_start();
	include'conith.php';
    
	$username = $_SESSION["username"];

	$sql = "SELECT user_id FROM user WHERE user_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
     
    }
    else {
	    header("Location: index.php");
   }
	
?>

<body>
    <div id="wrapper">
        
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                         

                            <div class="inner-text"><center>
                                <?php
									if(!isset($_SESSION["username"])){
										header("Location: index.php");
									}else {
										echo "welcome!!";
									}
								?></center>
                            <br />
                              
                            </div>
                        </div>

                    </li>

                    <li>
                      <a href="allAccount.php"><i class="fa fa-life-saver "></i>ACCOUNT</a>
                    </li>
                    <li>
                      <a href="allProduct.php"><i class="fa fa-life-saver "></i>PRODUCTS</a>
                    </li>
                    <li>
                      <a href="purchaseList.php"><i class="fa fa-life-saver "></i>PURCHASE</a>
                    </li>
                    <li>
                      <a href="saleList.php"><i class="fa fa-life-saver "></i>SALE</a>
                    </li>
                    <li>
                      <a href="payment_register.php"><i class="fa fa-life-saver "></i>PAY IN</a>
                    </li>
                    <li>
                      <a href="receipt_register.php"><i class="fa fa-life-saver "></i>PAY OUT</a>
                    </li>

                    <li>
                      <a href="pay.php"><i class="fa fa-life-saver "></i>PAYABLE</a>
                    </li>
                    <li>
                      <a href="rec.php"><i class="fa fa-life-saver "></i>RECEIVEABLE</a>
                    </li>
                    <li>
                      <a href="stock.php"><i class="fa fa-life-saver "></i>STOCK</a>
                    </li>
                    <li>
                      <a href="newRegister.php"><i class="fa fa-life-saver "></i>REGISTER</a>
                    </li>
                    <li>
                      <a href="logout.php"><i class="fa fa-life-saver "></i>LOGOUT</a>
                    </li>
				
                </ul>
            </div>
        </nav>
        

        
        