<!DOCTYPE html>
<html lang="en">
<head>
<link href="css_home.css" rel="stylesheet">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
<script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Advent Pro' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Idea Sharing Platform</title>
  <style>
     @media only screen and (max-width: 600px) {
     
     .quote,.author
     {
       font-size:x-large !important;
       text-align:justify;
     }
     .author
     {
       color:white !important;
       text-shadow: 2px 2px 4px black;
       margin-left:16% !important;
     }
     .why1
     {
       flex-direction:column !important;
     }
     .ins,.pra
     {
       width: 100% !important;
       margin-bottom:10px !important;
       /* display:none !important; */

     }
     .form input[type="text"],.form hr,.form input[type="email"],.form textarea
     {
       width:90% !important;
     }
     hr
     {
       margin-bottom:10% !important;
     }
     .form .btn
    {
    width:50% !important;
   }
   .icon
   {
     margin-left:20% !important;
   }
    }
    @media only screen and (max-width: 1025px) and (min-width:601px) {
      .idea
     {
       font-size:xx-large !important;
       margin-left:35px !important;
     }
     .quote,.author
     {
       font-size:x-large !important;
       text-align:justify;
     }
     .author
     {
       color:white !important;
       text-shadow: 2px 2px 4px black;
       margin-left:16% !important;
     }
     .why1
     {
       flex-direction:column !important;
     }
     .ins,.pra
     {
       width: 100% !important;
       margin-bottom:10px !important;
       /* display:none !important; */

     }
     .form input[type="text"],.form hr,.form input[type="email"],.form textarea
     {
       width:90% !important;
     }
     hr
     {
       margin-bottom:10% !important;
     }
     .form .btn
    {
    width:50% !important;
   }
   .icon
   {
     margin-left:40% !important;
   }
    }
  </style>
</head>
<body>
    <?php
       include "navbar.php";
    ?>
    <main>
      <div class="quote">
        " ALL IDEAS GROW OUT OF OTER IDEAS. "<br><br>
        <span class="author">-Anish Kapoor</span>
      </div>
      <div class="why">
        <br>
        <center><h1>WHY SHOULD WE SHARE THE IDEAS?</h1></center>
        <div class="why1">
            <p>"Sharing your own ideas inspires others to do the same, which builds a more positive and collaborate environment for everyone."</p><img src="inspire.jpg" id="ins">
        </div>
        
        <div class="why1">
            <img src="pra.jpg" id="pra"><p>"Sharing Ideas Is The First Step To Making Them a Reality If you have a million great ideas but never share a single one, then those ideas aren’t worth much because they can never become a reality. An idea might be brilliant, but if it never sees the light of day, it can’t change anything because it isn’t real yet."</p>
        </div>

        <div class="why1">
            <p>"An idea gets better the more you share it. You may think you have to keep your idea safe, but the truth is, you should be trying to destroy it. Trying to break it down helps you find flaws and fix them. Asking everyone you meet whether they like your idea will help you validate it by gauging others' interest in it."</p><img src="3rd.jpg" id="ins">
        </div>
      </div>
      <div id="contact">
         <br>
         <center><h1>Get in Touch</h1></center>
         <center><div class="form">
               <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <input type="text" placeholder="Enter your name" name="name" minlength:"20"><br><hr>
                  <input type="email" placeholder="Enter E-mail" name="email" minlength:"20"><br><hr>
                  <textarea rows="2" cols="20" placeholder="Message or Query" name="msg"></textarea><br><hr>
                  <center><input type="submit" name="submit" value="Send Message" class="btn"><br><br></center>
               </form>
         </div></center>
         <div class="icon">
         <a href="" ><i class="fab fa-linkedin fa-2x" id="i"></i></a>
                     <a href=""><i class="fab fa-twitter fa-2x" id="i"></i></a>
                     <a href=""><i class="fas fa-envelope fa-2x" id="i"></i></a>
         </div>
      </div>
    </main>
</body>
</html>