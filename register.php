<?php

//Sec SW Dev - Assignment 2
//Alana Staszczyszyn
//March 5, 2018

?>

<form action="login.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="id"><b>ID:</b></label>
    <input type="text" placeholder="Enter id" name="id" required>
    
    <label for="username"><b>Username:</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    
    <label for="email"><b>Email:</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_repeat" required>

  <!--  <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>  -->

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>




<?php

    if(isset($_POST['submit'])){

        //Check no fields are empty
        foreach($_POST as $key=>$value) {
            if(empty($_POST[$key])) {
                $error_message = "All Fields are required";
                break;
            }
        }


        //Check that passwords match
        if($_POST['password'] != $_POST['password_repeat']){ 
            $error_message = 'Passwords should be same<br>'; 
        }

        //Check email
        if(!isset($error_message)) {
           if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
                $error_message = "Invalid Email Address";
                }
        }


        //If all is well...
        if(!isset($error_message)) {

            require_once("configs/db_connect.php");
            //$db_handle = new DBController();
            
            $id = $_POST['id'];
            $username= $_POST['$username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            

            if (!($stmt = $mysqli->prepare("INSERT INTO blog_members VALUES(?, ?, ?, ?)"))) {
                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            }

            //$id = 1;
            if (!$stmt->bind_param("isss", $id, $username, $password, $email)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }

            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }


        }

    }
?>
    
    
    