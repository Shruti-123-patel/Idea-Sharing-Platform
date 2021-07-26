<?php
  session_start();
  include "config3.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="veiw1.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
</head>
<body>
<?php
       include "navbar.php";
       echo "<br><hr id='w'><br>";
       if(isset($_GET['id']))
       {
           $idea_id=$_GET['id'];
           $table="SELECT * FROM comment WHERE idea_id=$idea_id";
           $relate=mysqli_query($link,$table);
           if($relate)
           {
               $row_num=mysqli_num_rows($relate);
               if($row_num)
               {
                  while($row_num--)
                  {
                      $row=mysqli_fetch_assoc($relate);
                      $user_id=$row['user_id'];
                      $date=$row['date'];
                      $comment=$row['comment'];
                      $query_user="SELECT * FROM persons WHERE id=$user_id";
                      $relate_user=mysqli_query($link,$query_user);
                      $row=mysqli_fetch_assoc($relate_user);
                      $pic=$row['photo'];
                      $name=$row['name'];
                      echo "<div class='idea_r'>
                    <table>
                      <tr><td rowspan='2'><img src='$pic' id='pic'>
                          </td>
                          <td>$name</td>
                      </tr>
                      <tr>
                        <td id='date'>$date</td>
                      </tr></table>
                    <b>Comment:</b><br>
                    <p>$comment</p>
                  </div>
                  <br><br>";
                  }
               }
               else
               {
                   echo "<center><h2 style='margin-top:15%;'>No Comments on this Idea!</h2></center>";
               }
           }
       }
    ?>
</body>
</html>
