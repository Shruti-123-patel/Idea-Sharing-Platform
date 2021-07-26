<?php
  session_start();
  include "config3.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="veiw.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
    <meta charset="UTF-8">
    <link href="add.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      @media only screen and (max-width: 600px) {
       body
       {
         background-image:none;
       }
       .idea
     {
       font-size:x-large !important;
       margin-left:35px !important;
     }
       .strip
       {
         width:95%;
         margin-bottom:4%;
       }
    }
    @media only screen and (max-width: 1025px) and (min-width:601px) {
      body
       {
         background-image:none;
       }
       .idea
     {
       font-size:x-large !important;
       margin-left:35px !important;
     }
       .strip
       {
         width:95%;
         height:16% !important;
         margin-bottom:3%;
       }
    }
    </style>
</head>
<?php
       include "navbar.php";
    ?>
<body>
    <div style="margin-top:1%;"></div>
    <hr id="w">
    <br>
    
       <div class="strip">
          <a href="veiw1.php?section=Robotics" id="a1">Robotics </a>
       </div>
       <div class="strip">
       <a href="veiw1.php?section=Software" id="a1">Softwares </a>
       </div>
       <div class="strip">
       <a href="veiw1.php?section=Automobile" id="a1"> Automobile </a>
       </div>
       <div class="strip">
       <a href="veiw1.php?section=Environment" id="a1"> Environment </a>
       </div>
       <div class="strip">
       <a href="veiw1.php?section=Lifestyle of human" id="a1"> Lifestyle of human</a>
       </div>
       <div class="strip">
       <a href="veiw1.php?section=Science & Technology" id="a1">Science & Technology </a>
       </div>
       <div class="strip">
       <a href="veiw1.php?section=Other" id="a1">  Other</a>
       </div>
       

</body>
</html>
