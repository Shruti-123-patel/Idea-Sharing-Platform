<?php 
   session_start();
   include "config3.php";
   ?>
   <!DOCTYPE html>
<html lang="en">
<head>
<link href="profile.css" rel="stylesheet">
    <link href="veiw1.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
    <meta charset="UTF-8">
    <link href="add.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      @media only screen and (max-width: 600px) {
       .section
       {
         display:none;
       }
       .idea_r
       {
        font-size:x-large;
         width:250% !important;
         margin-left:-10px;
       }
       td
       {
         font-size:larger !important;
       }
       p
       {
        font-size:x-large !important;
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
    <br><br>
    <div class="main">
        <div class="section" style="margin-top:-2%">
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
   $table_name=$_SESSION['name'];
   $table="SELECT * FROM $table_name";
   $pic=$_SESSION['photo'];
   $query=mysqli_query($link,$table);
   $row_num=mysqli_num_rows($query);
   echo "<div class='idea' style='display:flex;flex-direction:column;'>";
   while($row_num--)
   {
       $row=mysqli_fetch_assoc($query);
       $idea_id=$row['idea_id'];
       $date=$row['date_'];
       $table1="SELECT * FROM all_idea WHERE `id`=$idea_id";
       $result=mysqli_query($link,$table1);
       $row_num1=mysqli_num_rows($result);
       if($row_num1)
       {

          $row1=mysqli_fetch_assoc($result);
          $section=$row1['section'];
          $idea=$row1['title'];
          $descriptive=$row1['description'];
          echo "<div class='profile2'><div class='idea_r' style='width:1000px;'>
          <table>
            <tr><td rowspan='2'><img src='$pic' id='pic'>
            </td>
            <td>$section</td>
        </tr>
            <p><tr>
              <td id='date'>$date</td>
            </tr></p></table>
          <b>$idea:</b><br>
          <p>$descriptive</p>
        </div>
        </div>
        <br><br>
        ";
       }
       
   }
   echo '</div>';
   ?>