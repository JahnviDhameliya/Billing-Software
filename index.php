<?php
  session_start();
  if(isset($_SESSION["username"])){
     // header("Location: home.php");
    }
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>

    body{
      background:linear-gradient(120deg,#581845, #900C3F ,#191970);
    }

    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    section{
      position: relative;
      width: 100%;
      height: 100vh;
      display: flex;
    }
    
    section .contentBx{
      display: flex;
      justify-content: center;
      align-items: center;
      width: 90%;
      height: 70%;
      margin: auto;
      z-index: 1;
      background-color: black;;
      border-radius: 10px;      
    }
   
    section .contentBx .formBx{
      width: 50%;
    }
 
    section .contentBx .formBx h2{
      color: white;
      font-weight: 600;
      font-size: 1.5cm;
      text-transform: uppercase;
      margin-bottom: 20px;
      border-bottom:4px solid white;
      display:inline-block;
      letter-spacing: 1px;
      text-align: center;
    }

    section .contentBx .formBx .inputBx{
      margin-bottom: 20px;
    }

    section .contentBx .formBx .inputBx input{
      width: 100%;
      padding: 10px 20px;
      outline: none;
      font-weight: 400;
      border: 1px solid white;
      font-size: 16px;
      letter-spacing: 1px;
      color: #607d8b;
      background: transparent;
      border-radius: 30px;
    }

    section .contentBx .formBx .inputBx input[type="text"]:focus{
      border-color: black;
      background: white;
      color: black;
    }

    section .contentBx .formBx .inputBx input[type="password"]:focus{
      border-color: black;
      background: white;
      color: black;
    }

    section .contentBx .formBx .inputBx input[type="text"]:hover{
      border-color: blue;
    }

    section .contentBx .formBx .inputBx input[type="password"]:hover{
      border-color: blue;
    }

    section .contentBx .formBx .inputBx input[type="submit"]{
      background:linear-gradient(120deg,#581845, #900C3F ,#191970);
      color: #fff;
      outline: none;
      font-weight: 500;
      cursor: pointer;
    }

    section .contentBx .formBx .inputBx input[type="submit"]:hover{
      background: purple;
      border-color: black;
    }

    @media screen and (min-width: 800px){
      
        section .contentBx{
          display: flex;
          background-color: black;
          border-radius: 10px;
          justify-content: center;
          align-items: center;
          width: 40%;
          height: 80%;
          margin-left: 30%;
          margin-right: 20%;
          margin-top: 5%;
          margin-bottom: 5%;
        }
        
      section .contentBx .formBx{
            width: 100%;
            padding: 40px;
            background: rgb(255 255 255 /.09);
            margin: 20%;
        }
      }

  
    </style>

    <title>Login Page</title>

</head>

<body>

   <section>

    <div class="contentBx">
        <div class="formBx">
          <center><h2>Login</h2></center>
          <form class="login-form" action="login.php" method="POST">
            <div class="inputBx">
              <i class="fa fa-user" style="font-size:24px; color:white; position:relative; top: 30px; right: 25px;"></i>
              <input type="text" name="username" id="" placeholder="Username"/>
            </div>

            <div class="inputBx">
              <i class="fa fa-lock" style="font-size:24px;color:white; position:relative; top: 30px; right: 25px;"></i>
              <input type="password" name="password" id="" placeholder="Password" />
            </div>
   
            <div class="inputBx">
              <input type="submit" value="Login" name="">
            </div>
        </form>
      </div>
    </div>
  </section>
</body>