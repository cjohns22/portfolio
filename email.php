<?php 

if($_POST['validation'] == '4'){
  success();
}else{
  unsuccessful();
}

function success(){
  $to = 'cjohns22@syr.edu';
  $from = $_POST['email'];
  $message = $_POST['message'];

  $message = "
  Name: {$_POST['username']}
  Phone:{$_POST['phone']}
  Email: {$_POST['email']}

  $message
  ";

  mail($to,'Contact From Website',$message); 

  echo 'Your email has been sent successfully. I will be sure to reply as soon as I can.';
}

function unsuccessful(){?>
  
  <div id="newman-wrap">
    <img id="newman" src='ah-ah-ah.gif' />
    <h2>You failed my vaildation screening. I do not do business with robots.</h2>
  </div>

  <?php
}


?>