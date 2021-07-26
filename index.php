<?php
   session_start();
   require_once "config3.php";
?>
<html>
   <head>
   <style>
      @media only screen and (max-width: 600px) {
  .form1
  {
   width:100% !important;
    height:80% !important;
    margin-top:60px !important;
   margin-left:0px !important;
  }
  input[type="text"],input[type="password"],hr
{
        
        width:80% !important;
        border:0px;
        font-size:large;
        height:40px;
}
i,hr,lable
{
   margin-left:4% !important;
}
input[type="submit"]
{
   width:80%;
   margin-left:-10px;
}
input[type="file"]
{
   margin-left:3%;
}
}
@media only screen and (max-width: 1025px) and (min-width:601px) {
  .form1
  {
     transform:scale(1.5);
    margin-left:15% !important;
    width:60% !important;
    height:50% !important;
    margin-top:30% !important;
    margin-left:20% !important;
    font-size:x-large !important;
  }
  input[type="text"],input[type="password"],hr
{
        padding-left:2px !important;
        width:50% !important;
        font-size:x-large !important;
}

}
   </style>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   <link href="style_reg.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
   <style>
      .form1
      {
         margin-top:8%;
      }
      h1
      {
         letter-spacing:0px;
      }
      hr
      {
         width:90%;
      }
   </style>
   </head>
   <body>
   <div class="form1">
   <center><h1>Log In</h1></center><br><br>
       <center><table>
          <tr>
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
             <i class="fas fa-envelope"></i>&nbsp&nbsp<input type="text" name="email" placeholder="E-mail" required><br><hr><br>
             <i class="fas fa-lock"></i>&nbsp&nbsp<input type="password" id="pass" name="passwd" placeholder="Enter Password" maxlength="6" minlength="6" required><br><hr><br>
             <table style="padding:2%;margin-left:-30%;"><tr><td><input type="checkbox" onclick="myFunction()" style="width:25px;"></td><td>  Show Password</td></tr></table><br><br>
             <center><input type="submit" name="submit" value="Log In" class="btn" style="color:white;font-size:large;"></center>
           </form><br>
             <a href="forgot_password.php" style="font-size:large">Forgot Password?</a><br><br>
             <a href="registration.php" style="font-size:large">Don't have an account?</a></td>
          </tr>
        </table></center></div>
    </body>
</html>
<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php
if(isset($_POST['submit']))
{
   $passwd=$_POST['passwd'];
   $pass=password_hash($passwd, PASSWORD_BCRYPT);
   $pa=substr($pass, 0, 6);;
   $email=$_POST['email'];
   $email_search="select * from `persons` where email='$email'";
   $query=mysqli_query($link,$email_search);
   $email_count=mysqli_num_rows($query);
   if($email_count)
   {
       $username_password=mysqli_fetch_assoc($query);
       $_SESSION['token']=$username_password['token'];
       $db_password=$username_password['password'];
       $_SESSION['name']=$username_password['name'];
       $_SESSION['photo']=$username_password['photo'];
      //  $password_decode=password_verify($passwd,$db_password);
       if($db_password===$pa)
       {
         $_SESSION['email']=$email;
         header("location:home.php");
       }
       else
       {
         echo $pa;
         echo "<br>".$db_password;
         echo "<div class='alert alert-danger' role='alert'>
          Invalid Password.
         </div>";
       }
   }
   else
   {
      echo "<div class='alert alert-danger' role='alert'>
      Email ID is not exist.
      </div>";
   }
}
?>             