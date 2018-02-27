<?php

    //Sec SW Dev - Assignment 2
    //Alana Staszczyszyn
    //March 5, 2018

   ob_start();
   require_once('configs/db_connect.php');
 

   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   
   
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
   
   
           
         
   
   
?>

<form action="user/welcome.php">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

<?php



    $sql = $conn->prepare("SELECT username, password FROM blog_members")
                or die (mysql_error());
    
    $result = $conn->query($sql);
    


    //echo "PW ", md5($_POST['password']);


   /* while($row = mysqli_fetch_array($result)){
        if($row['username']== $_POST['username'] && $row['password'] == md5($_POST['password']) && $vrow['vercode'] == $_POST['valcode']){
           header("Location: pg_userList.php");
        }
    }*/
    
    //TODO: ADD CHECK FOR ADMIN OR NOT
    
    while($row = mysqli_fetch_array($result)){
        if($row['username']== $_POST['username'] && $row['password'] == $_POST['password']){
           header("Location: user/welcome.php");
        }
    }

    
?>
            