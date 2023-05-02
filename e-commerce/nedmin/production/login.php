<!DOCTYPE html>
<html>
<head>
   <title>
    LogIn
   </title> 
   <meta charset="UTF-8">
   <style>
    @import url(//fonts.googleapis.com/css?family=Lato:100,300,300i,400);

body {
  box-sizing: border-box;
  font-family: Lato, Arial;
  text-align: center;
  color: #eee;
  background-color: #000;

}

h2 {
  margin-top: 1em;
  margin-bottom: 1em;
  color: #eee;
  font-weight: 400;
  text-align: center;
  font-size: 200%;
  letter-spacing: 4px;
}

h4 {
  margin-top: 1em;
  color: #eee;
  font-size: 150%;
  font-weight: 300;
  text-align: center;
}

button {
  display: inline;
  background: #01A4E0;
  color: #2184AC;
  border: 0;
  padding: 4px;
}

input {
    display: block;
    width: 98%;
  height: 30px; 
    margin-top: 1.0em;
   padding: 4px;
}

small {
  display: inline-block;
  margin-top: 5px;
  color: white;
  font-size: 100%;
  color: #fff;
}

.login-box {
    padding: 1em 1em 1em 1em;
    margin: auto;
    text-align: center;
    display: block;
    background-color: #6f92dc;
    /*border: 1px dashed white;*/
    width: 60%;
  height: auto;
}

.outer-box {
    display: block;
    margin: auto;
    background: #6f92dc;
    border-radius: 5px;
    width: 50%;
    height: 20em;
  height: auto;
}

#btn-login {
  display: block;
  width: 100%;
  height: 40px;
  margin-top: 2.0em;
  border-radius: 4px;
  background-color: #3366cc;
  color: #fff;
}

#btn-forgot {
  display: block;
  width: 100%;
  margin-top: 1.0em;
  border-radius: 2px;
  color: #fff;
  background-color: #000D36;
}
   </style>
</head>
<body> 
<h2>Götür|Company</h2>
  <div class="outer-box">
    <div class="login-box">
      <h4 class="login-text">LogIn</h4>
      <center>
       <form action="../netting/işlem.php" method="POST">
      <input type="text" name="kullanici_mail"  placeholder="User Mail" required>
      <input type="password" name="kullanici_password" placeholder="Password" required>

      <input type="submit" id="btn-login" name="admingiriş" value="Log In">
      </form> 
      <?php 
      if(isset($_GET['durum'])){
        if($_GET['durum']=="no"){
             echo "<h6>USER COULDN'T FOUND!!</h6>";
        }
      }      
      ?>
    </center>
    </div>
  </div>
<small>Created by EMRECAN ERKUŞ&SELIN KAYA</small>
</body>
</html>
