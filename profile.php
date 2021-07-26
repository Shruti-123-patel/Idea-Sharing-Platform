<?php
   session_start();
   include "config3.php";
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
    <link href="profile.css" rel="stylesheet">
    <link href="veiw1.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        @media only screen and (max-width: 600px) {
       .profile2
       {
           padding-left:0%;
       }
       a
       {
           margin-right:-19% !important;
           margin-left:-1% !important;
       }
       .form1
       {
           margin-left:5%;
       }
       .form1 .button
        {
            margin-left:2%;
        }
        #pic
        {
            width:40% !important;
            height:15% !important;
        }
        h2
        {
            text-align:center;
            margin-left:21%;
            margin-right:-6%;
        }
       input
       {
           margin-top:4%;
       }
       .section
       {
         display:none;
       }
    }
    @media only screen and (max-width: 1075px) and (min-width:601px){
        .profile2
       {
           padding-left:0%;
       }
       a
       {
           margin-right:-19% !important;
           margin-left:-1% !important;
       }
       .form1
       {
           margin-left:25%;
           font-size:xx-large;
       }
       .form1 .button
       {
           margin-left:1%;
           font-size:xx-large;
           height:100%;
       }
       input
       {
           font-size:xx-large;
           width:100%;
       }
        #pic
        {
            width:40% !important;
            height:25% !important;
            margin-bottom:10%;
            border-radius:50%;
        }
        h2
        {
            text-align:center;
            margin-left:21%;
            margin-right:-6%;
        }
       input
       {
           margin-top:4%;
       }
       .section
       {
         display:none;
       }  
    }
    @media only screen and (min-width: 1075px) and (max-width:2220px){
        #pic
        {
            border-radius:50%;
        }
        .section
        {
            width:40%;
        }
    }
    </style>
</head>

<body>
    <div class="main">
        <div class="section">
            <h1>Idea Sharing Platform</h1><br><br><br>
            <div class="link"><i class="fas fa-user fa-2x"></i><a href="profile.php">&nbspManage Profile </a><br><br></div>
            <div class="link"><i class="fa fa-lightbulb fa-2x"></i><a href="your_idea.php">&nbsp&nbspYour Ideas </a><br><br></div>
            <div class="link"><i class="fas fa-comment-dots fa-2x"></i><a href="your_comments.php">Comments </a><br><br>
            </div>
            <div class="link"><i class="fas fa-sign-out-alt fa-2x"></i><a href="logout.php"> Log out </a><br> <br></div>
            <div class="link"><i class="fas fa-sign-in-alt fa-2x"></i><a href="index.php"> Log In via another Account
                </a><br><br></div>
            <button onclick="goBack()"><i class="fas fa-home fa-2x"></i>Go Back </button>
            <script>
            function goBack() {
                window.history.back();
            }
            </script>
        </div>
        <?php
     $photo=$_SESSION['photo'];
     $username=$_SESSION['name'];
     $email=$_SESSION['email'];
     echo "<div class='profile2'>
         <h2>Edit Profile</h2><br><br>
        <img src='$photo' id='pic' style='width:9%;height:10%;margin-left:43%;'>";?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype='multipart/form-data'><br>
            <div class="form1">Update Profile Photo: <input type="file" name="update" required><br><br>
                Username:  <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
                E-mail ID: &nbsp<input type="email" name="email" value="<?php echo $email; ?>"><br><br>
                <input type="submit" name="submit" class="button" value="Update All"><br><br>
                </form>
                <a href="forgot_password.php">Want to change Password ? </a>
            </div>
        
    </div>
    </div>
</body>

</html>
<?php
      if(isset($_POST['submit']))
      {
          echo "hello";
          $name=$_POST['username'];
          $email=$_POST['email'];
          $token=$_SESSION['token'];
          $pic=$_SESSION['photo'];
          $pic_name=$_FILES['update']['name'];
          if(isset($pic_name))
          {
              echo $pic_name;
            
            $temp=$_FILES['update']['tmp_name'];
            if($size>500000)
            {
                $msg="Please maintain your photo size between 0 to 200Kb.";
                echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
                exit();
            }
            $location='C:/xampp/htdocs/classroom_web/';
            if(move_uploaded_file($temp,$location.$pic_name))
	        {}
            $query="UPDATE `persons` SET `photo`='$pic_name' WHERE `token`='$token'";
            $link_query=mysqli_query($link,$query);
            $pic=$pic_name;
           }
            if(!preg_match("/^[A-Za-z]*$/",$name))
            {
                $msg="Please enter only alphabates in full name.";
                echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
                exit();
            }
            $email_q="SELECT `id` FROM `persons` WHERE `email`='$email'";
            $result=mysqli_query($link,$email_q);
            $row_num=mysqli_num_rows($result);
            if($row_num>1)
            {
                $msg="This E-mail ID is already exist.";
                echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $msg="Please enter valid email.";
                echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
                exit();
            }
            $query="UPDATE `persons` SET `name`='$name',`email`='$email',`photo`='$pic' WHERE `token`='$token'";
            $link_query=mysqli_query($link,$query);
            $old_name=$_SESSION['name'];
            $table="ALTER TABLE $old_name RENAME TO $name";
            if($link->query($table)===true)
            {
                echo $pic;
                $_SESSION['photo']=$pic;
                $_SESSION['name']=$name;
                $_SESSION['email']=$email;
                 header('location:profile.php');
            }
         }
?>