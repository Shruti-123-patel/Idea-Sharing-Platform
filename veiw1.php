<?php
  session_start();
  include "config3.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="veiw1.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
    <meta charset="UTF-8">
    <link href="add.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideas</title>
    <style>
      @media only screen and (max-width: 600px) {
       body
       {
         background-image:none;
       }
       .heading1
       {
         width:99%;
         margin-left:0%;
         font-size:xx-large;
         padding:2%;
         letter-spacing:0px;
         display:flex;
         flex-direction:row;
       }
       .heading1 img
       {
         width:30%;
         margin-left:10%;
         vertical-align:middle !important;
       }
       .idea
     {
       font-size:x-large !important;
       margin-left:35px !important;
     }
       .idea_r
       {
         width:98%;
         margin-bottom:4%;
         margin-left:1%;
       }
       input[type="text"]
       {
         width:100% !important;
       }
       form button
       {
         margin-left:10% !important;
       }
       .sec
       {
         margin-top:8%;
         margin-right:-10%;
       }
       #b
       {
         margin-left:5% !important;
         width:90% !important;
       }
    }
    @media only screen and (max-width: 1025px) and (min-width:601px) {
      body
       {
         background-image:none;
       }
       .heading1
       {
         width:95%;
         margin-left:0%;
         font-size:xx-large;
         padding:2%;
         letter-spacing:0px;
         display:flex;
         flex-direction:row;
       }
       .heading1 img
       {
         width:30%;
         margin-left:10%;
         vertical-align:middle !important;
       }
       .idea
     {
       font-size:xx-large !important;
       margin-left:35px !important;
     }
       .idea_r
       {
         width:98%;
         margin-bottom:4%;
         margin-left:1%;
       }
       input[type="text"]
       {
         width:100% !important;
       }
       form button
       {
         margin-left:10% !important;
       }
       .sec
       {
         margin-top:8%;
         margin-right:-15%;
         font-size:100px !important;
       }
       #b
       {
         margin-left:5% !important;
         width:90% !important;
       }
    }
    </style>
</head>
<?php
       include "navbar.php";
    ?>
<body>
    <br><br>
<?php
  if(isset($_GET['section']))
  {
      $sec=$_GET['section'];
      ?>
      <div class="heading1">
          <?php echo "<div class='sec'>$sec</div>"; ?><img src="robots.jpg" id="robot">
      </div>
      <?php
      $table="SELECT * FROM `all_idea` WHERE `section`='$sec'";
      
      if($result=mysqli_query($link,$table))
      {
         $num_row=mysqli_num_rows($result);
         while($num_row)
         {
            $row=mysqli_fetch_assoc($result);
            $user_photo=$_SESSION['photo'];
            $user_name=$_SESSION['name'];
            $table6="SELECT id FROM persons WHERE name='$user_name'";
            $relate6=mysqli_query($link,$table6);
            $row6=mysqli_fetch_assoc($relate6);
            $comment_giver_id=$row6['id'];
            $title=$row['title'];
            $id=$row['id'];
            $given_user_id=$row['user_id'];
            $table2="SELECT `photo`,`name` FROM `persons` WHERE `id`='$given_user_id'";
            $result2=mysqli_query($link,$table2);
            $row2=mysqli_fetch_assoc($result2);
            $name=$row2['name'];
            $table1="SELECT * FROM `$name` WHERE `idea_id`='$id'";
            $result1=mysqli_query($link,$table1);
            $row1=mysqli_fetch_assoc($result1);
            $date=$row1['date_'];
            $idea=$row['description'];
            $num_row--;
            $pic=$row2['photo'];
            
            echo "<div class='idea_r'>
                    <table>
                      <tr><td rowspan='2'><img src='$pic' id='pic'>
                          </td>
                          <td>$name</td>
                      </tr>
                      <tr>
                        <td id='date'>$date</td>
                      </tr></table>
                    <b>$title:</b><br>
                    <p>$idea</p>
                    <hr>
                    <table>
                      <tr>
                        <td><img src='$user_photo' id='pic' style='margin-top:45%;margin-right:5px;verticle-align:middle;'></td>
                        <td><form action='veiw1.php?user=$comment_giver_id&idea=$id&sec=$sec' method='POST'>
                               <input type='text' name='comment' placeholder=' Add Comment' size='130' style='height:40px;border-radius: 10px;font-size:large;margin-top:2%;margin-right:1%;' required></td>
                               <td> <button name='submit' style='border:0px solid white;background:white'><i class='fas fa-paper-plane fa-2x' style='background:white;color:black;border:0px solid white;margin-left:1%;margin-right:1%;'></i></button></td>
                            </form>
                            <button id='b' name='Veiw Comments' style='width:90%;font-size:large;margin-left:4%;height:40px;border-radius:5px;margin-top:1%;'><a href='whole_page.php?id=$id' style='text-decoration:none;color:black;'>Veiw Comments</a></button>
                      </tr>
                    </table>
                  </div>
                  <br><br>";
         }
      }

  }
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $comment=$_POST['comment'];
    $user_id=$_GET['user'];
    $idea_id=$_GET['idea'];
    $sec=$_GET['sec'];
    $insert="INSERT INTO `comment`(`comment`, `idea_id`, `user_id`) VALUES ('$comment','$idea_id','$user_id')";
    $query=mysqli_query($link,$insert);
    if($query===TRUE)
    {
      header("location:veiw1.php?section=$sec");
    }
  }  
          
  ?>