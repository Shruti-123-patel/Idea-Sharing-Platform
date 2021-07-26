<?php
   require_once "config3.php";
?>
<!DOCTYPE html>
   <head>
   <style>
      @media only screen and (max-width: 600px) {
  .form1
  {
    width:100% !important;
    height:100% !important;
    margin-left:0px !important;
  }
  body
  {
    background-size: cover;
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
@media only screen and (max-width: 1024px) and (min-width:601px) {
  .form1
  {
   transform:scale(1.5);
   margin-top:20% !important;
    margin-left:15% !important;
    width:70% !important;
    height:100% !important;
  }
  input[type="text"],input[type="password"],hr
{
        padding-left:2px !important;
        width:90% !important;
        font-size:x-large !important;
 
}

}
   </style>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="style_reg.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   </head>
   <body>
       
       <div class="form1">
       <center><h1>Registration</h1><br><br>
       <table>
          <tr>
             <td><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype='multipart/form-data'>
             <i class="fas fa-user"></i>&nbsp&nbsp<input type="text" name="yname" placeholder="Your Name" autocomplete="off" required><br><hr><br>
             <i class="fas fa-envelope"></i>&nbsp&nbsp<input type="email" name="email" placeholder="E-mail" autocomplete="off" required><br><hr><br>
             <i class="fas fa-unlock"></i>&nbsp&nbsp<input type="password" name="passwd" id="pass" autocomplete="off" placeholder="Set Password" maxlength="6" minlength="6" required><br><hr><br>
             <i class="fas fa-lock"></i>&nbsp&nbsp<input type="password" name="cpasswd" id="pass1" autocomplete="off" placeholder="Confirm Password" maxlength="6" minlength="6" required><br><hr><br>
             <table style="padding:2%;"><tr><td><input type="checkbox" onclick="myFunction()" style="width:35px;"></td><td>  Show Password</td></tr></table><br><br>
             <lable> Profile Picture: </lable><input type="file"  name="photo" autocomplete="off" required>
             <br><br>
             <center><input type="submit" name="submit" value="Sign Up" class="btn" style="color:white;font-size: large;"></form>
            <br><br><a href="index.php" style="font-size:large;">Already have an account?</a>
             </td></center>

          </tr>
        </table></center></div><br><br>
    </body>
</html>
<script>
function myFunction() {
  var x = document.getElementById("pass");
  var y = document.getElementById("pass1");
  if (x.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}
</script>
<?php
if(isset($_POST['submit']))
{
   $passwd=$_POST['passwd'];
   $cpasswd=$_POST['cpasswd'];
   $name=$_POST['yname'];
   $email=$_POST['email'];
   $pic_name=$_FILES['photo']['name'];
   $size=$_FILES['photo']['size'];
   $temp=$_FILES['photo']['tmp_name'];
   $location='C:/xampp/htdocs/classroom_web/';
   if($size>500000)
   {
      $msg="Please maintain your photo size between 0 to 200Kb.";
      echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
         exit();
   }
   if(move_uploaded_file($temp,$location.$pic_name))
	{
      echo "hello";
   if($passwd===$cpasswd)
   {
      if(!preg_match("/^[A-Za-z]*$/",$name))
      {
          $msg="Please enter only alphabates in full name.";
          echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
         exit();
      }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
         $msg="Please enter valid email.";
         echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
        }
      $token=bin2hex(random_bytes(15));
      $_SESSION['token']=$token;
      $pass=password_hash($passwd, PASSWORD_BCRYPT);
      $cpass=password_hash($cpasswd, PASSWORD_BCRYPT);
      $query="SELECT * FROM persons";
      $link_query=mysqli_query($link,$query);
      $insert_query="INSERT INTO `persons`(`name`, `email`, `password`, `token`,`photo`) VALUES ('$name','$email','$pass','$token','$pic_name')";
      $link_update=mysqli_query($link,$insert_query);
      if($link_update)
      {
         $table="CREATE TABLE $name (
            idea_id INT NOT NULL,
            FOREIGN KEY (idea_id) REFERENCES all_idea(id) ON DELETE CASCADE,
            date_ TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL)";
        if($link->query($table)===true)
        {
         header('location:index.php');
        }
      }
      else
      {
      echo "<div class='alert alert-danger' role='alert'>
          Email ID is already exist.
          </div>";
      }      
   }
   else if(!($passwd===$cpasswd))
   { 
      echo "<div class='alert alert-danger' role='alert'>
          Please enter confirm password same as password.
      </div>";
   }
   else
   {
      echo "<div class='alert alert-danger' role='alert'>
          Email ID is already exist.
      </div>";
   }
}
}
?>             