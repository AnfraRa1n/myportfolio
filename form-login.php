<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style type="text/css">
    body{
      overflow-y: hidden;
      margin:0;
      padding: 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background: -webkit-linear-gradient(bottom, #2dbd6e, #a6f77b);
    }
    form{
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background-color: rgb(255,255,255,0.7);
      width: 300px;
      margin: 180px auto;
      padding: 30px;
      text-align: right;
      color: #2D2D2D;
      border-radius: 40px 10px;
      box-shadow: 2px 2px 7px #393939;
    }
    input{
      margin: 10px;
    }
    input.login{
      background: -webkit-linear-gradient(bottom, #2dbd6e, #a6f77b);
      color: #ffffff;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-weight: bold;
      border-radius: 10px;
      padding: 5px 10px;
      margin: 30px 10px auto 0px;
      text-transform: uppercase;
      transition: .2s;
    }
    input.login:hover{
      background-color: #93A4B0;
      color: #dfdfdf;
    }
    p{
      text-align:center;
      margin: 50px auto;
      margin-top: 10px;
      padding: 10px;
      font-weight: bold;
      color: #ffffff;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background: -webkit-linear-gradient(bottom, #2dbd6e, #a6f77b);
      border-radius: 20px;
    }
  </style>
</head>
<body>
  <form action="check-login.php" method="POST" id="myForm">
    <p>Hello, An !</p>
    Nama Kamu  <input type="text" name="namakamu" placeholder="siapa?">
    Kata Kunci <input type="password" name="katakunci" placeholder="apa?">
    <input class="login" type="submit" name="submit" value="login">
  </form>
</body>
</html>