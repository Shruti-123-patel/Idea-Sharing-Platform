<?php
session_start();
   include "config3.php";
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
    <style>
        @media only screen and (max-width: 600px) {
       body
       {
         background-image:none !important;
       }
       a,button
       {
        font-size:large !important;
         font-weight:100 !important;
         width:100%;
         margin-right:-10% !important;
       }
       i
       {
           font-size:large;
           margin-right:2px;
       }
       button
       {
           margin-left:-2%;
           
       }
       .section
       {

            padding-right:0%;
            /* line-height:10px; */
            padding-top:8.2%;
            /* padding-bottom:10%; */
            height:100%;
            background-size:
       }
    }
    @media only screen and (max-width: 1075px) and (min-width:601px){
        .section
        {
            line-height:50px !important;
            height:100% !important;
        }
        a,i,button
        {
            font-size:36px !important;
        }
        button
        {
            height:70px;
        }

    }
    
        body
        {
            background-image:url('hamb1.jpg');
            background-repeat:no-repeat;
            background-size:cover;
        }
        i
        {
            font-weight:bold;
            font-size:xx-large; 
        }
        a
        {
            letter-spacing:0.4px;
            width:100%;
            font-family: Arial, Helvetica, sans-serif;
            font-weight:bold;
            padding-top:10px;
            margin-top:5px;
            font-size:xx-large;
            text-decoration:none;
            text-shadow: 2px 2px 3px #000000;
            color:white;
        }
        button
        {
             text-shadow: 2px 2px 3px #000000;
            font-size:xx-large;
            letter-spacing:0.4px;
            background-color:rgba(12, 12, 12, 0.1);
            color:white;
            font-weight:bold;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow:inset 0px 0px 0px white !important;
            border:0px !important;
            text-align:left;
            margin-top:5%;
        }
        a:hover,button:hover
        {
            cursor: pointer;
            text-decoration:underline;
            font-weight:bold;
            color:white; 
        }
        .section
        {
            text-shadow: 2px 2px 3px #000000;
            color:white;
            padding-left:5%;
            padding-right:50%;
            line-height:180%;
            padding-top:8.2%;
            padding-bottom:10%;
            /* margin-top:3.9%;
            margin-left:1%; */
            background-color:rgba(12, 12, 12, 0.8);
            background-size:2000px;
            /* border-radius:10px; */

        }
    </style>
</head>
<body>
    <?php
     $user_name=$_SESSION['name'];
     $table6="SELECT id FROM persons WHERE name='$user_name'";
     $relate6=mysqli_query($link,$table6);
     $row6=mysqli_fetch_assoc($relate6);
     $_SESSION['id']=$row6['id'];
     ?>
   <div class="section"> 
   <i class="fas fa-user fa-2x"></i> &nbsp<a href="profile.php">Manage Profile </a><br><br><br>
   <i class="fa fa-lightbulb "></i> &nbsp&nbsp<a href="your_idea.php">Your Ideas </a><br><br><br>
   <i class="fas fa-comment-dots "></i>&nbsp&nbsp<a href="your_comments.php">Comments </a><br><br><br>
   <i class="fas fa-sign-out-alt"></i>&nbsp&nbsp<a href="logout.php">Log out </a><br> <br><br>
   <i class="fas fa-sign-in-alt"></i>&nbsp&nbsp<a href="index.php">Log In via another Account </a><br><br>
   <button onclick="goBack()"><i class="fas fa-undo fa-0.1x"></i> Go Back </button>
   <script>
     function goBack() {
       window.history.back();
        }
   </script> 
  
</body>
</div>
</html>