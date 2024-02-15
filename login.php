<?php
  session_start();
?>
<html>
    <head>
        <title>
            Login
        </title>
    </head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
    <div class="login-form">
    <div class="container">
      <div class="header">
        <h1>Login to your Account</h1>
        <p>Visit your Account!</p>
      </div>
      <form method="post">
        <div class="input">
          <i class="fa-solid fa-user"></i>
          <input type="text" id="user" name="user" placeholder="Username" />
        </div>
        <div class="input">
          <i class="fa-solid fa-lock"></i>
          <input type="password" id="pass" name="pass" placeholder="Password" />
        </div>
        <div class="cc">
       <input type="checkbox" id="sp" name="sp" value="show">
       <label for="sp">Show Password</label><br>
       </div>
       <input class="signup-btn" type="submit" name="submit" id="submit" value="LOGIN" />
      </form>
      <p>Or Login with</p>
      <div class="social-icons">
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-google"></i>
      </div>
      <p>Don't have an account <a href="signup.php">Sign up</a></p>
    </div>
  </div>
</body>
</html>
<?php 
    if(isset($_POST['submit']))
    {
    $sname = "localhost";
    $uname = "root";
    $password = "";
    
    $db_name = "project";
 $user=$_POST['user'];
 $pass=$_POST['pass'];

    
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
   
    if (!$conn) {
        echo "Connection failed!";
        exit();
    }
    $user=$_POST['user'];
 $pass=$_POST['pass'];   
    $sql = "select * from signup where user='$user' and password='$pass'";
   $result= mysqli_query($conn, $sql);
   $count=mysqli_num_rows($result);
   if($count==1)
   {
  
    $_SESSION['login']=true;
    $_SESSION['username']=$user;
      echo "<script>alert('Login Succesfull')</script>";
      echo '<script type="text/javascript">
                 window.location.href = "sitewithprofile.php";
             </script>';
    }
    else
    {
      echo "<script>alert('Login Failed')</script>";
    }

 
    mysqli_close($conn);
    }
    ?>