<?php
   session_start();
   require_once "config3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
    <link href="add.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      @media only screen and (max-width: 600px) {

        .form1
        {
          background-color:rgba(202, 199, 199, 0.5);
            width:100%;
            margin-left:0%;
            font-size:10px !important;
        }
        #btn
        {
          width:90%;
        }
        .form1 input,textarea
        {
          width:90%;
        }
        #idea
        {
          width:20% !important;
          margin-left:40% !important;
          margin-bottom:-15% !important;
        }
      }
      @media only screen and (max-width: 1076px) and (min-width:601px)
      {
        .form1
        {
          background-color:rgba(202, 199, 199, 0.5);
            width:50%;
            margin-left:10%;
            font-size:10px !important;
        }
        .form1 input,textarea,#btn
        {
          width:70%;
        }
        #idea
        {
          width:10% !important;
          margin-left:30% !important;
          margin-bottom:-9% !important;
        }
      }
    </style>

</head>
<script>
    $('#iconified').on('keyup', function() {
    var input = $(this);
    if(input.val().length === 0) {
        input.addClass('empty');
    } else {
        input.removeClass('empty');
    }
});
</script>
<?php
       include "navbar.php";
    ?>
    <body>
<div style="background-image:url('add.jpg');background-repeat:no-repeat;background-size: cover;" >
    
    <div style="margin-top:1%;"></div>
    <hr id="w">
    <br>
    <img src="idea.jpg" id="idea" style="border-radius:50%;width:6%;margin-left:21%;margin-bottom:-7%;">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form1">
            <br><h3 style="color:white;"><i class="fas fa-plus"></i> ADD IDEA </h3>
            <input type="text" name="title" placeholder="  &#xf13d; Add Title(Use '_' instead of space)" style="font-family:Arial, FontAwesome" ><br><br>
            <input  name="list" list="subject" placeholder="  &#xf0eb;&nbsp Select subject" style="font-family:Arial, FontAwesome">
            <datalist id="subject">
            <option value="Robotics">
            <option value="Software">
            <option value="Automobile">
            <option value="Environment">
            <option value="Lifestyle of human">
            <option value="Science & Technology">
            <option value="Other">
            </datalist><br><br>
            <textarea rows="5" cols="40" placeholder="  &#xf15c;  Description of idea" style="font-family:Arial, FontAwesome" name="idea"></textarea><br><br>
            <input type="submit" name="submit" value="Submit" id="btn"> 
        </form><br><br><br><br><br></div>
</body>
</html>
<?php
   $email=$_SESSION['email'];
   $id="SELECT `id`,`name` FROM `persons` WHERE `email`='$email'";
   $query1=mysqli_query($link,$id);
   $num_rows=mysqli_num_rows($query1);
   if($num_rows>0)
   {
     if($query1 && isset($_POST["submit"]))
     {
       $row=mysqli_fetch_assoc($query1);
       $id=$row['id'];
       $name=$row['name'];
       $_SESSION['name']=$name;
       $title=$_POST['title'];
       $subject=$_POST['list'];
       $idea=$_POST['idea'];
       echo $id." ".$title." ".$subject." ".$idea;
       if(!preg_match("[^\s]",$title))
       {
       $title_num="SELECT `id` FROM `all_idea` WHERE `title`='$title'";
       if($title_query=mysqli_query($link,$title_num))
       {
         $titles=mysqli_num_rows($title_query);
       }
       else
       {
          $msg= "something went wrong.";
          echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
       }
       if($titles==0)
       {
         $query="INSERT INTO `all_idea`(`title`, `section`, `user_id`, `description`) VALUES ('$title','$subject','$id','$idea')";
         if(mysqli_query($link,$query))
         {
           $select="SELECT `id` FROM `all_idea` WHERE `title`='$title'";
           if($result=mysqli_query($link,$select))
           {
               echo $f=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0)
            {
              $row=mysqli_fetch_assoc($result);
              $id1=$row['id'];
              $q="INSERT INTO $name(`idea_id`) VALUES ('$id1')";
              if(mysqli_query($link,$q))
              {
                header("location:veiw.php");
              }
            }
            else
            {
               $msg= "Sorry Something went wrong";
               echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
            }
          }
         }
         else
         {
           $msg= "Sorry Something went wrong";
           echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
         }
        }
        else
        {
         $msg= "Title is already available.";
         echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
        }
      }
      else
      {
          $msg="Please don't use whitespace in title";
          echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
      }
    }
    }
    else
    {
        $msg= "Please register yourself first";
        echo '<div class="alert alert-danger role="alert">'.$msg.'</div>';
        exit();
    }
    ?>