<html>
   <head>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
   <style>
      @media only screen and (max-width: 600px) {
  .form1
  {
    margin-left:7% !important;
    width:80% !important;
    transform:scale(2) !important;
    margin-top:40% !important;
    font-size:x-large !important;
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
    transform:scale(1.3);
    margin-top:40%;
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
      h1
      {
         font-family: "Sofia", sans-serif;
         letter-spacing:2px;
         color:orange;
         text-decoration:underline;
      }
      body
      {
         background-image:url('earbuds1.png');
         background-size:cover;
         
      }
      .form1
      {
         font-family:'Times New Roman', Times, serif;
         background-color:white;
         border-radius:10px;
         z-index:2;
         width:30%;
         margin-left:50%;
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
      }
      .btn:hover
      {
         color:white;
         background-color:gray;
         cursor:pointer;
      }
   </style>
   </head>
   <body>
   <div class="form1">
   <center><h1>Reset Password</h1></center><br>
       <center><table>
          <tr>
             <td><form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"><i class="fas fa-envelope"></i>&nbsp&nbsp<input type="email" name="email" placeholder="E-mail" required><br><hr><br>
             <center><input type="submit" name="submit" value="Send mail" class="btn"></center></form>
             </td>
          </tr>
          </table></center>
    </body>
    </html>

    <?php
       if(isset($_POST['submit']))
       {
           $email=$_POST['email'];
           if(!filter_var($email,FILTER_VALIDATE_EMAIL))
           {
            $msg="Please enter valid e-mail.";
            echo '<center><div class="alert alert-danger" style="font-size:large;">'.$msg.'</div></center>';
            exit();
           }
           $to=$email;
           $from="tempproject2021@gmail.com";
           $header="From:$from";
           $subject="Reset Password";
           $token=bin2hex(random_bytes(15));
           $message="Click on the link to reset the password http://localhost/classroom_web/reset_passwd.php?token=$token";
           if(mail($to,$subject,$message,$header))
           {
             $msg="Mail has sent successfully. We will reply you soon." ; 
             echo '<center><div class="alert alert-danger" style="font-size:large;">'.$msg.'</div></center>';
           }
           else
           {
             $msg="Something went wrong.";
             echo '<center><div class="alert alert-danger" style="font-size:large;"s>'.$msg.'</div></center>';
           }   
           
       }
       ?></div>