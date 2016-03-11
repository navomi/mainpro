<?php session_start(); ?>
<?php

if( isset($_SESSION["email"]) && $_SESSION["email"] )
    {
        header("Location: dashboard.php");
        exit;
    }
?>
<?php
include('connection.php');
include('head.php');

function getUserDeets($emailId)
{
     global $conn;
        if ($stmt = $conn->prepare("SELECT  admin_confirm  FROM `user` WHERE email = ? ")) 
        {
            $stmt->bind_param("s",$emailId);
            $stmt->execute();
            $stmt->bind_result( $admin_confirm);
            while ($stmt->fetch())
            {
                $rows = array( 'admin_confirm' => $admin_confirm);
            }
        $stmt->close();
        return $rows;
        }
    else {
        printf("Error message: %s\n", $conn->error);
    }
}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>MyHealthPal</title>
        <link rel="stylesheet" href="login/css/style.css">
  </head>

  <body>

    <div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
      <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <div class="box">
      <h1>Login</h1>
      <form action="" method="POST">
          <input type="email" class="form-control" placeholder="Email-id" name="email"/>
          <input type="password" class="form-control" placeholder="Password" name="password"/>
          <button  type="submit" name ="submit" value="send">Login</button>
      </form>
      <p>Not a member? <a href="registration.php"><span>Sign Up</span> </a></p>
    </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="login/js/index.js"></script>

<?php
if (isset($_POST['submit'])) 
{
    $emailId=$_POST['email'];
    $getUserDeets=getUserDeets($emailId);
    $password = $_POST['password'];   
    $aconfirm = $getUserDeets['admin_confirm'];
    error_reporting(E_ALL);
    $loggedIn = false;
    $userName = isset($_POST["email"]) ? $_POST["email"] : null;
    $userPass = isset($_POST["password"]) ? $_POST["password"] : null;

    if ($userName && $userPass )
    {
        $query = "SELECT id FROM user WHERE email = '$userName' AND password = '$userPass'";// AND password = $userPass";
        $result = mysqli_query( $conn, $query);
        $row = mysqli_fetch_array($result);
       echo $row;
        if (!$row) {
            echo "<div>";
            $message= "No existing user or wrong password.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "</div>";
        }
        else {
           if( $loggedIn = true)
                
                if($aconfirm == '1') //checks if user is student + admin has confirmed
                 {       
                    $_SESSION["email"] = $userName;
                    $_SESSION['id'] = $row['id'];
                    header("Location: dashboard.php");
                 }
                        else
                            {
                                echo "<div>";
                                $message= "Please wait for the admin to confirm your college ID. Try again after 2 hours";
            
                                 echo "<script type='text/javascript'>alert('$message');</script>";
         
                                 echo "</div>";
                            }
             }
     }
}

    
  
?>

            
  </body>
  </html>