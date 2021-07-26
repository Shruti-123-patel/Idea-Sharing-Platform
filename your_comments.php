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
    <title>Your comments</title>
    <style>
      @media only screen and (max-width: 600px) {
       .section
       {
         display:none;
       }
       .idea_r
       {
         width:250% !important;
         margin-left:-10px;
       }
      }
      @media only screen and (max-width: 1024px) and (min-width:601px){
       .section
       {
         display:none;
       }
       .idea_r
       {
         width:1000px !important;
         font-size:x-large;
         margin-left:-10px !important;
       }
       p
       {
         font-size:x-large !important;
       }
       td
       {
         font-size:larger !important;
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
        echo "<div class='idea' style='display:flex;flex-direction:column;'>";
           $username=$_SESSION['name'];
           $table="SELECT * FROM  $username";
           $relate=mysqli_query($link,$table);
           $row_num=mysqli_num_rows($relate);
           $x=$row_num;
           if($row_num>0)
           {
            $count=0;
            while($row_num--)  
            { 
              $row=mysqli_fetch_assoc($relate);
              $idea_id=$row['idea_id'];
              $comment="SELECT * FROM comment WHERE idea_id=$idea_id";
              $relate1=mysqli_query($link,$comment);
              $comment_row=mysqli_num_rows($relate1);
              if($comment_row>0)
              {
                 for($i=0;$i<$comment_row;$i++)
                 {
                     $row=mysqli_fetch_assoc($relate1);
                     $user_id=$row['user_id'];
                     $date=$row['date'];
                     $comment=$row['comment'];
                     $user_table="SELECT photo,name FROM persons WHERE id=$user_id";
                     $relate_user=mysqli_query($link,$user_table);
                     $row_user=mysqli_fetch_assoc($relate_user);
                     $photo=$row_user['photo'];
                     $name=$row_user['name'];
                     echo "<div class='profile2'><div class='idea_r' style='width:1000px;'>
                     <table>
                       <tr><td rowspan='2'><img src='$photo' id='pic'>
                           </td>
                           <td>$name</td>
                       </tr>
                       <tr>
                         <td id='date'>$date</td>
                       </tr></table>
                     <b>Comment:</b><br>
                     <p>$comment</p>
                   </div>
                   </div>
                   <br><br>";
                 }
              }
              else
              {
                 $count++;
              }
            }
            echo "</div>";
            if($count==$x)
               echo "<h3 style='margin-top:18%;margin-left:25%;text-decoration:none;font-weight:100;font-size:30px;'>No Comments on any idea.</h3>";
           }
           else
           {
               echo "<center><h2 style='margin-top:15%;'>No Ideas Given by you.</h2>";
           }
           ?>
</div>
</body>
</html>