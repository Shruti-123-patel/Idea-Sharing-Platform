<?php
 session_start();
   require_once "config3.php";
   error_reporting(E_ERROR | E_PARSE);
   if($_GET['token'])
      $token=$_GET['token'];
      setcookie('token',$token,time()+(5*60));
   ?>
<html>
   <head>
      <title>reset_password</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
      <style>
      @media only screen and (max-width: 600px) {
  .form1
  {
    margin-left:7% !important;
    width:80% !important;
    height:100% !important;
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
    margin-left:15% !important;
    width:70% !important;
    height:100% !important;
  }
  input[type="text"],input[type="password"],hr
{
        padding-left:2px !important;
        width:90% !important;
}

}
   
      hr
      {
          width:300px;
      }
      input
      {
        width:280px;
        border:0px;
        font-size:large;
      }
      h2
      {
         font-weight:bolder;
         color:black;
         text-decoration:underline;
         word-spacing:6px;
         letter-spacing:1px;
      }
      body
      {
         background-image:url('earbuds2.jpg');
         background-size:cover;
         
      }
      .form1
      {
         font-family:'Times New Roman', Times, serif;
         background-color:white;
         border-radius:10px;
         z-index:2;
         width:30%;
         margin-left:35%;
         margin-top:10%;
         padding-top:2%;
         padding-bottom:2%;
      }
      .btn
      {
         padding:8px;
         color:white;
         background-color:black;
         border-radius:10px;
         font-size:large;
         letter-spacing:2px;
      }
      .btn:hover
      {
         color:white;
         background-color:gray;
         cursor:pointer;
      }
      .alert
      {
         width:30%;
         align:center;
      }
     </style>
    </head>
    <body>
    <?php
      
      $_GET['token']=$_COOKIE['token'];
      $token=$_COOKIE['token'];
      ?>
      <div class="form1">
       <center><h2>Set New Password</h2></center><br>
       <center><table>
                   <tr>
                      <td><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                           <i class="fas fa-unlock"></i>&nbsp&nbsp<input type="password" name="passwd" placeholder="Set Password" maxlength="6" minlength="6" required><br><hr><br>
                           <i class="fas fa-lock"></i>&nbsp&nbsp<input type="password" name="cpasswd" placeholder="Confirm Password" maxlength="6" minlength="6" required><br><hr><br>
                           <center><input type="Submit" name="submit" value="Submit" class="btn"></center></form><br>
                           <center><a href="index.php" style="text-decoration:none;font-size:larger;font-weight:bold;font-family: Arial, Helvetica, sans-serif;letter-spacing:0.7px;">Back to Login Page </a></center>
                      </td> 
                   </tr>
               </table></center></div>
   </body>
</html> 

<?php
   $token=$_SESSION['token'];
   //echo $token;
   if(isset($_POST['submit']) && $token)
   {
       $passwd= $_POST['passwd'];
       $cpasswd= $_POST['cpasswd'];
       if($passwd===$cpasswd )
       {
          $query="SELECT * FROM `persons` WHERE `token`=$token";
          $link_query=mysqli_query($link,$query);
          if($link_query)
          {
            $update_query="UPDATE `persons` SET `password`='$passwd' WHERE `token`='$token' ";
            $link_update=mysqli_query($link,$update_query);
          }       
       }
       else
      {
         echo "<div class='alert alert-danger' role='alert'>
         Please enter confirm password same as password.
         </div>";
       }
   }

?>    